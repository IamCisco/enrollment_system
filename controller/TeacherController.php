<?php
require "../model/TeacherModel.php";

class TeacherController
{
    public $teacher;
    public function __construct()
    {
        $this->teacher = new TeacherModel();
    }

    public function load_all_teachers($where = null)
    {
        return $this->teacher->get_teacher_masterlist($where);
    }

    public function insert_teacher($columns, $values, $prepare)
    {
        return $this->teacher->insert_teacher($columns, $values, $prepare);
    }


    public function update_teacher($id, $columns, $values)
    {
        return $this->teacher->update_teacher($id, $columns, $values);
    }

    public function delete_teacher($id)
    {
        return $this->teacher->delete_teacher($id);
    }
}
