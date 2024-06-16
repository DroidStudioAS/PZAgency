<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../app/style.css"/>
    <title>Posts</title>
</head>
<body class="authContainer">
    <h1 class="header">
        <?php
            include "reusable/navigation.php";

             require_once "../models/User.php";
             echo "<h1 class='header'> Posts by: " .  User::getUsernameById($_GET['user_id']) . "</h1>";

        ?>
    </h1>
    <?php
        require_once "../controllers/PostController.php";
        require_once "../models/Post.php";

        PostController::getPostsByOtherUser($_GET['user_id']);
        if(isset($_SESSION['posts'])){
           $posts = unserialize($_SESSION["posts"]);
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