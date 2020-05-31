<?php


class Person
{
protected $id = 0;
protected $fullName = '';
protected $phone = 0;
protected $email = '';
protected $role = '';

    public function __construct($id, $fullName, $phone, $email, $role)
    {
        $this->id = htmlspecialchars($id);
        $this->fullName = htmlspecialchars($fullName);
        $this->phone = htmlspecialchars($phone);
        $this->email = htmlspecialchars($email);
        $this->role = htmlspecialchars($role);
    }

    public function getVisitCard(){
        $getVC = '<ul>';
        $getVC .= '<li>Полное имя: '.$this->fullName.'</li>';
        $getVC .= '<li>Номер телефона: '.$this->phone.'</li>';
        $getVC .= '<li>Емеил: '.$this->email.'</li>';
        $getVC .= '<li>Статус : '.$this->role.'</li>';
        $getVC .= '</ul>';
        return $getVC;
    }
    
}