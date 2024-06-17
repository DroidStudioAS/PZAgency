<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../app/style.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Comments</title>
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
            if(count($comments)==0){
                echo "<h3 class='header'> You Have No Comments </h3>";
            }
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
               echo "<div class='commentActionButtons'>";
               echo "<form action='../app/comments/delete_comment.php' method='post' class=deleteComment>";
               echo "<input name='comment' type='hidden' value='". $comment->getId() . "' />";
               echo "<input type='submit' value='Delete \n Comment'/>";
               echo "</form>";
               echo "<div onclick=\"showEditForm(" 
               . $comment->getId() 
               . ", '" 
               . htmlspecialchars($comment->getBody(), ENT_QUOTES, 'UTF-8') 
               . "')\" class='edit'>";
                echo "Edit Your Comment";
                echo "</div>";
                //close comment action buttons 
               echo "</div>";
               //close comment
               echo "</div>";
            }
        //close comment container
         echo "</div>"
        ?>
    </div>
    
    <div class="editCommentPopup">
        <form method="post" action="../app/comments/edit_comment.php" id="editCommentForm">
         <div onclick="closeEditForm()" class="closeButton">X</div>   
        <input name="id" id="id" type="hidden" value=""/>
        <label for="body">Your Comment:</label>
        <textarea id="commentArea" name="body"></textarea>
        <input class="editCommentTrigger" type="submit" value="submit"/>
        </form>
    </div>
    <script>
        function showEditForm(commentId, commentBody){
            $(".editCommentPopup").css("display","flex");
            $("#commentArea").val(commentBody);
            $("#id").val(commentId);
        }
        function closeEditForm(){
            $(".editCommentPopup").css("display","none");
        }
        $("#editCommentForm").on("submit", function(event){
            if($("#commentArea").val().trim()===""){
                event.preventDefault();
                alert("You can not submit an empty comment");
                return;
            }
        })

    </script>
</body>
</html>