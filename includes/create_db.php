<?php
//этот создает таблицу
require_once "dbConnect.php";

try{
$sql = "CREATE TABLE members(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR (255) NOT NULL,
    phone VARCHAR (255) NOT NULL,
    email VARCHAR (255) NOT NULL,
    role VARCHAR (255) NOT NULL,
    average_mark FLOAT,
    subject VARCHAR (255) ,
    working_day VARCHAR (255)
    )DEFAULT CHARACTER SET utf8 ENGINE=InnoDB";
    $pdo->exec($sql);
}catch (Exception $exception){
    echo 'Error creating table'.$exception->getCode().' '.$exception->getMessage();
}
header('Location: ../index.php');