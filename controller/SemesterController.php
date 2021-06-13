<?php
require "../model/SemesterModel.php";

class SemesterController
{
    public $semester;
    public function __construct()
    {
        $this->semester = new SemesterModel();
    }

    public function load_all_semesters($where = null)
    {
        return $this->semester->get_semesters($where);
    }

    public function insert_semester($columns, $values, $prepare)
    {
        return $this->semester->insert_semester($columns, $values, $prepare);
    }


    public function update_semester($id, $columns, $values)
    {
        return $this->semester->update_semester($id, $columns, $values);
    }

    public function delete_semester($id)
    {
        return $this->semester->delete_semester($id);
    }
}
