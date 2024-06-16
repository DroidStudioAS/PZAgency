<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
    <nav class="navContainer">
        <div onclick="pushTo('home.php')" class="header">Home</div>
        <div class="ultimateHeader">BlogBook</div>
        <div onclick="pushTo('profile.php')" class="header">My Posts</div>
    </nav>
    
    <script>
        function pushTo(where){
            window.location.href=where
        }
    </script>
</html>