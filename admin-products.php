<?php
// use do website (class page)
use \jhenriquesousa\Page;

// use do painel de admin (class admin)
use \jhenriquesousa\PageAdmin;

use \jhenriquesousa\Model\User;

use \jhenriquesousa\Model\Category;

use \jhenriquesousa\Model\Product;

$app -> get("/admin/products", function(){

    User::verifyLogin();
    $products = Product::listAll();
    $page = new PageAdmin();
    $page->setTpl("products",[
        "products" => $products
    ]);
});

// definir a rota e buscar os dados
$app -> get("/admin/products/create", function(){

    User::verifyLogin();
    $page = new PageAdmin();
    $page->setTpl("products-create");
});

// definir a rota e criar pordutos
$app -> post("/admin/products/create", function(){

    User::verifyLogin();
    
    $product = new Product();

    $product->setData($_POST);

    $product->save();

    header("Location: /admin/products");
    exit;
});

$app -> get("/admin/products/:idproduct", function($idproduct){

    User::verifyLogin();
    $product = new Product();
    $product->get((int)$idproduct);
    $page = new PageAdmin();
    $page->setTpl("products-update", [
        "product" => $product ->getValues()
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