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

    public static function logout() {
        $_SESSION[User::SESSION] = NULL;
    }
}

?>