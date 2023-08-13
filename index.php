<?php
    session_start();

    $path = $_GET['path'] ?? 'home';

    $templates = array('home' => 'templates/home.php',
                       'register' => 'templates/register.php');

    if(array_key_exists($path, $templates))
    {
        $templatePagePath = $templates[$path];
        // Check if user is signed in.
        if(isset($_SESSION['user'])) 
        {
            include_once "$templatePagePath";
        }
        else
        {
            if($path === 'register') 
            {
                include_once "$templatePagePath";
            }
            else 
            {
                include_once "templates/sign-in.php";
            }
        }
        }
        else
        {
            http_response_code(404);
            include_once 'templates/404.php';
        }
?>