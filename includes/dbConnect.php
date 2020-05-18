<?php
//коннект к базе данных
require_once "config.example.php";

try{
$pdo = new PDO('mysql:host='.$config['server'].';dbname='.$config['name'],$config['username'],$config['password']);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec('SET NAMES "utf8"');
}catch(Exception $exception){
    die('No connect to db!!!');
}