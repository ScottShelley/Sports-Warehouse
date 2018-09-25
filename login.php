<?php
    include "inportHeaders.php";

    $title = "Login";
    $pageHeading = "Login";

    $message = "";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if($_POST["username"] && $_POST["password"])
        {
            //authenticate user
            $loginSuccess = Auth::login($_POST["username"], $_POST["password"]);
            if(!$loginSuccess)
            {
                $message = "Username or password incorrect";
                $error = true;
            }
        }
    }
    //start buffer
    ob_start();
    //display create user form
    include "templates/LoginForm.html.php";
    $output = ob_get_clean();
    include "templates/layout.html.php";