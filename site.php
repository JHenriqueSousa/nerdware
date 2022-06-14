<?php
// use do website (class page)
use \jhenriquesousa\Page;

use \jhenriquesousa\Model\Category;

use \jhenriquesousa\Model\Product;
// rota para o website
$app->get('/', function() {
    
	$page = new Page();

	$page->setTpl("index");

});

?>