<?php

    require_once 'login.php';
    require_once 'user.php';

    $_POST = json_decode(file_get_contents('php://input'), true);

    if(!empty($_POST['username']) && !empty($_POST['password']))
    {
        $the_user = new User($_POST['username'], $_POST['password'], '', pdo: $pdo);
        $the_user->login();
    }
    else
    {
        echo json_encode(array('message' => 'Username and password not entered.'));
    }
?>