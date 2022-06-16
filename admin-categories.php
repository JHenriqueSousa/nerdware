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

// rota para a acessar o ficheiro categories-products
$app->get("/admin/categories/:idcategory/products", function($idcategory){

	// verificar se o utilizador fez o login
	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	// como vai mostrar html precisamos da class page
	$page = new PageAdmin();

	// lista de todas as categorias que estão na base de dados
	$page->setTpl("categories-products", [
		'category' => $category -> getValues(),
		'productsRelated' => $category->getProducts(),
		'productsNotRelated' => $category->getProducts(false)
	]);

});

// rota para a acessar o ficheiro categories-products
$app->get("/admin/categories/:idcategory/products/:idproduct/add", function($idcategory, $idproduct){

	// verificar se o utilizador fez o login
	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$product = new product();

	$product->get((int)$idproduct);

	$category->addProduct($product);

	header("Location: /admin/categories/".$idcategory."/products");
	exit;

});

// rota para a acessar o ficheiro categories-products
$app->get("/admin/categories/:idcategory/products/:idproduct/remove", function($idcategory, $idproduct){

	// verificar se o utilizador fez o login
	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$product = new Product();

	$product->get((int)$idproduct);

	$category->removeProduct($product);

	header("Location: /admin/categories/".$idcategory."/products");
	exit;

});
?>