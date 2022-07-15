<?php
// use do website (class page)
use \jhenriquesousa\Page;

// use do painel de admin (class admin)
use \jhenriquesousa\PageAdmin;

use \jhenriquesousa\Model\User;

use \jhenriquesousa\Model\Category;

use \jhenriquesousa\Model\Product;

$app->get("/admin/products", function(){

	User::verifyLogin();

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Product::getPageSearch($search, $page);

	} else {

		$pagination = Product::getPage($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/admin/products?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);

	}

	$products = Product::listAll();

	$page = new PageAdmin();

	$page->setTpl("products", [
		"products"=>$pagination['data'],
		"search"=>$search,
		"pages"=>$pages
	]);

});

// definir a rota e buscar os dados
$app -> get("/admin/products/create", function(){

    User::verifyLogin();

    $page = new PageAdmin();
    $page->setTpl("products-create", [
        'errorRegister'=>User::getErrorRegister(),
		'registerValues'=>(isset($_SESSION['registerValues'])) ? $_SESSION['registerValues'] : ['desproduct'=>'', 'vlprice'=>'', 'vlwidth'=>'', 'vlheight'=>'', 'vllength'=>'', 'vlweight'=>'', 'desurl'=>'']
        ]);
});

// definir a rota e criar pordutos
$app -> post("/admin/products/create", function(){

    User::verifyLogin();

    $_SESSION['registerValues'] = $_POST;

    if (!isset($_POST['desproduct']) || $_POST['desproduct'] == '') {

		User::setErrorRegister("Preencha o nome do produto.");
		header("Location: /admin/products/create");
		exit;

	}

    if (!isset($_POST['vlprice']) || $_POST['vlprice'] == '') {

		User::setErrorRegister("Preencha o preço.");
		header("Location: /admin/products/create");
		exit;

	}

    if (!isset($_POST['vlwidth']) || $_POST['vlwidth'] == '') {

		User::setErrorRegister("Preencha a largura.");
		header("Location: /admin/products/create");
		exit;

	}

    if (!isset($_POST['vlheight']) || $_POST['vlheight'] == '') {

		User::setErrorRegister("Preencha a altura.");
		header("Location: /admin/products/create");
		exit;

	}

    if (!isset($_POST['vllength']) || $_POST['vllength'] == '') {

		User::setErrorRegister("Preencha a profundidade.");
		header("Location: /admin/products/create");
		exit;

	}

    if (!isset($_POST['vlweight']) || $_POST['vlweight'] == '') {

		User::setErrorRegister("Preencha o peso.");
		header("Location: /admin/products/create");
		exit;

	}

    if (!isset($_POST['desurl']) || $_POST['desurl'] == '') {

		User::setErrorRegister("Preencha o link.");
		header("Location: /admin/products/create");
		exit;

	}

    if (User::checkLoginExist2($_POST['desproduct']) === true) {

		User::setErrorRegister("O nome do produto já está registado.");
		header("Location: /admin/products/create");
		exit;

	}

    if (User::checkLoginExist3($_POST['desurl']) === true) {

		User::setErrorRegister("O link do produto já está registado.");
		header("Location: /admin/products/create");
		exit;

	}
    
    $product = new Product();

    $product->setData($_POST);

    $product->save();

    $_SESSION['registerValues'] = NULL;

    header("Location: /admin/products");
    exit;
});

$app->get("/admin/products/:idproduct", function($idproduct){
    User::verifyLogin();
    $product = new Product();
    $product->get((int)$idproduct);
    $page = new PageAdmin();
    $page->setTpl("products-update",[
        'product'=>$product->getValues(),
        'errorRegister'=>User::getErrorRegister(),
		'registerValues'=>(isset($_SESSION['registerValues'])) ? $_SESSION['registerValues'] : ['desproduct'=>'', 'vlprice'=>'', 'vlwidth'=>'', 'vlheight'=>'', 'vllength'=>'', 'vlweight'=>'']
    ]);
});

$app -> post("/admin/products/:idproduct", function($idproduct){

    User::verifyLogin();
    $product = new Product();
    $product->get((int)$idproduct);
    $product->setData($_POST);
    $product->save();
    if($_FILES["file"]["name"] !== "") $product->setPhoto($_FILES["file"]);
    header("Location: /admin/products");
    exit;
});

$app -> get("/admin/products/:idproduct/delete", function($idproduct){

    User::verifyLogin();
    $product = new Product();
    $product->get((int)$idproduct);
    $product->delete();
    header("Location: /admin/products");
    exit;
});
?>