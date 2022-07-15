<?php
// use do website (class page)
use \jhenriquesousa\Page;

use \jhenriquesousa\Model\Category;

use \jhenriquesousa\Model\Product;

use \jhenriquesousa\Model\Cart;

use \jhenriquesousa\Model\User;
// rota para o website
$app->get('/', function() {

	$products2 = Product::listAllProdutos();

	$products = Product::listAllIndex();
    
	$page = new Page();

	$page->setTpl("index", [
		'products' =>Product::checkList($products),
		'products2' =>Product::checkList($products2)
	]);

});

$app->get('/404', function() {
    
	$page = new Page();

	$page->setTpl("404");

});

$app->get('/novidades', function() {

	$products = Product::listAllNovidades();
    
	$page = new Page();

	$page->setTpl("novidades", [
		'products' =>Product::checkList($products)
	]);

});

$app->get('/produtos', function() {

	$products2 = Product::listAllProdutos();
    
	$page = new Page();

	$page->setTpl("produtos", [
		'products2' =>Product::checkList($products2)
	]);

});

$app->get('/redirect', function() {

	User::verifyLogin(false);
    
	$page = new Page();

	$page->setTpl("redirect");

});

// rota para a categoria escolhida (através do id dela- :idcategory)
$app->get("/categories/:idcategory", function($idcategory){

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	$category = new Category();

	$category->get((int)$idcategory);

	$pagination = $category->getProductsPage($page);

	$pages = [];

	for ($i=1; $i <= $pagination['pages']; $i++) { 
		array_push($pages, [
			'link'=>'/categories/'.$category->getidcategory().'?page='.$i,
			'page'=>$i
		]);
	}

	$page = new Page();

	$page->setTpl("category", [
		'category'=>$category->getValues(),
		'products'=>$pagination["data"],
		'pages'=>$pages
	]);

});

$app->get("/products/:desurl", function($desurl){

	$product = new Product();

	$products = Product::listAllIndex();

	$product->getFromURL($desurl);

	$page = new Page();

	$page->setTpl("product-detail", [
		'product'=>$product->getValues(),
		'categories'=>$product->getCategories(),
		'products' =>Product::checkList($products)
	]);

});

$app->get("/cart", function(){

	$cart = Cart::getFromSession();

	$page = new Page();

	$page->setTpl("cart", [
		'cart'=>$cart->getValues(),
		'products'=>$cart->getProducts()
	]);

});

$app->get("/cart/:idproduct/add", function($idproduct){

	$product = new Product();

	$product->get((int)$idproduct);

	$cart = Cart::getFromSession();

	$qtd = (isset($_GET['qtd'])) ? (int)$_GET['qtd'] : 1;

	for ($i = 0; $i < $qtd; $i++) {

		$cart->addProduct($product);

	}

	header("Location: /cart");
	exit;

});

$app->get("/cart/:idproduct/minus", function($idproduct){

	$product = new Product();

	$product->get((int)$idproduct);

	$cart = Cart::getFromSession();

	$cart->removeProduct($product);

	header("Location: /cart");
	exit;

});

$app->get("/cart/:idproduct/remove", function($idproduct){

	$product = new Product();

	$product->get((int)$idproduct);

	$cart = Cart::getFromSession();

	$cart->removeProduct($product, true);

	header("Location: /cart");
	exit;

});

$app->get("/login", function(){

	$page = new Page();

	$page->setTpl("login", [
		'error'=>User::getError(),
		'errorRegister'=>User::getErrorRegister(),
		'registerValues'=>(isset($_SESSION['registerValues'])) ? $_SESSION['registerValues'] : ['name'=>'', 'email'=>'', 'phone'=>'']
	]);

});

$app->post("/login", function(){

	try {

		User::login($_POST['login'], $_POST['password']);

	} catch(Exception $e) {

		User::setError($e->getMessage());

	}

	header("Location: /redirect");
	exit;

});

$app->get("/logout", function(){

	User::logout();

	header("Location: /login");
	exit;

});

$app->post("/register", function(){

	$_SESSION['registerValues'] = $_POST;

	if (!isset($_POST['name']) || $_POST['name'] == '') {

		User::setErrorRegister("Preencha o seu nome.");
		header("Location: /login");
		exit;

	}

	if (!isset($_POST['email']) || $_POST['email'] == '') {

		User::setErrorRegister("Preencha o seu e-mail.");
		header("Location: /login");
		exit;

	}

	if (!isset($_POST['password']) || $_POST['password'] == '') {

		User::setErrorRegister("Preencha a senha.");
		header("Location: /login");
		exit;

	}

	if (User::checkLoginExist($_POST['email']) === true) {

		User::setErrorRegister("Este endereço de e-mail já está a ser usado por outro utilizador.");
		header("Location: /login");
		exit;

	}

	$user = new User();

	$user->setData([
		'inadmin'=>0,
		'deslogin'=>$_POST['email'],
		'desperson'=>$_POST['name'],
		'desemail'=>$_POST['email'],
		'despassword'=>$_POST['password'],
		'nrphone'=>$_POST['phone']
	]);

	$user->save();

	User::login($_POST['email'], $_POST['password']);

	$_SESSION['registerValues'] = NULL;

	header('Location: /redirect');
	exit;

});

