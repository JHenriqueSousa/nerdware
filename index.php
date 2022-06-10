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

$app->run();

 ?>