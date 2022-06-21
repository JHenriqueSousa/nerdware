<?php

use \jhenriquesousa\Model\Cart;

use \jhenriquesousa\Model\User;

use \jhenriquesousa\Model\Product;

use \jhenriquesousa\Model\Category;

function formatPrice(float $vlprice)
{
    return number_format($vlprice, 2, ',', ' ');
}

function getCartNrQtd()
{

	$cart = Cart::getFromSession();

	$totals = $cart->getProductsTotals();

	return $totals['nrqtd'];

}

function getCartVlSubTotal()
{

	$cart = Cart::getFromSession();

	$totals = $cart->getProductsTotals();

	return formatPrice($totals['vlprice']);

}

function checkLogin($inadmin = true)
{

	return User::checkLogin($inadmin);

}

function getUserName()
{

	$user = User::getFromSession();

	return $user->getdesperson();

}
?>