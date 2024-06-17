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
<body>
    <?php
    include "reusable/navigation.php";
    ?>
    <div class="postsContainer">
    <form method="GET" action="../app/comments/view_comments.php">
    <input type="submit" class="header" value="View Your Comments"/>
    </form>
    
    <?php
        require_once "../controllers/PostController.php";
        $posts = Post::getUsersPosts($user->getId());
        if (count($posts) == 0) {
            echo "<h1 class='header'>Your BlogBook Is Empty</h1>";
        } else {
            echo "<h1 class='header'>Your BlogBook</h1>";
        }
   ?>
    <?php 
        if (count($posts) !== 0) {
            foreach ($posts as $post) {
                echo "<div class='post'>";
                echo "<h3 class='postTitle'>" . htmlspecialchars($post->getTitle(), ENT_QUOTES) . "</h3>";
                echo "<p>\" " . htmlspecialchars($post->getBody(), ENT_QUOTES) . " \"</p>";
                echo "<p>By: <span class='postAuthor'>" . htmlspecialchars($post->getUsernameById($post->getUserId()), ENT_QUOTES) . "</span></p>";
                echo "<p class='expandPostTrigger' onclick='pushToPostPage(" . $post->getId() . ")'>Expand Post</p>";
                echo "<div class='hoverContainer'>";
                echo "<div onclick='callDelete(" . $post->getId() . ")' class='deleteButton'>Delete Post</div>";
                echo "<div onclick='callUpdate(" . $post->getId() . ", \"" . htmlspecialchars($post->getTitle(), ENT_QUOTES) . "\", \"" . htmlspecialchars($post->getBody(), ENT_QUOTES) . "\")' class='editButton'>Edit Post</div>";
                echo "</div>"; // close hoverContainer
                echo "</div>"; // close post
            }
        }
        if(isset($_SESSION["error"])){
            echo "<div class='error-message'>" ;
            echo $_SESSION["error"];
            echo "</div>";

            unset($_SESSION["error"]);
        }
    ?>

    <div class="editPostPopup">
        <div onclick="hideEditPopup()" class="closeButton">X</div>
        <form action="../app/posts/edit_post.php" method="POST">
            <input id="editTitleInput" class="titleInput" type="text" name="title">
            <textarea name="body" id="editPostInput"></textarea>
            <input id="idInput" type="hidden" name="id">
            <input class="editPostTrigger" type="submit">
        </form>
    </div>
    </div>

    <script>
        let postInFocus = -1;

        function pushToPostPage(postId) {
            window.location.href = "post.php?post_id=" + postId;
        }

        function callDelete(postId) {
            $.ajax({
                url: "../app/posts/delete_post.php",
                method: "POST",
                data: {
                    "post_id": postId
                },
                success: function(response) {
                    if (response == 1) {
                        location.reload();
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('Error: ' + textStatus, errorThrown);
                }
            });
        }

        function callUpdate(postId, postTitle, postBody) {
            $(".editPostPopup").css("display", "flex");
            $("#idInput").val(postId);
            $("#editTitleInput").val(postTitle);
            $("#editPostInput").val(postBody);
        }

        function hideEditPopup() {
            $(".editPostPopup").css("display", "none");
        }
    </script>
</body>
</html>
