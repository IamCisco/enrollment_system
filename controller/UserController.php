<?php
require "../model/UserModel.php";

class UserController
{
    public $user;
    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function login($username, $password)
    {
        return $this->user->login($username, $password);
    }

}
