<?php 
    define('HOST', 'localhost');
    define('DBNAME', 'crusix');
    define('USER', 'root');
    define('PASS', 'root');

    try{
        $bdd = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME . ";charset=utf8;port=3306", USER, PASS);
    } catch(Exception $e){
        die(print_r($e->getMessage()));
    }