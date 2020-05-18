<?php
//главная страница
require_once "includes/dbConnect.php";
require_once "classes/Person.php";
require_once "classes/Student.php";
require_once "classes/Teacher.php";
require_once "classes/Admin.php";
require_once "includes/selectMembers.php";
?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homework: main page</title>
</head>
<body>
    <div>
        <p><a href="includes/create_db.php">Создать таблицу 'members'</a></p>
        <hr>
    </div>
    <form method="post" action="seeder/between.seeder_db.php">
        <label>Внести данные:
            <select name="person">
            <option name="teacher">Преподователь</option>
            <option name="student">Студент</option>
            <option name="admin">Администратор</option>
            </select>
        </label>
        <input type="submit" value="Отправить">
    </form>
    <hr>
    <h3>Список админов</h3>
        <?php foreach ($adminArr as $admin) :?>
            <?php $adm = new Admin($admin['id'], $admin['full_name'],$admin['phone'],$admin['email'],$admin['role'],$admin['working_day']); ?>
            <div>Имя: <?= $adm->getNameAdmin();?>.
            <a href="visitCard.php?id=<?=$adm->getID();?>&role=<?=htmlspecialchars($admin['role']);?>">Визитка</a></div>
        <?php endforeach; ?>
    <hr>
        <h3>Список преподователей</h3>
        <?php foreach ($teacherArr as $teacher) :?>
            <?php $teach = new Teacher($teacher['id'], $teacher['full_name'],$teacher['phone'],$teacher['email'],$teacher['role'],$teacher['subject']); ?>
            <div>Имя: <?= $teach->getNameTeacher();?>.
            <a href="visitCard.php?id=<?=$teach->getID();?>&role=<?=$teacher['role'];?>">Визитка</a></div>
        <?php endforeach; ?>
    <hr>
        <h3>Список студентов</h3>
        <?php foreach ($studentArr as $student) :?>
            <?php $stud = new Student($student['id'],$student['full_name'],$student['phone'],$student['email'],$student['role'],$student['average_mark']); ?>
            <div>Имя: <?= $stud->getNameStudent();?>.
            <a href="visitCard.php?id=<?=$stud->getID();?>&role=<?=$student['role'];?>">Визитка</a></div>
        <?php endforeach; ?>
</body>
</html>
