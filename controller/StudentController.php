<?php
require "../model/StudentModel.php";

class StudentController
{
    public $student;
    public function __construct()
    {
        $this->student = new StudentModel();
    }

    public function load_all_students()
    {
        return $this->student->get_student_masterlist();
    }

    public function insert_student($columns, $values, $prepare)
    {
        return $this->student->insert_student($columns, $values, $prepare);
    }


    public function update_student($id, $columns, $values)
    {
        return $this->student->insert_student($id, $columns, $values);
    }

    public function delete_student($id)
    {
        return $this->student->delete_student($id);
    }
}
