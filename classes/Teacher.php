<?php


class Teacher extends Person
{
protected $subject = '';

    public function __construct($id, $fullName, $phone, $email, $role, $subject)
    {
        parent::__construct($id, $fullName, $phone, $email, $role);
        $this->subject = $subject;
    }
    public function getID(){
        return $this->id;
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
}