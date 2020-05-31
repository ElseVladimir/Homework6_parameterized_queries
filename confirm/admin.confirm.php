<?php
//крад для админ формы(ввод в базу)
require_once "../includes/dbConnect.php";
require_once "../classes/Person.php";
require_once "../classes/Admin.php";
$name = htmlspecialchars($_POST['name']);
$telNumber = htmlspecialchars($_POST['telNumber']);
$email = htmlspecialchars($_POST['email']);
$who = htmlspecialchars($_POST['who']);
$workDay = htmlspecialchars($_POST['workDay']);

if(empty($name)){
    echo 'Введите имя'.'<br>';
}

if(empty($telNumber)){
    echo 'Введите номер телефона'.'<br>';
}

if(empty($email)){
    echo 'Введите email'.'<br>';
}

if(empty($workDay)){
    echo 'Введите день недели'.'<br>';
}
if($name && $telNumber && $email && $who && $workDay){
    $admin = new Admin($id, $name, $telNumber, $email, $who,$workDay);
    $admin->getAdmConfirm($pdo, $name, $telNumber, $email, $who,$workDay);
    header('Location: ../includes/complete.php');
}