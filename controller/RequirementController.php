<?php
require "../model/RequirementsModel.php";

class RequirementController
{
    public $requirement;
    public function __construct()
    {
        $this->requirement = new RequirementModel();
    }

    public function load_all_requirements($where = null)
    {
        return $this->requirement->get_requirements($where);
    }

    public function insert_requirement($columns, $values, $prepare)
    {
        return $this->requirement->insert_requirement($columns, $values, $prepare);
    }


    public function update_requirement($id, $columns, $values)
    {
        return $this->requirement->update_requirement($id, $columns, $values);
    }

    public function delete_requirement($id)
    {
        return $this->requirement->delete_requirement($id);
    }
}
