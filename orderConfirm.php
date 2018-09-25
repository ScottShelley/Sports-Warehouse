<?php
    include "inportHeaders.php";

    $title = "Order Confirmation";

    ob_start();

    $orderId = $_GET["orderId"];

    include "templates/confirmation.html.php";

    $output = ob_get_clean();

    include "templates/layout.html.php";