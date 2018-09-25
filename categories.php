<?php
    include "inportHeaders.php";


    $title = "";
    $categoryId = "";
    $rows = "";

    if(isset($_GET["id"]))
    {
        $results = $category->getCategory($_GET["id"]);
        
        $title = $results["Name"];
        $categoryId = $results["Id"];

        $rows = $products->GetProductByCategory($categoryId);

        ob_start();
         
        include "./templates/categoryItems.html.php";
    }
    else
    {
        header('Location: '.'./');
    }

    $output = ob_get_clean();
    include "./templates/layout.html.php";
?>