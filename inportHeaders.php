<?php
require_once "classes/Category.php";
require_once "classes/Products.php";
require_once "classes/ShoppingCart.php";
require_once "classes/Auth.php";

$category = new Category();
$products = new Products();

session_start();

// Add Shopping Cart
if(!isset($_SESSION["cart"]))
{
    //if shopping cart is not set create a new empty shopping cart
    $cart = new ShoppingCart();
}
else
{
    //read shopping cart from session
    $cart = $_SESSION["cart"];
}

if (!isset($_SESSION["theme"])) {
    $_SESSION["theme"] = "blue";
}

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    if(isset($_GET["remove"]))
    {
        if(!empty($_GET["productId"]) && isset($_SESSION["cart"]))
        {
            $item = new CartItem("", 0, 0, $_GET["productId"]);

            $cart->removeItem($item);

            $_SESSION["cart"] = $cart;
        }
    }
}

$cartItems = $cart->getItems();

//Authentication
$authorize = Auth::authorize();