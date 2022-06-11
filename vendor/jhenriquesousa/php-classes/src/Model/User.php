<?php
namespace jhenriquesousa\Model;

use \jhenriquesousa\DB\Sql;

use \jhenriquesousa\Model;

class User extends Model {

    const SESSION = "User";

    public static function login($login, $password)
    {
        $sql = new SQL();

        // consulta na base de dados 
        $results = $sql->select("SELECT * FROM tb_users WHERE deslogin = :LOGIN", array(
            ":LOGIN"=>$login
        ));

        if (count($results) === 0)
        {
            throw new \Exception ("Utilizador inexistente ou password inválida.");
        }

        $data = $results[0];

        // verificar a password- o data é o hash que vem da base de dados. a password é o que o user coloca
        // a função só retorna true ou false
        if (password_verify($password, $data["despassword"]) === true)
        {
            // passar os dados do utilizador
            $user = new User();

            $user->setData($data);

            // criar a sessão
            // quando a rota for chamada (no index) a sessão já foi criada, contudo precisa ser validade (na rota admin e não do login visto que o admin precisa de dar login). Para isso criamos um método de validação
            $_SESSION[User::SESSION] = $user->getValues();

            return $user;
        }
        else {
            throw new \Exception ("Utilizador inexistente ou password inválida.");
        }
    }

    public static function verifyLogin($inadmin = true) {
        if (
            // verificar se a session não foi definida
            !isset($_SESSION[User::SESSION]) 
            || #ou
            !$_SESSION[User::SESSION]
            || #ou
            !(int)$_SESSION[User::SESSION]["iduser"] > 0
            || #ou
            (bool)$_SESSION[User::SESSION]["inadmin"] !== $inadmin // verificar se é admin ou não
        ) {
            // redireciona para a página login
            header("Location: /admin/login");
            exit;
        }
    }

    public static function logout() 
    {
        $_SESSION[User::SESSION] = NULL;
    }

    // listar todos os utilizadores
    public static function listAll() 
    {
        $sql = new SQL();

        return $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) ORDER BY b.desperson"); # ordenar por o nome da pessoa da table tb_person (2). Existe conexao entre a tabela users e persons dai o inner join
    }

    // guardar os dados na base de dados
    public function save()
    {
        $sql = new Sql();

        $results = $sql->select("CALL sp_users_save(:desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)", 
            array(
            ":desperson"=>$this->getdesperson(), 
            ":deslogin"=>$this->getdeslogin(), 
            ":despassword"=>$this->getdespassword(),
            ":desemail"=>$this->getdesemail(),
            ":nrphone"=>$this->getnrphone(),
            ":inadmin"=>$this->getinadmin()
        ));

        $this->setData($results[0]);
    }

    // mostar a informação dos utilizadores
    public function get($iduser)
    {
    
    $sql = new Sql();
    
    $results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = :iduser;", array(
    ":iduser"=>$iduser
    ));
    
    $data = $results[0];
    
    $this->setData($data);
    
    }

    // editar os utilizadores
    public function update() 
    {
        $sql = new Sql();

        $results = $sql->select("CALL sp_usersupdate_save(:iduser, :desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)", 
            array(
            ":iduser"=>$this->getiduser(),   
            ":desperson"=>$this->getdesperson(), 
            ":deslogin"=>$this->getdeslogin(), 
            ":despassword"=>$this->getdespassword(),
            ":desemail"=>$this->getdesemail(),
            ":nrphone"=>$this->getnrphone(),
            ":inadmin"=>$this->getinadmin()
        ));

        $this->setData($results[0]);
    }

    // apagar utilizadores
    public function delete()
    {
        $sql = new Sql();

        $sql->query("CALL sp_users_delete(:iduser)", array (
            ":iduser"=>$this->getiduser()
        ));
    }
}

?>