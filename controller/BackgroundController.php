<?php
require "../model/BackgroundModel.php";

class BackgroundController
{
    public $background;
    public function __construct()
    {
        $this->background = new BackgroundModel();
    }

    public function load_all_backgrounds($where = null)
    {
        return $this->background->get_background($where);
    }

    public function insert_background($columns, $values, $prepare)
    {
        return $this->background->insert_background($columns, $values, $prepare);
    }


    public function update_background($id, $columns, $values)
    {
        return $this->background->update_background($id, $columns, $values);
    }

    public function delete_background($id)
    {
        return $this->background->delete_background($id);
    }
}
