<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../app/style.css"/>
    <title>Document</title>
</head>
<body>
    <?php include "reusable/navigation.php" ?>
    <div class="postsContainer">
        <?php
            require_once "../models/Comment.php";
            require_once "../models/User.php";
            session_start();
            if(isset($_SESSION["comments"])){
                $comments = unserialize($_SESSION["comments"]);
            }
            echo "<div class='commentContainer'>";
            $i=0;
            $username = "";
            foreach($comments as $comment){
                if($i==0){
                    $username = User::getUsernameById($comment->getUserId());
                }
               if($i%2==0){
                echo "<div class='comment_even'>";
               }else{
                echo "<div class='comment_uneven'>";
               }
               echo "<p>";
               echo $username;
               echo "</p>";
               echo "<p>\"";
               echo $comment->getBody();
               echo "\"</p>";
               echo "</div>";
            }
         echo "</div>"
        ?>
    </div>
    
</body>
</html>