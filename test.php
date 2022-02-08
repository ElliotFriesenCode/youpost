<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" href = "style.css">
    </head>
    <body>
    <div class = "links">
    <a href = "test.php">SignUp/Login</a>
    <a href = "index.php">My Account</a>
    <a href = "nonuser.php">View Articles</a>
    </div>
    <br>
    <p></p>
    <div class = "sign">
    <p class = "h">Sign up</p>
    <form action = 'signUp.php' method = 'post'>
    <input class = "i" type = "text" name = "username" placeholder="Create a username">
    <br>
    <br>
    <input class = "i" type = "password" name = "password" placeholder="Create a password">
    <br>
    <br>
    <input class = "s" type = 'submit' name = 'Enter'>
    </form>
    <p class = "h">Login</p>
    <form action = 'init.php' method = 'post'>
    <input class = "i" type = "text" name = "username" placeholder="Username">
    <br>
    <br>
    <input class = "i" type = "password" name = "password" placeholder="Password">
    <br>
    <br>
    <input class = "s" type = 'submit' name = 'Enter'>
    </form>
</div>
    </body>
</html>