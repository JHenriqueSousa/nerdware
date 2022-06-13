<?php
namespace jhenriquesousa\Model;

use \jhenriquesousa\DB\Sql;

use \jhenriquesousa\Model;

use \jhenriquesousa\Mailer;

class Category extends Model {

    // listar todos os utilizadores
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
    }

    public function delete()
    {
        $sql = new Sql();

        $sql->query("DELETE FROM tb_categories WHERE idcategory = :idcategory", [
            ':idcategory'=>$this->getidcategory()
        ]);
    }

}

?>