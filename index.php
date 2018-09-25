<?php
    include "inportHeaders.php";

    $category = new Category();
    $products = new Products();

    $title = "Home Page";

    $rows = $products->getProductsByFeatured(true);

    ob_start();
    //display 
    include "./templates/homePage.html.php";

    $output = ob_get_clean();
    include "./templates/layout.html.php";