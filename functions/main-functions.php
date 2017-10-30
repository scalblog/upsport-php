<?php

    session_start();

    $dbhost = 'localhost';
    $dbname = 'todolistupsport';
    $dbuser = 'root';
    $dbpswrd = '';

    try {
        $db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswrd,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    }
    catch(PDOexception $e) {
        die('La connexion à la base de données a échoué.');
    }

?>