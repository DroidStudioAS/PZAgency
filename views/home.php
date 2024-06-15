<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../app/style.css"/>
    <title>Homepage</title>
</head>
<body>
        <div class ="homeContainer">
        <div class="profileContainer">
              <?php 
                require_once "../models/User.php";

                session_start();
                $user = unserialize($_SESSION['user']);
                echo  "<h1> Welcome " . $user->getUsername() . "</h1>";
             ?>  
        </div>
        <div class="contentContainer">
            <div class="friendsContainer">

            </div>
            <div class="feed">
                <button>Add a post</button>
                <?php 
                    require_once '../models/Post.php';

                    $posts = Post::get10LastPosts();
                   
                    foreach($posts as $post){
                        echo "<div class='post'>";
                        echo "<h3>" . $post->getTitle() . "</h3>";
                        echo "<p>" . $post->getBody() . "</p>";
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>