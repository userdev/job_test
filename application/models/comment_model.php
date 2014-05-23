<?php

class Comment_model extends CI_Model {

    function __construct() {

        parent::__construct();
        define('commentLimit', '5');
    }

    //Get lilited comments
    public function getComments() {
        $query = $this->db->query(""
                . "SELECT id, addDate, editDate, email, comment FROM comments WHERE id > (select MAX(id) - " . commentLimit  . " -1 FROM comments) ORDER BY id ASC");
        return $query->result();
    }

    public function commentCount() {
        $query = $this->db->query(""
                . "SELECT count(1) as commentCount FROM comments");
        $count = $query->result();
        return $count[0]->commentCount - commentLimit; //how many comments are not display
    }

    public function getAllComments() {
        $query = $this->db->query(""
                . "SELECT id, addDate, editDate, email, comment FROM comments ORDER BY id ASC");
        return $query->result();
    }

    public function addComment($email, $comment) {
        $query = $this->db->query(""
                . "INSERT INTO comments (email, comment, addDate) VALUES ('$email', '$comment', SYSDATE());");
    }

}
