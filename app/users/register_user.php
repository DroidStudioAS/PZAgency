<?php
require_once '../../models/Database.php';
require_once '../../models/User.php';
require_once '../../controllers/UserController.php';


if($_SERVER["REQUEST_METHOD"]=="POST"){
    $userController = new UserController();
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $confirmedPassword = htmlspecialchars($_POST["confirmed"]);

    if($password!==$confirmedPassword){
        //return msg for user that passes dont match
        die();
    }
    //check if there is a user with same username
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $usernameTaken = $userController->checkIfUserAlreadyExists($username);
    if($usernameTaken){
        //return user back with message
       die();
    }
    //register user;
    $userController->registerUser($username, $hashedPassword);
    




}

?>