$app->get("/forgot", function() {

	$page = new Page();

	$page->setTpl("forgot");
});

$app->post("/forgot", function(){

	// método para fazer as verificações
	$user = User::getForgot($_POST["email"], false);

	header("Location: /forgot/sent");
	exit;
});

$app->get("/forgot/sent", function(){
	$page = new Page();

	$page->setTpl("forgot-sent");
});

$app->get("/forgot/reset", function(){
	// a que utilizador este código pertence
	$user = User::validForgotDecrypt($_GET["code"]);

	$page = new Page();

	$page->setTpl("forgot-reset", array(
		"name" => $user["desperson"],
		"code" => $_GET["code"]

	));

});

$app->post("/forgot/reset", function(){

	$forgot = User::validForgotDecrypt($_POST["code"]);	

	User::setFogotUsed($forgot["idrecovery"]);

	$user = new User();

	$user->get((int)$forgot["iduser"]);

	$password = password_hash($_POST["password"], PASSWORD_DEFAULT, [
		"cost"=>12
	]);

	$user->setPassword($password);

	$page = new Page();

	$page->setTpl("forgot-reset-success");

});

$app->get("/user-dashboard", function(){

	User::verifyLogin(false);

	$user = User::getFromSession();

	$page = new Page();

	$page->setTpl("user-dashboard", [
		'user'=>$user->getValues(),
		'error'=>User::getError(),
		'success'=>User::getSuccess()
	]);

});

$app->post("/user-dashboard", function() {

	User::verifyLogin(false);
	
	//Tratando erros - validações
	if (!isset($_POST['desperson']) || $_POST['desperson'] === '') {
	User::setError("Preencha o seu nome.");
	header("Location: /user-dashboard");
	exit;
	}
	
	if (!isset($_POST['desemail']) || $_POST['desemail'] === '') {
	User::setError("Preencha o seu e-mail.");
	header("Location: /user-dashboard");
	exit;
	}
	
	$user = User::getFromSession();
	var_dump($user);
	
	//Verificar se existe outro usuário cadastrado usando o mesmo login(desemail)
	//Se houve alteração do email
	if ($_POST['desemail'] !== $user->getdesemail()) {
	
	if (User::checkLoginExist($_POST['desemail']) === true){
	User::setError("Este endereço de email já está registado.");
	header("Location: /user-dashboard");
	exit;
	}
	}
	
	//Para impedir que o usuário mude o inadmin e senha, força pegar a informação do objeto $user
	$_POST['iduser'] = $user->getiduser();
	$_POST['inadmin'] = $user->getinadmin();
	$_POST['despassword'] = $user->getdespassword();
	$_POST['deslogin'] = $_POST['desemail'];
	
	$user->setData($_POST);
	
	$user->update(false);

	$_SESSION[User::SESSION] = $user->getValues(); 
	
	User::setSuccess("Dados alterados com sucesso!");
	
	header("Location: /user-dashboard");
	exit;
	
	});
	
	$app->get("/user-dashboard/change-password", function(){

		User::verifyLogin(false);
	
	});

	
	$app->post("/user-dashboard/change-password", function(){
	
		User::verifyLogin(false);
	
		if (!isset($_POST['current_pass']) || $_POST['current_pass'] === '') {
	
			User::setError("Digite a palavra-passe atual.");
			header("Location: /user-dashboard");
			exit;
	
		}
	
		if (!isset($_POST['new_pass']) || $_POST['new_pass'] === '') {
	
			User::setError("Digite a nova palavra-passe.");
			header("Location: /user-dashboard");
			exit;
	
		}
	
		if (!isset($_POST['new_pass_confirm']) || $_POST['new_pass_confirm'] === '') {
	
			User::setError("Confirme a nova palavra-passe.");
			header("Location: /user-dashboard");
			exit;
	
		}
	
		if ($_POST['current_pass'] === $_POST['new_pass']) {
	
			User::setError("A sua nova palavra-passe deve ser diferente da atual.");
			header("Location: /user-dashboard");
			exit;		
	
		}
	
		$user = User::getFromSession();
	
		if (!password_verify($_POST['current_pass'], $user->getdespassword())) {
	
			User::setError("A palavra-passe está inválida.");
			header("Location: /user-dashboard");
			exit;			
	
		}

		if ($_POST['new_pass'] != $_POST['new_pass_confirm']) {
	
			User::setError("As palvras-passe não coincidem.");
			header("Location: /user-dashboard");
			exit;		
	
		}
	
		$user->setdespassword($_POST['new_pass']);
	
		$user->update();
	
		User::setSuccess("Palavra-passe alterada com sucesso.");
	
		header("Location: /user-dashboard");
		exit;
	
	});

?>