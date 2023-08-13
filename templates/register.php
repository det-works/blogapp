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
            include_once "components/meta/meta_css_signup.php";
        ?>
        <title>My Blog App - Sign Up</title>
    </head>
    <body>
        <div id='sign-up'>
            <form>
                <p>My Blog App</p>
                <input id='email' type='email' placeholder='Email'>
                <input id='username' type='text' placeholder='Username'>
                <input id='password' type='password' placeholder='Password'>
                <input type='submit' value='Register'>
            </form>
        </div>
        <script src='assets/js/signUp.js'></script>
    </body>
</html>