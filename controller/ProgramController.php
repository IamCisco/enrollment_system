<?php
require "../model/ProgramModel.php";

class ProgramController
{
    public $program;
    public function __construct()
    {
        $this->program = new ProgramModel();
    }

    public function load_all_programs($where = null)
    {
        return $this->program->get_programs($where);
    }

    public function insert_program($columns, $values, $prepare)
    {
        return $this->program->insert_program($columns, $values, $prepare);
    }


    public function update_program($id, $columns, $values)
    {
        return $this->program->update_program($id, $columns, $values);
    }

    public function delete_program($id)
    {
        return $this->program->delete_program($id);
    }
}
