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
?>