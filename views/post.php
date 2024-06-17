<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../app/style.css"/>
    <title>Post</title>
</head>
<body>
    <?php include "reusable/navigation.php" ?>
    <div class="postsContainer">
    <?php
        require_once "../models/Post.php";
        require_once "../models/Comment.php";
        $postId = $_GET["post_id"];
        $post = Post::getPostById($postId);
        
        echo "<div class='post'>";
        echo "<h3 class='postTitle'>";
        echo $post->getTitle();
        echo "</h3>";
        echo  "<p>" ."\"  " . $post->getBody() ."  \"". "</p>";
        echo "<p>By: <span class='postAuthor'>" .  $post->getUsernameById($post->getUserId()) . "</span></p>";
        echo "</div>";
        ?>

        <form method="post", action="../app/comments/add_comment.php">
            <input class="authInput" type="text" placeholder="Leave a comment" name="body">
            <?php 
                echo "<input type='hidden' name='postId' value='" .  $_GET["post_id"] . "'>";
            ?>
            <input class="inputSubmit" type="submit" value="+">
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
            if($userId!==$user->getId()){
                 echo '<input class="followTrigger" type="submit" value="Unfollow post author">';
            }
            }else{
            echo '<input class="followTrigger" type="submit" value="Follow post author">';

         }
         echo "<input type='hidden' name='userId' value='" . $userId . "'>"
         ?>
        </form>


        <?php
        if(isset($_SESSION['error'])){
            echo "<div class='error-message'>";
            echo $_SESSION["error"];
            echo "</div>";
        }
        echo "<p class='header'>";
        echo "Comments";
        echo "</p>";
        $comments = Post::getComments($post->getId());
        echo "<div class='commentContainer'>";
        $i=0;
        foreach($comments as $comment){
            if($i%2==0){
                echo "<div class='comment_even'>";
            }else{
                echo "<div class='comment_uneven'>";
            }
            
            echo "<p>";
            echo $post->getUsernameById($comment->getUserId());
            echo "</p>";
            echo "<p>";
            echo $comment->getBody();
            echo "</p>";
            echo "</div>";
            $i++;
        }
        echo "</div>";

    ?>
      


    </div>

</body>
</html>