<?php
//крад для студентов
require_once "../includes/dbConnect.php";
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
    try {
        $sql = 'INSERT INTO members SET
           full_name = :name ,
           phone = :telNumber,
           email = :email,
           role = :who,
           average_mark = :mark,
           working_day = :workDay,
           subject = :subj      
    ';
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':name',$name);
        $statement->bindValue(':telNumber',$telNumber);
        $statement->bindValue(':email',$email);
        $statement->bindValue(':who',$who);
        $statement->bindValue(':workDay',NULL);
        $statement->bindValue(':mark',$marks);
        $statement->bindValue(':subj',NULL);
        $statement->execute();
    } catch (Exception $exception) {
        echo 'Error creating table' . $exception->getCode() . ' ' . $exception->getMessage();
        die();
    }
    header('Location: ../includes/complete.php');
}