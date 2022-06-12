<?php
namespace jhenriquesousa\Model;

use \jhenriquesousa\DB\Sql;

use \jhenriquesousa\Model;

use \jhenriquesousa\Mailer;

class User extends Model {

    const SESSION = "User";
    // chave da criptografia
    const SECRET = "jhenrique_Secret";

    const SECRET_IV = "jhenrique_Secret_IV";

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

		$sql->query("CALL sp_users_delete(:iduser)", array(
			":iduser"=>$this->getiduser()
		));

	}

    public static function getForgot($email, $inadmin = true)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT *
			FROM tb_persons a
			INNER JOIN tb_users b USING(idperson)
			WHERE a.desemail = :email;
		", array(
			":email"=>$email
		));

		if (count($results) === 0)
		{

			throw new \Exception("Não foi possível recuperar a senha.");

		}
        else 
        {
            $data = $results[0];

            $results2= $sql->select("CALL sp_userspasswordsrecoveries_create(:iduser, :desip)", array(
                // o iduser está no results
                ":iduser" => $data["iduser"],
                ":desip" => $_SERVER["REMOTE_ADDR"] //ip address do utilizador que está a recuperar a palavra passe
            ));

            if (count($results2) === 0)
            {
                throw new \Exception("Não é possivel recuperar a palavra-passe.");
            }
            else 
            {
                $dataRecovery = $results2[0];

                // Vai ser criado  um código no idrecovery. Este código vai ser criptografado. Vamos transformar o código em base64 para ser possivel enviar por link
                $code = openssl_encrypt($dataRecovery['idrecovery'], 'AES-128-CBC', pack("a16", User::SECRET), 0, pack("a16", User::SECRET_IV));

				$code = base64_encode($code);

				if ($inadmin === true) {

					$link = "http://www.nerdware.com/admin/forgot/reset?code=$code";

				} else {

					$link = "http://www.nerdware.com/forgot/reset?code=$code";
					
				}				

				$mailer = new Mailer($data['desemail'], $data['desperson'], "Recuperar a sua palavra-passe.", "forgot", array(
					"name"=>$data['desperson'],
					"link"=>$link
				));				

				$mailer->send();

				return $link;
            }
        }
    }

    public static function validForgotDecrypt($code)
    {
        // como o código foi criptografado (base64) agora precisamos de fazer o processo inverso
        $code = base64_decode($code);

        $idrecovery = openssl_decrypt($code, 'AES-128-CBC', pack("a16", User::SECRET), 0, pack("a16", User::SECRET_IV));

		$sql = new Sql();

		$results = $sql->select("
			SELECT *
			FROM tb_userspasswordsrecoveries a
			INNER JOIN tb_users b USING(iduser)
			INNER JOIN tb_persons c USING(idperson)
			WHERE
                a.idrecovery = :idrecovery
                AND
                a.dtrecovery IS NULL
                AND
                DATE_ADD(a.dtregister, INTERVAL 1 HOUR) >= NOW();
		", array(
			":idrecovery"=>$idrecovery
		));

		if (count($results) === 0)
		{
			throw new \Exception("Não foi possível recuperar a palavra-passe.");
		}
		else
		{

			return $results[0];

		}

	}

    public static function setFogotUsed($idrecovery)
	{

		$sql = new Sql();

		$sql->query("UPDATE tb_userspasswordsrecoveries SET dtrecovery = NOW() WHERE idrecovery = :idrecovery", array(
			":idrecovery"=>$idrecovery
		));

	}

    public function setPassword($password)
	{

		$sql = new Sql();

		$sql->query("UPDATE tb_users SET despassword = :password WHERE iduser = :iduser", array(
			":password"=>$password,
			":iduser"=>$this->getiduser()
		));

	}
}

?>