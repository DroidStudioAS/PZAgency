<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../app/style.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>
        <?php
             require_once "../models/User.php";
             session_start();
             $user = unserialize($_SESSION['user']);
             echo $user->getUsername();
        ?>
    </title>
</head>
<body class="postsContainer">
   <?php
        include "reusable/navigation.php";

        require_once "../controllers/PostController.php";
        $posts = Post::getUsersPosts($user->getId());
        if(count($posts)==0){
            echo "<h1 class='header'>Your BlogBook Is Empty</h1>";
        }else{
            echo "<h1 class='header'>Your BlogBook </h1>";
        }
   ?>
    <?php 
        if(count($posts)!==0){
            foreach($posts as $post){
                echo "<div class='post'>";
                echo "<h3 class='postTitle'>" . $post->getTitle() . "</h3>";
                echo  "<p>" ."\"  " . $post->getBody() ."  \"". "</p>";
                echo "<p>By: <span class='postAuthor'>" .  $post->getUsernameById($post->getUserId()) . "</span></p>";
                echo "<p class='expandPostTrigger' onclick='pushToPostPage(" . $post->getId() . ")' >" . "Expand Post</p>";
                echo "<div class=hoverContainer>";
                echo "<div onclick=callDelete(" 
                . $post->getId() . ")" 
                ." class='deleteButton'>
                 Delete Post </div>" ;
                 echo "<div onclick=\"callUpdate(" 
                . $post->getId() 
                . ", '" 
                . htmlspecialchars($post->getTitle(), ENT_QUOTES) 
                . "', '"
                . htmlspecialchars($post->getBody(), ENT_QUOTES)
                . "')\" 
                class='editButton'>
                Edit Post </div>";
                 echo "</div>";
                echo "</div>";
            }
        }
        
    ?>
    <div class="editPostPopup">
        <div onclick="hideEditPopup()" class="closeButton">X</div>
        <form action="../app/posts/edit_post.php" method="POST">
            <input id="editTitleInput" class="titleInput" type="text" name="" id="">
            <textArea id="editPostInput"></textArea>
            <input class="editPostTrigger" type="submit"/>
        </form>
    </div>
    <script>
        let postInFocus = -1;
        function pushToPostPage(postId){
            window.location.href="post.php?post_id=" +postId;
        }

        function callDelete(postId){
            $.ajax({
                url:"../app/posts/delete_post.php",
                method:"POST",
                data:{
                    "post_id":postId
                },
                success:function(response){
                 console.log(response==1);
                  if(response==1){
                    location.reload();
                }
                },
                error:function (jqXHR, textStatus, errorThrown) {
                    console.error('Error: ' + textStatus, errorThrown);
                }
            });
        }
            function callUpdate(postId , postTitle, postBody){
                $(".editPostPopup").css("display", "flex");
                postInFocus=postId;
                console.log(postInFocus);
                console.log(postTitle);
                console.log(postBody);

                $("#editTitleInput").val(postTitle);
                $("#editPostInput").val(postTitle);


            

            }
            function hideEditPopup(){
                $(".editPostPopup").css("display", "none");
            }
        
    </script>
</body>
</html>