<?php
    session_start();
    if($_SESSION['user'])
    {
        header('Location: home');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
            include_once "components/meta/meta_basic.php";
            include_once "components/meta/meta_css_signin.php";
        ?>
        <title>My Blog App - Sign In</title>
    </head>
    <body>
        <div id='sign-in'>
            <form>
                <p>My Blog App</p>
                <input id="username" type='text' placeholder='Username'>
                <input id="password" type='password' placeholder='Password'>
                <input type='submit' value='Log in'>
                <a href='./register'>Sign up</a>
            </form>
        </div>
        <script src='assets/js/signIn.js'></script>
    </body>
</html>