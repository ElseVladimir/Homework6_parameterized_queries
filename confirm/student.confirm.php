<?php
//крад для студентов
require_once "../includes/dbConnect.php";
require_once "../classes/Person.php";
require_once "../classes/Student.php";
$name = htmlspecialchars($_POST['name']);
$telNumber = htmlspecialchars($_POST['telNumber']);
$email = htmlspecialchars($_POST['email']);
$who = htmlspecialchars($_POST['who']);
$marks = htmlspecialchars($_POST['marks']);

if (empty($name)) {
    echo 'Введите имя' . '<br>';
}

if (empty($telNumber)) {
    echo 'Введите номер телефона' . '<br>';
}

if (empty($email)) {
    echo 'Введите email' . '<br>';
}

if (empty($marks)) {
    echo 'Введите свою среднюю оценку' . '<br>';
}
if ($name && $telNumber && $email && $who && $marks) {
    $student = new Student($id, $name, $telNumber, $email, $who,$marks);
    $student->getStudConfirm($pdo, $name, $telNumber, $email, $who, $marks);
    header('Location: ../includes/complete.php');
}