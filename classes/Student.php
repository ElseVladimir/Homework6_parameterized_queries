<?php


class Student extends Person
{
protected $marks = 0;

    public function __construct($id,$fullName, $phone, $email, $role, $marks)
    {
        parent::__construct($id,$fullName, $phone, $email, $role);
        $this->marks = htmlspecialchars($marks);
    }

    public function getID(){
        return htmlspecialchars($this->id);
    }

    public function getVisitCardStudent()
    {
        $getVC = parent::getVisitCard();
        $getVC .= '<ul>';
        $getVC .= '<li>Средняя оценка: '.$this->marks.'</li>';
        $getVC .= '</ul>';
        return $getVC;
    }

    public function getNameStudent(){
        return $this->fullName;
    }

    static public function getSelectStud(PDO $pdo){
        try{
            $sql = 'SELECT id,full_name,phone,email,average_mark,role FROM members WHERE role="Student"';
            $statementStud = $pdo->prepare($sql);
            $statementStud->execute();
            $studentArr = $statementStud->fetchAll();
            return $studentArr;
        }catch (Exception $exception){
            echo "Error getting students! " . $exception->getCode() . ' message: ' . $exception->getMessage();
            die();
        }
    }

    public function getStudConfirm(PDO $pdo, $name, $telNumber,$email,$who,$marks){
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
    }

    static public function getAllStudent($id, PDO $pdo){
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