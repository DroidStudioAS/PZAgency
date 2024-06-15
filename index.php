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
<body>
    <div class="loginRegSwitch">
        <div onclick="toggleLoginRegister(true)">Login</div>
        <div onclick="toggleLoginRegister(false)">Register</div>
    </div>
   <div id="loginContainer" class="loginContainer">
        <form action="controllers/UserController.php">
            <input name="username" type="text" placeholder="Username">
            <input name="password" type="password" placeholder="password">
            <input type="submit" value="Login"/>
        </form>
   </div>

   <div id="registerContainer" class="registerContainer">
        <form action="app/users/register_user.php" method="post">
             <input name="username" type="text" placeholder="Username">
             <input name="password" type="password" placeholder="password">
             <input name="confirmed" type="password" placeholder="Confirm password">
             <input type="submit" value="Register"/>
        </form>

   </div>
   <script>
        let onLogin = true;
        let loginContainer = $("#loginContainer");
        let registerContainer = $("#registerContainer")

        function toggleLoginRegister(mode){
            onLogin=mode;
            if(onLogin){
                loginContainer.css("display", "flex");
                registerContainer.css("display" , "none");
                return;
            }
            loginContainer.css("display", "none");
            registerContainer.css("display" , "flex");
        }

   </script>
</body>
</html>