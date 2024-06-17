<?php

require_once "../../models/User.php";
require_once "../../controllers/CommentController.php";

if($_SERVER["REQUEST_METHOD"]=="GET"){
    session_start();
    $user = unserialize($_SESSION['user']);
    
    CommentController::getUserComments($user->getId());
}