<?php
require "../model/GradeModel.php";

class GradeController
{
    public $grade;
    public function __construct()
    {
        $this->grade = new GradeModel();
    }

    public function load_all_grades($where = null)
    {
        return $this->grade->get_grades($where);
    }

    public function insert_grade($columns, $values, $prepare)
    {
        return $this->grade->insert_grade($columns, $values, $prepare);
    }


    public function update_grade($id, $columns, $values)
    {
        return $this->grade->update_grade($id, $columns, $values);
    }

    public function delete_grade($id)
    {
        return $this->grade->delete_grade($id);
    }
}
