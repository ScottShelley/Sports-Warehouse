<?php
    require_once "classes/Products.php";
    require_once "classes/Auth.php";

    //Authentication
    session_start();
    $authorize = Auth::authorize();

    if ($authorize) {
        if($_GET["id"])
        {
            $product = new Products();

            $product->deleteProduct($_GET["id"]);
        }
        
    }

    header('Location: '.'./manageProducts.php');