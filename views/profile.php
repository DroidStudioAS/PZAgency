<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
             require_once "../models/User.php";
             session_start();
             $user = unserialize($_SESSION['user']);
             echo $user->getUsername();
        ?>
    </title>
</head>
<body>
    <?php 
        require_once "../controllers/PostController.php";
        $posts = Post::getUsersPosts($user->getId());
        if(count($posts)==0){
            echo "<div> You Have No Posts </div>";
        }else{
            foreach($posts as $post){
                echo "<div class='post'>";
                echo "<h3>" . $post->getTitle() . "</h3>";
                echo "<p>" . $post->getBody() . "</p>";
                echo $post->getUsernameById($post->getUserId());
                echo "<p onclick='pushToPostPage(" . $post->getId() . ")' >" . "View All Comments</p>";

                echo "</div>";
            }
        }
    ?>
    <script>
        function pushToPostPage(postId){
            window.location.href="post.php?post_id=" +postId;
        }
    </script>
</body>
</html>