<?php
    $path = $_GET['path'] ?? 'home';

    $templates = array('home' => 'templates/home.php',
                       'register' => 'templates/register.php');

    if(array_key_exists($path, $templates))
    {
        $templatePagePath = $templates[$path];
        // Check if user is signed in.
        if(isset($_SESSION['user'])) 
        {
            include "$templatePagePath";
        }
        else
        {
            if($path === 'register') 
            {
                include_once "$templatePagePath";
            }
            else 
            {
                include "templates/sign-in.php";
            }
        }
    }
    else
    {
        http_response_code(404);
        include 'templates/404.php';
    }
?>