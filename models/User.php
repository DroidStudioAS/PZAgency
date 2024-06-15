<?php
class User{
    //properties
    private $id;
    private $username;
    private $password;
    private $picture;


public function __construct($id, $username, $password, $picture){
    $this->id = $id;
    $this->username=$username;
    $this->$password=$password;
    $this->picture=$picture;
}
public function getId(){
    return $this->id;
}
public static function generateSlug($string) {
    // Convert accented characters to ASCII
    $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);

    // Remove non-word characters (only allow alphanumeric and hyphens)
    $string = preg_replace('/[^\w\-]+/', '', $string);

    // Replace spaces with hyphens
    $string = str_replace(' ', '-', $string);

    // Remove duplicate hyphens
    $string = preg_replace('/\-+/', '-', $string);

    // Trim hyphens from the beginning and end of the string
    $string = trim($string, '-');

    // Convert to lowercase
    $string = strtolower($string);

    return $string;
}


}
 
?>