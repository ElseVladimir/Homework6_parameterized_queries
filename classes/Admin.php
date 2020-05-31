<?php


class Admin extends Person
{
protected $workingDay = '';

    public function __construct($id, $fullName, $phone, $email, $role,$workingDay)
    {
        parent::__construct($id, $fullName, $phone, $email, $role);
        $this->workingDay = htmlspecialchars($workingDay);
    }
    public function getID(){
        return htmlspecialchars($this->id);
    }

    public function getVisitCardAdmin()
    {
        $getVC = parent::getVisitCard();
        $getVC .= '<ul>';
        $getVC .= '<li>Рабочий день: '.$this->workingDay.'</li>';
        $getVC .= '</ul>';
        return $getVC;
    }

    public function getNameAdmin(){
        return $this->fullName;
    }

    static public function getSelectAdm(PDO $pdo){
        try{
            $sql = 'SELECT * FROM members WHERE role="Admin"';
            $statementAdm = $pdo->prepare($sql);
            $statementAdm->execute();
            $adminArr = $statementAdm->fetchAll();
            return $adminArr;
        }catch (Exception $exception){
            echo "Error getting admins! " . $exception->getCode() . ' message: ' . $exception->getMessage();
            die();
        }
    }

    public function getAdmConfirm(PDO $pdo, $name, $telNumber, $email, $who,$workDay){
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
    }

    static public function getAllAdmin($id, PDO $pdo){
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