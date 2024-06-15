<?php
require_once "../../controllers/CommentController.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
   $commentController = new CommentController();
   $commentController->addComment($_POST["body"], $_POST["postId"]);
}