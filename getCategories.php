<?php
    require_once "classes/Category.php";
    require_once "classes/Auth.php";

    //Authentication
    session_start();
    $authorize = Auth::authorize();

    if ($authorize) {
        $category = new Category();

        $rows = $category->getCategories();

        echo json_encode($rows);
    }
    
    