<?php
//крад для преподавателей
require_once "../includes/dbConnect.php";
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
        $statement->bindValue(':mark',NULL);
        $statement->bindValue(':subj',$subject);
        $statement->execute();
    } catch (Exception $exception) {
        echo 'Error creating table' . $exception->getCode() . ' ' . $exception->getMessage();
        die();
    }
    header('Location: ../includes/complete.php');
}