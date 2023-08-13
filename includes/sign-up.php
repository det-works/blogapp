<?php

    require_once 'login.php';
    require_once 'user.php';

    $_POST = json_decode(file_get_contents('php://input'), true);

    if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']))
    {
        $the_user = new User($_POST['username'], $_POST['password'], $_POST['email'], pdo: $pdo);
        $the_user->register();
    }
    else
    {
        echo json_encode(array('message' => 'Username and password not entered.'));
    }
?>