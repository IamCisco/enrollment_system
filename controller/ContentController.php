<?php
require "../model/ContentModel.php";

class ContentController
{
    public $content;
    public function __construct()
    {
        $this->content = new ContentModel();
    }

    public function load_all_contents($where = null)
    {
        return $this->content->get_content($where);
    }

    public function insert_content($columns, $values, $prepare)
    {
        return $this->content->insert_content($columns, $values, $prepare);
    }


    public function update_content($id, $columns, $values)
    {
        return $this->content->update_content($id, $columns, $values);
    }

    public function delete_content($id)
    {
        return $this->content->delete_content($id);
    }
}
