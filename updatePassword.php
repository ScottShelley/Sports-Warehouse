<?php
    include "inportHeaders.php";
    Auth::protect();

    $title = "Update Password";
    $message = null;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_SESSION["UsernameId"])) {
            if ($_POST["password"] && $_POST["current"])
            {
                $loginSuccess = Auth::updatePassword($_SESSION["UsernameId"], $_POST["current"], $_POST["password"]);

                if(!$loginSuccess)
                {
                    $message = "Incorrect Password!";
                }
            }    
        }
    }

    ob_start();
    //display 
    include "./templates/updatePasswordForm.html.php";

    $output = ob_get_clean();
    include "./templates/layout.html.php";