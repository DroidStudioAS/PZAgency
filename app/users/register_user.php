<?php
require_once '../../models/Database.php';
require_once '../../models/User.php';
require_once '../../controllers/UserController.php';
require_once '../../controllers/AuthController.php';




if($_SERVER["REQUEST_METHOD"]=="POST"){
    $userController = new UserController();
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $confirmedPassword = htmlspecialchars($_POST["confirmed"]);


    if($password!==$confirmedPassword){
        session_start();
        $_SESSION["error-reg"]="Passwords Dont Match";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        return;
    }
    //check if there is a user with same username
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $usernameTaken = AuthController::checkIfUserAlreadyExists($username);
    if($usernameTaken){
        session_start();
        $_SESSION["error-reg"]="Username Taken";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        return;
    }
    //register user;
    $logUser = AuthController::registerUser($username, $hashedPassword,$password);
    if($logUser){
        header("Location: ../../views/home.php");
    }




}

?>