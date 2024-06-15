<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>
<body>
    <?php
        require_once "../models/Post.php";
        require_once "../models/Comment.php";

        $postId = $_GET["post_id"];
        $post = Post::getPostById($postId);
        
        echo "<div class='post'>";
        echo "<h3>";
        echo $post->getTitle();
        echo "</h3>";
        echo "<p>";
        echo $post->getBody();
        echo "</p>";
        echo "<p>";
        echo $post->getUsernameById($post->getUserId());
        echo "</p>";
        echo "<p>";
        echo "Comments";
        echo "</p>";
        $comments = Post::getComments($post->getId());
        foreach($comments as $comment){
            echo "<div class='comment'>";
            echo "<p>";
            echo $post->getUsernameById($comment->getUserId());
            echo "</p>";
            echo "<p>";
            echo $comment->getBody();
            echo "</p>";
            echo "</div>";
        }

        echo "</div>";
    ?>
        <form method="post", action="../app/comments/add_comment.php">
            <input type="text" placeholder="Leave a comment" name="body">
            <?php 
                echo "<input type='hidden' name='postId' value='" .  $_GET["post_id"] . "'>";
            ?>
            <input type="submit">
        </form>
            
         <form method="post", action="../app/users/add_friend.php">
         <?php 
         require_once "../models/User.php";
         require_once "../models/Post.php";

         session_start();
         $user = unserialize($_SESSION['user']);
         $friends = $user->getFriends($user->getId());
         
         $post = Post::getPostById($_GET["post_id"]);
         $userId = $post->getUserId();
         if(in_array($userId, $friends) || $userId==$user->getId()){
             return;
         }
         echo "<input type='hidden' name='userId' value='" . $userId . "'>"
         ?>
         <input type="submit" value="Follow post author">
        </form>


</body>
</html>