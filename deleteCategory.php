<?php
    require_once "classes/Category.php";
    require_once "classes/Auth.php";

    //Authentication
    session_start();
    $authorize = Auth::authorize();

    if ($authorize) {
        if($_GET["id"])
        {
            $category = new Category();

            $category->deleteCategory($_GET["id"]);
        }
        
    }

    header('Location: '.'./manageCategories.php');