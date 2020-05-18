<?php
//крад для админ формы(ввод в базу)
require_once "../includes/dbConnect.php";
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
    try {
        $sql = 'INSERT INTO members SET
           full_name = :name ,
           phone =  :telNumber ,
           email = :email ,
           role = :who ,
           working_day = :workDay ,
           average_mark = :mark ,
           subject = :subj
    ';
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':name',$name);
        $statement->bindValue(':telNumber',$telNumber);
        $statement->bindValue(':email',$email);
        $statement->bindValue(':who',$who);
        $statement->bindValue(':workDay',$workDay);
        $statement->bindValue(':mark',NULL);
        $statement->bindValue(':subj',NULL);
        $statement->execute();
    } catch (Exception $exception) {
        echo 'Error creating table' . $exception->getCode() . ' ' . $exception->getMessage();
        die();
    }
    header('Location: ../includes/complete.php');
}