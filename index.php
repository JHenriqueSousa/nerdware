<?php 

require_once("vendor/autoload.php");

use \Slim\Slim;

// use do website (class page)
use jhenriquesousa\Page;

// use do painel de admin (class admin)
use jhenriquesousa\PageAdmin;


$app = new Slim();

$app->config('debug', true);

// rota para o website
$app->get('/', function() {
    
	$page = new Page();

	$page->setTpl("index");

});

// rota para o painel de admin
$app->get('/admin', function() {
    
	$page = new PageAdmin();

	$page->setTpl("index");

});

$app->run();

 ?>