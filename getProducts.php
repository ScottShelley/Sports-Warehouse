<?php
    require_once "classes/Products.php";
    require_once "classes/Auth.php";

    //Authentication
    session_start();
    $authorize = Auth::authorize();

    if (true) {
        $products = new Products();

        $rows = $products->getProducts();

        echo json_encode($rows);
    }