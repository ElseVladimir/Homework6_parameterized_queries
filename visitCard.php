<?php
//Этот файл показывает визитки
require_once "includes/dbConnect.php";
require_once "classes/Person.php";
require_once "classes/Student.php";
require_once "classes/Teacher.php";
require_once "classes/Admin.php";

$id = htmlspecialchars($_GET['id']);
$role = htmlspecialchars($_GET['role']);

if(empty($id)){
    die('no id');
}

if(empty($role)){
    die('no role');
}

?>

<?php if($role == 'Admin'):?>
        <?php $admins = Admin::getAllAdmin($id, $pdo); ?>
        <?php foreach ($admins as $admin) :?>
            <?php $adm = new Admin($id, $admin['full_name'],$admin['phone'],$admin['email'],$admin['role'],$admin['working_day']); ?>
            <div><?= $adm->getVisitCardAdmin();?></div><br>
        <?php endforeach; ?>
<?php endif; ?>

<?php if($role == 'Teacher'):?>
    <?php $teachers = Teacher::getAllTeacher($id, $pdo); ?>
    <?php foreach ($teachers as $teacher) :?>
        <?php $teach = new Teacher($id,$teacher['full_name'],$teacher['phone'],$teacher['email'],$teacher['role'],$teacher['subject']); ?>
        <div><?= $teach->getVisitCardTeacher();?></div><br>
    <?php endforeach; ?>
<?php endif; ?>

<?php if($role == 'Student'):?>
    <?php $students = Student::getAllStudent($id, $pdo); ?>
    <?php foreach ($students as $student) :?>
        <?php $stud = new Student($id,$student['full_name'],$student['phone'],$student['email'],$student['role'],$student['average_mark']); ?>
        <div><?= $stud->getVisitCardStudent();?></div><br>
    <?php endforeach; ?>
<?php endif; ?>
