<?php

require_once "../../models/User.php";
if($_SERVER["REQUEST_METHOD"]=="GET"){
    session_start();
    $user = unserialize($_SESSION['user']);
    var_dump($user->getId());
}