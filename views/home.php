<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../app/style.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <title>Homepage</title>
</head>
<body>
    <header>
        <?php
            include "reusable/navigation.php"
        ?>
    </header>
    <div class ="homeContainer">
        <div class="profileContainer">
              <?php 
                require_once "../models/User.php";
                session_start();
                $user = unserialize($_SESSION['user']);
                ?>
                <div id="welcomeCard" class="welcomeCard" onclick="addFlipCardEffect()">
                <div class="card-front">
                    <?php echo  "<h1> Welcome " . $user->getUsername() . "</h1>"; ?>
                </div>
                    <div class="card-back">
                       <p onclick="pushToProfilePage()" id="myPostsTrigger" class="myPosts">View Your Posts</p>
                    </div>
                </div>          
        </div>
        <div class="contentContainer">
            <div class="friendsContainer">
            <?php 
                require_once "../models/User.php";
                $user = unserialize($_SESSION['user']);

                $friends = $user->getFriends($user->getId());
                if(count($friends)==0){
                    echo "<p class='followingLabel'> You Dont Follow Anybody </p>";
                    
                }else{
                echo "<p class='followingLabel'>Following:</p>";
                foreach ($friends as $friend) {
                    echo "<div class='friend' onclick='showFriendsPosts(" . $friend . ")'>";
                    echo User::getUsernameById($friend);
                    echo "</div>";
                }
             }
            ?>
            </div>
            <div class="feedContainer">
                <div class="feedHeader">
                    <h2>Browse Posts</h2>
                    <button onclick="toggleAddPost(false)">Add a post</button>
                </div>
              
              <div class="feed">
                <?php 
                    require_once '../controllers/PostController.php';
                    require_once '../models/Post.php';
                    require_once '../models/Comment.php';


                    $posts = PostController::get10LastPosts();
                   
                    foreach($posts as $post){
                        echo "<div class='post'>";
                        echo "<h3 class='postTitle'>" . $post->getTitle() . "</h3>";
                        echo  "<p>" ."\"  " . $post->getBody() ."  \"". "</p>";
                        echo "<p>By: <span class='postAuthor'>" .  $post->getUsernameById($post->getUserId()) . "</span></p>";
                        echo "<p class='expandPostTrigger' onclick='pushToPostPage(" . $post->getId() . ")' >" . "Expand Post</p>";

                        echo "</div>";
                       
                    }
                ?>
            </div>
            </div>

   
        </div>
    </div>

    <div id="addPostPopup" class="addPostPopup">
        <h2>Add A Post</h2>
        <p onclick="toggleAddPost(true)" class="closeButton">X</p>

        <form method="post" action="../app/posts/add_post.php">
            <input class="titleInput" type="text" placeholder="title" name="title">
            <textarea name="body"></textarea>
            <input class="addPostTrigger" type="submit"/>
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
        function pushToProfilePage(){
            window.location.href="profile.php";
        }
        $(document).ready(function() {
          $('.welcomeCard').on('click', function() {
            $(this).toggleClass('flipped');
          });
        });
    </script>


</body>
</html>