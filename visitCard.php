<?php
//Этот файл показывает визитки
require_once "includes/dbConnect.php";
require_once "classes/Person.php";
require_once "classes/Student.php";
require_once "classes/Teacher.php";
require_once "classes/Admin.php";

$id = htmlspecialchars($_GET['id']);

if(empty($id)){
    header('Location: index.php');
}

?>
<?php
$arrays = Person::getAll($id, $pdo);
?>

<?php if($_GET['role'] == 'Admin'):?>
        <?php foreach ($arrays as $admin) :?>
            <?php $adm = new Admin($_GET['id'], $admin['full_name'],$admin['phone'],$admin['email'],$admin['role'],$admin['working_day']); ?>
            <div><?= $adm->getVisitCardAdmin();?></div><br>
        <?php endforeach; ?>
<?php endif; ?>

<?php if($_GET['role'] == 'Teacher'):?>
    <?php foreach ($arrays as $teacher) :?>
        <?php $teach = new Teacher($_GET['id'],$teacher['full_name'],$teacher['phone'],$teacher['email'],$teacher['role'],$teacher['subject']); ?>
        <div><?= $teach->getVisitCardTeacher();?></div><br>
    <?php endforeach; ?>
<?php endif; ?>

<?php if($_GET['role'] == 'Student'):?>
    <?php foreach ($arrays as $student) :?>
        <?php $stud = new Student($_GET['id'],$student['full_name'],$student['phone'],$student['email'],$student['role'],$student['average_mark']); ?>
        <div><?= $stud->getVisitCardStudent();?></div><br>
    <?php endforeach; ?>
<?php endif; ?>
