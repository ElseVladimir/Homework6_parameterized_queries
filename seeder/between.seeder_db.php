<?php
//промежуточный файл, перенаправляет в зависимости от выбора какую форму заполнить

$person = htmlspecialchars($_POST['person']);
if(empty($person)){
    header('Location: ../index.php');
}

if($person == 'Администратор'){
    header('Location: admin.seeder_db.php');
}

if($person == 'Студент'){
    header('Location: student.seeder_db.php');
}

if($person == 'Преподователь'){
    header('Location: teacher.seeder_db.php');
}