<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="app/style.css"/>
    <title>BlogBook</title>
</head>
<body class="authContainer">
<h1 class="header">BlogBook</h1>
    <div class="loginRegSwitch">
        <div class="loginTrigger" onclick="toggleLoginRegister(true)">Login</div>
        <div class="registerTrigger" onclick="toggleLoginRegister(false)">Register</div>
    </div>
   <div id="loginContainer" class="loginContainer">
        <h3>Log into BlogBook</h3>
        <form action="app/users/login_user.php" method="get">
            <?php
                session_start();
                if(isset($_SESSION['error'])){
                    echo "<div class='error-message'>";
                    echo $_SESSION['error'];
                    echo "</div>";
                }
            ?>
            <input class="authInput" name="username" type="text" placeholder="Username">
            <input class="authInput" name="password" type="password" placeholder="password">
            <input class="authSubmit" type="submit" value="Login"/>
        </form>
   </div>

   <div id="registerContainer" class="registerContainer">
        <h3>Register For BlogBook</h3>
        <form action="app/users/register_user.php" method="post">
        <?php
                if(isset($_SESSION['error-reg'])){
                    echo "<div class='error-message'>";
                    echo $_SESSION['error-reg'];
                    echo "</div>";
                }
            ?>
             <input class="authInput" name="username" type="text" placeholder="Username">
             <input class="authInput" name="password" type="password" placeholder="password">
             <input class="authInput" name="confirmed" type="password" placeholder="Confirm password">
             <input class="authSubmit" type="submit" value="Register"/>
        </form>

   </div>
   <script>
        let onLogin = true;
        let loginContainer = $("#loginContainer");
        let registerContainer = $("#registerContainer");
        let loginTrigger = $(".loginTrigger");
        let registerTrigger = $(".registerTrigger");

        function toggleLoginRegister(mode){
            onLogin=mode;
            if(onLogin){
                loginContainer.css("display", "flex");
                registerContainer.css("display" , "none");
                loginTrigger.css('opacity',1);
                registerTrigger.css('opacity',0.5);
                return;
            }
            loginContainer.css("display", "none");
            registerContainer.css("display" , "flex");
            loginTrigger.css('opacity',0.5);
            registerTrigger.css('opacity',1);
        }

   </script>
</body>
</html>