<?php
    if($_SERVER["SERVER_NAME"] == "localhost" || $_SERVER["SERVER_ADDR"] == "127.0.0.1")
    {
    //website is running unser locahost - use local DB details
        $dsn = "mysql:host=localhost;dbname=sportswarehousedb;charset=utf8";
        $username = "root";
        $password = "";
    }
    else
    {
        //website is running on the remote server
        $dsn = "mysql:host=localhost;dbname=magenta13;charset=utf8";
        $username = "magenta13";
        $password = "president90";
    }
?>