<?php
    $db_name = 'lista';
    $db_host = 'localhost';
    $db_user = 'root';
    $db_password = '';

    $pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_password);
?>