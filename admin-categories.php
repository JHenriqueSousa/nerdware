<?php
// use do website (class page)
use \jhenriquesousa\Page;

// use do painel de admin (class admin)
use \jhenriquesousa\PageAdmin;

use \jhenriquesousa\Model\User;

use \jhenriquesousa\Model\Category;

use \jhenriquesousa\Model\Product;

$app->get("/admin/categories", function(){

	// verificar se o utilizador fez o login
	User::verifyLogin();

	$categories = Category::listAll();

	$page = new PageAdmin();

	// lista de todas as categorias que estão na base de dados
	$page->setTpl("categories", [
		'categories'=>$categories,
	]);

});

$app->get("/admin/categories/create", function(){

	// verificar se o utilizador fez o login
	User::verifyLogin();

	$page = new PageAdmin();

	// lista de todas as categorias que estão na base de dados
	$page->setTpl("categories-create");

});

// criar categorias- direcionamento da rotas, com a chamada dos métodos
$app->post("/admin/categories/create", function(){

	// verificar se o utilizador fez o login
	User::verifyLogin();

	$category = new Category();

	$category->setData($_POST);

	$category->save();

	header("Location: /admin/categories");
	exit;

});

// apagar categorias
$app->get("/admin/categories/:idcategory/delete", function($idcategory){

	// verificar se o utilizador fez o login
	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$category->delete();

	header("Location: /admin/categories");
	exit;
});

// editar categorias- buscar as informações da base de dados
$app->get("/admin/categories/:idcategory", function($idcategory){

	// verificar se o utilizador fez o login
	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	// como vai mostrar html precisamos da class page
	$page = new PageAdmin();

	// lista de todas as categorias que estão na base de dados
	$page->setTpl("categories-update", [
		'category' => $category -> getValues()
	]);

});

// editar categorias- alterar as informações
$app->post("/admin/categories/:idcategory", function($idcategory){

	// verificar se o utilizador fez o login
	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$category->setData($_POST);

	$category->save();

	header("Location: /admin/categories");
	exit;

});

// rota para a categoria escolhida (através do id dela- :idcategory)
$app->get("/categories/:idcategory", function($idcategory){

	$category = new Category();

	$category->get((int)$idcategory);

	// como vai mostrar html precisamos da class page
	$page = new Page();

	// lista de todas as categorias que estão na base de dados
	$page->setTpl("category", [
		'category' => $category -> getValues(),
		'products' => []
	]);

});
?>