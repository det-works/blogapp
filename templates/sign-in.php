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
                <input type='text' placeholder='Username'>
                <input type='password' placeholder='Password'>
                <input type='submit' value='Log in'>
                <a href='./register'>Sign up</a>
            </form>
        </div>
    </body>
</html>