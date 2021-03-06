<?php 

session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;


$app = new Slim();

$app->config('debug', true);

// como as rotas estão a começar a acumular vamoscomeçar a usar ficheiros externos para as chamadas efetuadas
require_once("site.php");

require_once("admin.php");

require_once("admin-users.php");

require_once("admin-login.php");

require_once("admin-categories.php");

require_once("admin-products.php");

require_once("functions.php");

$app->run();

 ?>