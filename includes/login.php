<?php
    $config = require_once '../config/config.php';

    extract($config, EXTR_PREFIX_ALL, 'conf');

    $chrs = 'utf8mb4';

    $dsn = "mysql:host=$conf_host;dbname=$conf_dbname;charset=$chrs";

    try
    {
        $pdo = new PDO($dsn, $conf_username, $conf_password);
    }
    catch(PDOException $e)
    {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
        die();
    }
?>