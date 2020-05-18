<?php


class Admin extends Person
{
protected $workingDay = '';

    public function __construct($id, $fullName, $phone, $email, $role,$workingDay)
    {
        parent::__construct($id, $fullName, $phone, $email, $role);
        $this->workingDay = $workingDay;
    }
    public function getID(){
        return $this->id;
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
}