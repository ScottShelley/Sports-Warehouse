<?php
    include "inportHeaders.php";

    $title = "Check Out";

    if ($cartItems == null) {
        header('Location: '.'./');
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["cart"])) {
        if ($_POST["firstName"] && $_POST["lastName"] && $_POST["phone"] && $_POST["email"] && $_POST["address"] && $_POST["number"] && $_POST["name"] && $_POST["expiry"] && $_POST["cvc"])
        {
            $cart = $_SESSION["cart"];

            $orderId = $cart->saveCart($_POST["address"], $_POST["phone"], $_POST["number"], $_POST["cvc"], $_POST["email"], $_POST["expiry"], $_POST["firstName"], $_POST["lastName"], $_POST["name"]);
            
            session_destroy();

            header("Location: "."./orderConfirm.php?orderId=$orderId");
        }
    }

    ob_start(); 
    include "./templates/checkoutForm.html.php";

    $output = ob_get_clean();
    include "./templates/layout.html.php";