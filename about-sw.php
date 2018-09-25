<?php
    include "inportHeaders.php";

    $title = "About SW";

    $rows = $products->getProductsByFeatured(true);

    ob_start();
    //display 
    include "./templates/aboutPage.html.php";

    $output = ob_get_clean();
    include "./templates/layout.html.php";