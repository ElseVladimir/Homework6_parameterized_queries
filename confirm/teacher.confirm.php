<?php
//крад для преподавателей
require_once "../includes/dbConnect.php";
require_once "../classes/Person.php";
require_once "../classes/Teacher.php";
$name = htmlspecialchars($_POST['name']);
$telNumber = htmlspecialchars($_POST['telNumber']);
$email = htmlspecialchars($_POST['email']);
$who = htmlspecialchars($_POST['who']);
$subject = htmlspecialchars($_POST['subject']);

if (empty($name)) {
    echo 'Введите имя' . '<br>';
}

if (empty($telNumber)) {
    echo 'Введите номер телефона' . '<br>';
}

if (empty($email)) {
    echo 'Введите email' . '<br>';
}

if (empty($subject)) {
    echo 'Введите преподаваемый предмет' . '<br>';
}
if ($name && $telNumber && $email && $who && $subject) {
    $teacher = new Teacher($id, $name, $telNumber, $email, $who,$subject);
    $teacher->getTeachConfirm($pdo, $name, $telNumber, $email, $who, $subject);
    header('Location: ../includes/complete.php');
}