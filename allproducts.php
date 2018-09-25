<?php
    include "inportHeaders.php";

    $title = "All Products";

    $rows = $products->getProducts();

    ob_start();
    //display 
    include "./templates/displayProducts.html.php";

    $output = ob_get_clean();
    include "./templates/layout.html.php";