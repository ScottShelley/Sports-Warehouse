<?php
    require_once "classes/Auth.php";
    // Auth::protect();
    session_start();
    Auth::logout();