<?php
//запросы на вывод из бд, вывел в отдельный файл
require_once "classes/Person.php";
require_once "classes/Admin.php";
require_once "classes/Student.php";
require_once "classes/Teacher.php";

$adminArr = Admin::getSelectAdm($pdo);

try{
    $sql = 'SELECT id,full_name,phone,email,subject,role FROM members WHERE role="Teacher"';
    $statementTeach = $pdo->prepare($sql);
    $statementTeach->execute();
    $teacherArr = $statementTeach->fetchAll();
}catch (Exception $exception){
    echo "Error getting teachers! " . $exception->getCode() . ' message: ' . $exception->getMessage();
    die();
}

try{
    $sql = 'SELECT id,full_name,phone,email,average_mark,role FROM members WHERE role="Student"';
    $statementStud = $pdo->prepare($sql);
    $statementStud->execute();
    $studentArr = $statementStud->fetchAll();
}catch (Exception $exception){
    echo "Error getting students! " . $exception->getCode() . ' message: ' . $exception->getMessage();
    die();
}

?>