<?php
class Validator{

public static function validatePasswordUsernameLength($username, $password){
    $usernameLength = strlen($username);
    $passwordLength = strlen($password);
    if($usernameLength<6 || $passwordLength<6){
        return false;
    }
    return true;
}
public static function validateCommentBody($body){
    return strlen($body)>0 && strlen($body)<500;
}
public static function validatePost($postId, $title, $body){
    if($postId === null || $title==="" || $body===""){
        return false;
    }
    return true;
}
}