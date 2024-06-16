<?php

require_once "../../models/Post.php";
require_once "../../models/Database.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
   $postId = $_POST["post_id"];
   $isDeleted =  Post::deletePost($postId);

   if(!$isDeleted){
    echo false;
    return;
   }
   echo true;
   

}