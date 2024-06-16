<?php
require_once '../../models/Database.php';
require_once '../../models/User.php';
require_once '../../controllers/UserController.php';
require_once '../../controllers/AuthController.php';


if($_SERVER["REQUEST_METHOD"]=="GET"){
    $username = $_GET["username"];
    $pass = $_GET["password"];

    $auth = AuthController::loginUser($username, $pass);
    //authentication error
    if(!$auth){
        session_start();
        $_SESSION["error"]="Wrong Credentials";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        return;
    }
    //all good
    unset($_SESSION['error']);
    header("Location: ../../views/home.php");

    

    




}

?>