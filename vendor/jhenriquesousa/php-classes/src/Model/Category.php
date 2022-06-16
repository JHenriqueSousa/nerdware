<?php
namespace jhenriquesousa\Model;

use \jhenriquesousa\DB\Sql;

use \jhenriquesousa\Model;

use \jhenriquesousa\Mailer;

class Category extends Model {

    // listar todos as categorias
    public static function listAll() 
    {
        $sql = new SQL();

        return $sql->select("SELECT * FROM tb_categories ORDER BY descategory"); # ordenar por o nome da pessoa da table tb_person (2). Existe conexao entre a tabela users e persons dai o inner join
    }

    public function save() 
    {
        $sql = new Sql();

        $results = $sql->select("CALL sp_categories_save(:idcategory, :descategory)", 
            array(
            ":idcategory"=>$this->getidcategory(), 
            ":descategory"=>$this->getdescategory()
        ));

        $this->setData($results[0]);
    }

    public function get($idcategory)
    {
        $sql = new Sql();

        $results= $sql-> select("SELECT * FROM tb_categories WHERE idcategory = :idcategory", [
            ':idcategory'=>$idcategory
        ]);

        $this->setData($results[0]);

        Category::updateFile();
    }

    public function delete()
    {
        $sql = new Sql();

        $sql->query("DELETE FROM tb_categories WHERE idcategory = :idcategory", [
            ':idcategory'=>$this->getidcategory()
        ]);

        Category::updateFile();
    }

    // método para atualizar as categorias no front-end
    public static function updateFile(){

        // listar todos as categorias
        $categories = Category::listAll();

        // como existem várias categorias é necessário fazer um foreach
        $html = [];

        // cada registo que vier da base de dados vai ser chamado de row
        foreach ($categories as $row){
            array_push($html, '<li><a href="/categories/' . $row['idcategory'].'">'.$row['descategory'].'</a></li>');
        }

         file_put_contents($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . "categories-menu.html", implode('', $html));

    }

    // colocar um booleano para saber se o que queremos passar é os que estão na categoria ou o contrário 
    public function getProducts($related = true) {

        $sql = new SQL();

        // produtos que apresentam a categoria pretendida
        if ($related === true) {
            return $sql-> select("
                SELECT * FROM tb_products WHERE idproduct IN(
                    SELECT a.idproduct
                    FROM tb_products a
                    INNER JOIN tb_productscategories b ON a.idproduct = b.idproduct
                    WHERE b.idcategory = :idcategory
                );
            ", [
                ':idcategory' => $this -> getidcategory()
            ]);
        }
        // todos os produtos
        else {
            return $sql-> select("
                SELECT * FROM tb_products WHERE idproduct NOT IN(
                    SELECT a.idproduct
                    FROM tb_products a
                    INNER JOIN tb_productscategories b ON a.idproduct = b.idproduct
                    WHERE b.idcategory = :idcategory
                );
            ", [
                    ':idcategory' => $this -> getidcategory()
            ]);
        }
    }

    public function getProductsPage($page = 1, $itemsPerPage = 8)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_products a
			INNER JOIN tb_productscategories b ON a.idproduct = b.idproduct
			INNER JOIN tb_categories c ON c.idcategory = b.idcategory
			WHERE c.idcategory = :idcategory
			LIMIT $start, $itemsPerPage;
		", [
			':idcategory'=>$this->getidcategory()
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>Product::checkList($results),
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

    public function addProduct(Product $product)
	{

		$sql = new Sql();

		$sql->query("INSERT INTO tb_productscategories (idcategory, idproduct) VALUES(:idcategory, :idproduct)", [
			':idcategory'=>$this->getidcategory(),
			':idproduct'=>$product->getidproduct()
		]);

	}

	public function removeProduct(Product $product)
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_productscategories WHERE idcategory = :idcategory AND idproduct = :idproduct", [
			':idcategory'=>$this->getidcategory(),
			':idproduct'=>$product->getidproduct()
		]);

	}

}

?>