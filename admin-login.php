<?php
// use do website (class page)
use \jhenriquesousa\Page;

// use do painel de admin (class admin)
use \jhenriquesousa\PageAdmin;

use \jhenriquesousa\Model\User;

use \jhenriquesousa\Model\Category;

use \jhenriquesousa\Model\Product;

$app->get('/admin/login', function() {

	$page = new PageAdmin([
		// desabilitar o footer e o header configurados na class page (métodos constructers)
		"header" =>false,
		"footer" =>false
	]);

	$page->setTpl("login", [
		'error'=>User::getError()
	]);

});

$app->post('/admin/login', function() {

	try {

		User::login($_POST['login'], $_POST['password']);

	} catch(Exception $e) {

		User::setError($e->getMessage());

	}	
	header("Location: /admin/users");
	exit;

});

$app->get('/admin/logout', function() {

	// função de logout
	User::logout();
	header("Location: /admin/login");
	exit;

});

$app->get("/admin/forgot", function() {

	$page = new PageAdmin([
		// desabilitar o footer e o header configurados na class page (métodos constructers)
		"header" =>false,
		"footer" =>false
	]);

	$page->setTpl("forgot");
});

$app->post("/admin/forgot", function(){

	// método para fazer as verificações
	$user = User::getForgot($_POST["email"]);

	header("Location: /admin/forgot/sent");
	exit;
});

$app->get("/admin/forgot/sent", function(){
	$page = new PageAdmin([
		// desabilitar o footer e o header configurados na class page (métodos constructers)
		"header" =>false,
		"footer" =>false
	]);

	$page->setTpl("forgot-sent");
});

$app->get("/admin/forgot/reset", function(){
	// a que utilizador este código pertence
	$user = User::validForgotDecrypt($_GET["code"]);

	$page = new PageAdmin([
		// desabilitar o footer e o header configurados na class page (métodos constructers)
		"header" =>false,
		"footer" =>false
	]);

	$page->setTpl("forgot-reset", array(
		"name" => $user["desperson"],
		"code" => $_GET["code"]

	));

});

$app->post("/admin/forgot/reset", function(){

	$forgot = User::validForgotDecrypt($_POST["code"]);	

	User::setFogotUsed($forgot["idrecovery"]);

	$user = new User();

	$user->get((int)$forgot["iduser"]);

	$password = password_hash($_POST["password"], PASSWORD_DEFAULT, [
		"cost"=>12
	]);

	$user->setPassword($password);

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("forgot-reset-success");

});

$app->get('/admin/erro', function() {
    
	$page = new PageAdmin([
		// desabilitar o footer e o header configurados na class page (métodos constructers)
		"header" =>false,
		"footer" =>false
	]);

	$page->setTpl("erro");

});
?>