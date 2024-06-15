<?php

if($_SERVER["REQUEST_METHOD"]=="GET"){
    PostController::getPostsByOtherUser($_GET["user_id"]);
}