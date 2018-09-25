<?php
    include "inportHeaders.php";


    $title = "Search";
    $rows = "";

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if(isset($_GET["value"]) && $_GET["value"])
        {
            $value = $_GET["value"];
            $rows = $products->getProductsBySearch($value);

            // echo "<pre>";
            // print_r($rows);
            // echo "</pre>";

            ob_start();
            include "./templates/searchResults.html.php";

            $output = ob_get_clean();
            include "./templates/layout.html.php";
        }
        else
        {
            header('Location: '.'./');
        }
    }
    else
    {
        header('Location: '.'./');
    }
?>