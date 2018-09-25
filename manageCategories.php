<?php
    include "inportHeaders.php";
    Auth::protect();

    $title = "Manage Categories";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["add"]))
        {
            if($_POST["name"])
            {
                $category->insertCategory($_POST["name"]);
            }
        }
        else if(isset($_POST["edit"]))
        {
            if($_POST["id"] && $_POST["name"])
            {
                $category->updateCategory($_POST["id"], $_POST["name"]);
            }
        }
    }

    ob_start();
    //display 
    include "./templates/manageCategories.html.php";

    $output = ob_get_clean();
    include "./templates/layout.html.php";