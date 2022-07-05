<?php

require_once("vendor/autoload.php");

use \Slim\Slim;

use \jhenriquesousa\Page;

// rota para o website
$app->get('/', function() {

	$products = Product::listAll();
    
	$page = new Page();

	$page->setTpl("index");

});

?>