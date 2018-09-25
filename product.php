<?php
    include "inportHeaders.php";

    $title = "";

    if(isset($_GET["id"]))
    {
        $productId = $_GET["id"];
        //get the product details
        $row = $products->GetProductById($productId);
        $title = $row["Name"];
    }
    else
    {
        header('Location: '.'./');
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["quantity"])
        {
            $qty = $_POST["quantity"];
            //create a new cart item so it can be added to the shopping cart
            $item = new CartItem($row["Name"], $qty, $row["Price"], $productId);

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
            //add item to shopping cart
            $cart->addItem($item);
            //save shopping cart back into session
            $_SESSION["cart"] = $cart;
            $cartItems = $cart->getItems();
        }
        else
        {

        }
    }

    ob_start(); 
    include "./templates/productPage.html.php";

    $output = ob_get_clean();
    include "./templates/layout.html.php";