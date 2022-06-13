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

}

?>