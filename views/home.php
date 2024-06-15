<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../app/style.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            <?php 
                require_once "../models/User.php";
                $user = unserialize($_SESSION['user']);

                $friends = $user->getFriends($user->getId());
                if(count($friends)==0){
                    echo "<p> You Dont Follow Anybody </p>";
                    
                }else{
                echo "<p>Following:</p>";
                foreach ($friends as $friend) {
                    echo "<div onclick='showFriendsPosts(" . $friend . ")'>";
                    echo User::getUsernameById($friend);
                    echo "</div>";
                }
             }
            ?>
            </div>
            <div class="feed">
                <button onclick="toggleAddPost(false)">Add a post</button>
                <?php 
                    require_once '../controllers/PostController.php';
                    require_once '../models/Post.php';
                    require_once '../models/Comment.php';


                    $posts = PostController::get10LastPosts();
                   
                    foreach($posts as $post){
                        echo "<div class='post'>";
                        echo "<h3>" . $post->getTitle() . "</h3>";
                        echo "<p>" . $post->getBody() . "</p>";
                        echo $post->getUsernameById($post->getUserId());
                        echo "<p onclick='pushToPostPage(" . $post->getId() . ")' >" . "View All Comments</p>";

                        echo "</div>";
                       
                    }
                ?>
            </div>
        </div>
    </div>

    <div id="addPostPopup" class="addPostPopup">
        <p onclick="toggleAddPost(true)" class="closeButton">X</p>

        <form method="post" action="../app/posts/add_post.php">
            <input type="text" placeholder="title" name="title">
            <textarea name="body"></textarea>
            <input type="submit"/>
        </form>
    </div>
    <script>
        let addPostPopup = $("#addPostPopup");

        function toggleAddPost(isShowing){
            if(isShowing){
                addPostPopup.css("display","none");
                return;
            }
            addPostPopup.css("display","flex");
        }
        function pushToPostPage(postId){
            window.location.href="post.php?post_id=" +postId;
        }
        function showFriendsPosts(userId){
            window.location.href="relevent.php?user_id=" +userId;
        }
    </script>


</body>
</html>