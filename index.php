<?php
    $path = $_GET['path'] ?? 'home';

    $templates = array('home' => 'templates/home.php');

    if(array_key_exists($path, $templates))
    {
        $templatePagePath = $templates[$path];
        include "$templatePagePath";
    }
    else
    {
        http_response_code(404);
        include 'templates/404.php';
    }
?>