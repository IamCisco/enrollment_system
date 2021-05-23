<?php
require "../model/EnrolleeModel.php";

class EnrolleeController
{
    public $enrollee;
    public function __construct()
    {
        $this->enrollee = new EnrolleeModel();
    }

    public function load_all_enrollees($where = null)
    {
        return $this->enrollee->get_enrollee($where);
    }

    public function load_enrollee_details($id)
    {
        return $this->enrollee->get_enrollee_details($id);
    }

    public function load_enrollee_stats($where = null, $where_strand1 = null, $where_strand2 = null)
    {
        return $this->enrollee->get_enrollee_stats($where, $where_strand1, $where_strand2);
    }

    public function insert_enrollee($columns, $values, $prepare)
    {
        return $this->enrollee->insert_enrollee($columns, $values, $prepare);
    }

    public function insert_enrollee_details($columns, $values, $prepare)
    {
        return $this->enrollee->insert_enrollee_details($columns, $values, $prepare);
    }


    public function update_enrollee($id, $columns, $values)
    {
        return $this->enrollee->update_enrollee($id, $columns, $values);
    }

    public function delete_enrollee($id)
    {
        return $this->enrollee->delete_enrollee($id);
    }
}
