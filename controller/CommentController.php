<?php
require "../model/CommentModel.php";

class CommentController
{
    public $comment;
    public function __construct()
    {
        $this->comment = new CommentModel();
    }

    public function load_all_comments($where = null)
    {
        return $this->comment->get_comments($where);
    }

    public function insert_comment($columns, $values, $prepare)
    {
        return $this->comment->insert_comment($columns, $values, $prepare);
    }


    public function update_comment($id, $columns, $values)
    {
        return $this->comment->update_comment($id, $columns, $values);
    }

    public function delete_comment($id)
    {
        return $this->comment->delete_comment($id);
    }
}
