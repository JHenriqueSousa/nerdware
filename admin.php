<?php
// use do website (class page)
use \jhenriquesousa\Page;

// use do painel de admin (class admin)
use \jhenriquesousa\PageAdmin;

use \jhenriquesousa\Model\User;

use \jhenriquesousa\Model\Category;

use \jhenriquesousa\Model\Product;

$app->get('/admin', function() {
	// quando a rota for chamada a sessão já foi criada (no user.php), contudo precisa ser validada (na rota admin e não do admin/login visto que o admin precisa de efetuar o login). Para isso criamos um método de validação (verifyLogin- está no user.pho)
    User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("index");

});
?>