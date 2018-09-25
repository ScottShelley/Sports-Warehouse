<?php
    include "inportHeaders.php";
    Auth::protect();

    $title = "Manage Products";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["featured"])) {
            $featured = $_POST["featured"] ? true : false;
        }
        else {
            $featured = false;
        }

        require_once "classes/Image.php";
        $image = new Image();

        if(isset($_POST["add"]))
        {
            if($_POST["name"] && $_POST["description"] && $_POST["price"] && $_POST["salePrice"] && $_POST["categoryID"])
            {
                $targetFile = $image->uploadImage(basename($_FILES["photoPath"]["name"]));

                if ($targetFile) {
                    $products->insertProduct($_POST["name"], $_POST["description"], $_POST["price"], $_POST["salePrice"], $targetFile, $featured, $_POST["categoryID"]);
                }
            }
        }
        else if(isset($_POST["edit"]))
        {
            if($_POST["id"] && $_POST["name"] && $_POST["description"] && $_POST["price"] && $_POST["salePrice"] && $_POST["categoryID"])
            {
                $products->updateProduct($_POST["id"], $_POST["name"], $_POST["description"], $_POST["price"], $_POST["salePrice"], $featured, $_POST["categoryID"]);
            }
        }
        else if(isset($_POST["updatePhoto"]))
        {
            $targetFile = $image->uploadImage(basename($_FILES["photoPath"]["name"]));

            if ($targetFile && $_POST["id"]) {
                $products->updatePhoto($_POST["id"], $targetFile);
            }
        }
    }

    ob_start();
    //display 
    include "./templates/manageProducts.html.php";

    $output = ob_get_clean();
    include "./templates/layout.html.php";