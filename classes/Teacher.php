<?php


class Teacher extends Person
{
protected $subject = '';

    public function __construct($id, $fullName, $phone, $email, $role, $subject)
    {
        parent::__construct($id, $fullName, $phone, $email, $role);
        $this->subject = htmlspecialchars($subject);
    }
    public function getID(){
        return htmlspecialchars($this->id);
    }

    public function getVisitCardTeacher()
    {
        $getVC = parent::getVisitCard();
        $getVC .= '<ul>';
        $getVC .= '<li>Преподаваемый предмет: '.$this->subject.'</li>';
        $getVC .= '</ul>';
        return $getVC;
    }

    public function getNameTeacher(){
        return $this->fullName;
    }

    static public function getSelectTeach(PDO $pdo){
        try{
            $sql = 'SELECT id,full_name,phone,email,subject,role FROM members WHERE role="Teacher"';
            $statementTeach = $pdo->prepare($sql);
            $statementTeach->execute();
            $teacherArr = $statementTeach->fetchAll();
            return $teacherArr;
        }catch (Exception $exception){
            echo "Error getting teachers! " . $exception->getCode() . ' message: ' . $exception->getMessage();
            die();
        }
    }

    public function getTeachConfirm(PDO $pdo, $name, $telNumber,$email,$who,$subject){
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
    }

    static public function getAllTeacher($id, PDO $pdo){
        try{
            $sql = 'SELECT id,full_name,phone,email,working_day,role,subject,average_mark FROM members WHERE id=:id';
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $arrays = $statement->fetchAll();
            return $arrays;
        }catch (Exception $exception){
            echo "Error getting admins! " . $exception->getCode() . ' message: ' . $exception->getMessage();
            die();
        }
    }
}