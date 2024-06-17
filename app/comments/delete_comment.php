<?php

require_once "../../controllers/CommentController.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
     CommentController::deleteComment($_POST['comment']);
}