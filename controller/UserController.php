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

    public function getPersons($where, $table_name)
    {
        return $this->user->getPersons($where, $table_name);
    }

    public function insert_user($columns, $values, $prepare)
    {
        return $this->user->insert_user($columns, $values, $prepare);
    }

    public function update_user($id, $columns, $values)
    {
        return $this->user->update_user($id, $columns, $values);
    }
    public function update_person($id, $columns, $values, $table, $column)
    {
        return $this->user->update_person($id, $columns, $values, $table, $column);
    }
}
