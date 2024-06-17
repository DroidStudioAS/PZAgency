<?php

require_once "../../controllers/CommentController.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $commendId = $_POST['id'];
    $commentBody = $_POST['body'];
    
    CommentController::editComment($commendId, $commentBody);

}