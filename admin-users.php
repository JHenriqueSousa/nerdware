<?php
// use do website (class page)
use \jhenriquesousa\Page;

// use do painel de admin (class admin)
use \jhenriquesousa\PageAdmin;

use \jhenriquesousa\Model\User;

use \jhenriquesousa\Model\Category;

use \jhenriquesousa\Model\Product;

$app->get('/admin/users', function() {

// verificar se o utilizador fez login
User::verifyLogin();

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = User::getPageSearch($search, $page);

	} else {

		$pagination = User::getPage($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/admin/users?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);

	}

	$page = new PageAdmin();

	$page->setTpl("users", array(
		"users"=>$pagination['data'],
		"search"=>$search,
		"pages"=>$pages
	));

});

$app->get('/admin/users/create', function() {

// verificar se o utilizador fez login
User::verifyLogin();

// listar todos os utilizadores
$page = new PageAdmin();

$page->setTpl("users-create", [
    'errorRegister'=>User::getErrorRegister(),
    'registerValues'=>(isset($_SESSION['registerValues'])) ? $_SESSION['registerValues'] : ['desperson'=>'', 'deslogin'=>'', 'nrphone'=>'', 'desemail'=>'', 'despassword'=>'']
    ]);
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

$_SESSION['registerValues'] = $_POST;

    if (!isset($_POST['desperson']) || $_POST['desperson'] == '') {

		User::setErrorRegister("Preencha o nome do utilizador.");
		header("Location: /admin/users/create");
		exit;

	}

    if (!isset($_POST['deslogin']) || $_POST['deslogin'] == '') {

		User::setErrorRegister("Preencha o campo login.");
		header("Location: /admin/users/create");
		exit;

	}

    if (!isset($_POST['nrphone']) || $_POST['nrphone'] == '') {

		User::setErrorRegister("Preencha o número de telefone.");
		header("Location: /admin/users/create");
		exit;

	}

    if (!isset($_POST['desemail']) || $_POST['desemail'] == '') {

		User::setErrorRegister("Preencha o email.");
		header("Location: /admin/users/create");
		exit;

	}


    if (!isset($_POST['despassword']) || $_POST['despassword'] == '') {

		User::setErrorRegister("Preencha a palavra-passe.");
		header("Location: /admin/users/create");
		exit;

	}

    if (User::checkLoginExist($_POST['deslogin']) === true) {

		User::setErrorRegister("O login já está registado.");
		header("Location: /admin/users/create");
		exit;

	}

    if (User::checkLoginExist4($_POST['desemail']) === true) {

		User::setErrorRegister("O email já está registado.");
		header("Location: /admin/users/create");
		exit;

	}

$user = new User();

// verificar se foi selecionado a opcao de admin
$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

$user->setData($_POST);

$user->save();

$_SESSION['registerValues'] = NULL; 

header("Location: /admin/users");
exit;
});

// guardar o que foi editado
$app->post("/admin/users/:iduser", function($iduser){
User::verifyLogin();

$user = new User();

$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

$user->get((int)$iduser);

$user->setData($_POST);

$user->update(false);

header("Location: /admin/users");
exit;

});

?>