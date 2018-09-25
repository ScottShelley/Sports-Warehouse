<?php
    include "inportHeaders.php";
    Auth::protect();

    $title = "Create User";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["fName"] && $_POST["lName"] && $_POST["email"] && $_POST["password"])
        {
            $user = new Auth();

            $user->createUser($_POST["fName"], $_POST["lName"], $_POST["email"], $_POST["password"]);
        }
        else
        {

        }
    }

    ob_start();
    //display 
    include "./templates/createUserForm.html.php";

    $output = ob_get_clean();
    include "./templates/layout.html.php";