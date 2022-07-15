<?php
// use do website (class page)
use \jhenriquesousa\Page;

// use do painel de admin (class admin)
use \jhenriquesousa\PageAdmin;

use \jhenriquesousa\Model\User;

use \jhenriquesousa\Model\Category;

use \jhenriquesousa\Model\Product;

$app->get("/admin/categories", function(){

	User::verifyLogin();

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Category::getPageSearch($search, $page);

	} else {

		$pagination = Category::getPage($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/admin/categories?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);

	}

	$page = new PageAdmin();

	$page->setTpl("categories", [
		"categories"=>$pagination['data'],
		"search"=>$search,
		"pages"=>$pages
	]);	


});

$app->get("/admin/categories/create", function(){

	// verificar se o utilizador fez o login
	User::verifyLogin();

	$page = new PageAdmin();

	// lista de todas as categorias que estão na base de dados
	$page->setTpl("categories-create", [
	'errorRegister'=>User::getErrorRegister(),
	'registerValues'=>(isset($_SESSION['registerValues'])) ? $_SESSION['registerValues'] : ['descategory'=>'']
	]);
});

// criar categorias- direcionamento da rotas, com a chamada dos métodos
$app->post("/admin/categories/create", function(){

	// verificar se o utilizador fez o login
	User::verifyLogin();

	$_SESSION['registerValues'] = $_POST;

    if (!isset($_POST['descategory']) || $_POST['descategory'] == '') {

		User::setErrorRegister("Preencha a categoria.");
		header("Location: /admin/categories/create");
		exit;

	}

	if (User::checkLoginExist5($_POST['descategory']) === true) {

		User::setErrorRegister("A categoria já está registada.");
		header("Location: /admin/categories/create");
		exit;

	}

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