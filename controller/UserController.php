<?php
require "../model/UserModel.php";

class UserController
{
    public $user;
    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function getUsers($where)
    {
        return $this->user->getUsers($where);
    }

    public function getStudents($where)
    {
        return $this->user->getStudents($where);
    }

    public function getTeachers($where)
    {
        return $this->user->getTeachers($where);
    }
    public function insert_user($columns, $values, $prepare)
    {
        return $this->user->insert_user($columns, $values, $prepare);
    }
}
