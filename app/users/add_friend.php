<?php
    require_once "../../controllers/UserController.php";

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $friendId=$_POST["userId"];
        $userController==UserController::addToFriends($friendId);
    }
?>