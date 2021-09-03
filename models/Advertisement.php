<?php

class Advertisement {
    private $id;
    private $userid;
    private $title;

    public function __construct($id, $userid, $title) {
        $this->id = $id;
        $this->userid = $userid;
        $this->title = $title;
    }

    public function getId() {
        return $this->id;
    }

    public function getUserid() {
        return $this->userid;
    }

    public function getTitle() {
        return $this->title;
    }
}