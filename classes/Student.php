<?php


class Student extends Person
{
protected $marks = 0;

    public function __construct($id,$fullName, $phone, $email, $role, $marks)
    {
        parent::__construct($id,$fullName, $phone, $email, $role);
        $this->marks = $marks;
    }

    public function getID(){
        return $this->id;
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
}