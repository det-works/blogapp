<!DOCTYPE html>
<html>
    <head>
        <?php
            include_once "components/meta/meta_basic.php";
            include_once "components/meta/meta_css_header.php";
        ?>
        <title>My Blog App - Home</title>
    </head>
    <body>
        <?php
            include_once "components/header.php";
            $profile_user = $_SESSION['user'];
            echo "<h2>Hello, $profile_user</h2>"
        ?>
    </body>
</html>