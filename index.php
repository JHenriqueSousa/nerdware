<?php 

session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;

// use do website (class page)
use jhenriquesousa\Page;

// use do painel de admin (class admin)
use jhenriquesousa\PageAdmin;

use jhenriquesousa\Model\User;


$app = new Slim();

$app->config('debug', true);

// rota para o website
$app->get('/', function() {
    
	$page = new Page();

	$page->setTpl("index");

});

// rota para o painel de admin
$app->get('/admin', function() {
	// quando a rota for chamada a sessão já foi criada (no user.php), contudo precisa ser validada (na rota admin e não do admin/login visto que o admin precisa de efetuar o login). Para isso criamos um método de validação (verifyLogin- está no user.pho)
    User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("index");

});

$app->get('/admin/login', function() {

	$page = new PageAdmin([
		// desabilitar o footer e o header configurados na class page (métodos constructers)
		"header" =>false,
		"footer" =>false
	]);

	$page->setTpl("login");

});

$app->post('/admin/login', function() {

	User::login($_POST["login"], $_POST["password"]); // criar um método estático porque não sabemos a informação do user	
	header("Location: /admin");
	exit;
});

$app->get('/admin/logout', function() {

	// função de logout
	User::logout();
	header("Location: /admin/login");
	exit;

});

$app->get('/admin/users', function() {

	// verificar se o utilizador fez login
	User::verifyLogin();

	$users= User::listAll();

	// listar todos os utilizadores
	$page = new PageAdmin();

	$page->setTpl("users", array(
		"users" => $users
	));

});

$app->get('/admin/users/create', function() {

	// verificar se o utilizador fez login
	User::verifyLogin();

	// listar todos os utilizadores
	$page = new PageAdmin();

	$page->setTpl("users-create");

});

// apagar um utilizador
$app->get("/admin/users/:iduser/delete", function($iduser){
	
	// verificar se o utilizador fez login
	User::verifyLogin();

	$user = new User();

	// verificar se o utilizador existe
	$user->get((int)$iduser);

	// método delete (user.php)
	$user->delete();

	header("Location: /admin/users");
	exit;
	
});

$app->get('/admin/users/:iduser', function($iduser){
 
	User::verifyLogin();
  
	$user = new User();
  
	$user->get((int)$iduser);
  
	$page = new PageAdmin();
  
	$page ->setTpl("users-update", array(
		 "user"=>$user->getValues()
	 ));
  
 });

$app->post("/admin/users/create", function(){

	// verificar se o utilizador fez login
	User::verifyLogin();

	$user = new User();

	// verificar se foi selecionado a opcao de admin
	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

	$user->setData($_POST);

	$user->save();

	header("Location: /admin/users");
	exit;
});

// guardar o que foi editado
$app->post("/admin/users/:iduser", function($iduser){
	
	// verificar se o utilizador fez login
	User::verifyLogin();

	$user = New User();

	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

	// carregar os dados no momento. caso alguns dados não forem editados estes vão ser carregados mas com a mesma informação
	$user->get((int)$iduser);

	$user->setData($_POST);

	// método update (user.php)
	$user->update();

	header("Location: /admin/users");
	exit;

});

$app->run();

 ?>