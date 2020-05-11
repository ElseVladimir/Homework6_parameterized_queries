<?php
//форма для студентов
require_once "../includes/dbConnect.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Заполнить таблицу студента</title>
</head>
<body>
<form method="post" action="../confirm/student.confirm.php">
    <label>Ваше имя и фамилия: <input type="text" name="name"></label><br>
    <label>Номер телефона: </label>: <input type="text" name="telNumber"></label><br>
    <label>Email: <input type="text" name="email"></label><br>
    <label>Кто вы: <input type="text" name="who" readonly value="Student"></label><br>
    <label>Средний балл: <input type="text" name="marks"></label><br>
    <input type="submit" value="send">
</form>
</body>
</html>