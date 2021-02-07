<?php
require "../model/AnnouncementModel.php";

class AnnouncementController
{
    public $announcement;
    public function __construct()
    {
        $this->announcement = new AnnouncementModel();
    }

    public function load_all_announcements($where = null)
    {
        return $this->announcement->get_announcements($where);
    }

    public function insert_announcement($columns, $values, $prepare)
    {
        return $this->announcement->insert_announcement($columns, $values, $prepare);
    }


    public function update_announcement($id, $columns, $values)
    {
        return $this->announcement->update_announcement($id, $columns, $values);
    }

    public function delete_announcement($id)
    {
        return $this->announcement->delete_announcement($id);
    }
}
