<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        session_start();
        $_SESSION["theme"] = $_POST["theme"];
    }
    header('Location: '.'./');