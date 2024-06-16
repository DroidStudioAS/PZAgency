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
}