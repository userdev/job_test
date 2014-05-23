<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class comment extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('comment_model');
    }

    public function index($type = '') {
        if ($type == 'all') { //show all comments
            $data['comments'] = $this->comment_model->getAllComments();
            $data['commentCount'] = -1; //do not show comment count
        } else {
            $data['comments'] = $this->comment_model->getComments();
            $data['commentCount'] = $this->comment_model->commentCount();
        }
        $this->load->view('comment_view', $data);
    }

    public function addcomment() {
        $email = $this->input->post('email');
        $comment = $this->input->post('comment');
        if ($email && $comment) {
            $this->comment_model->addComment($email, $comment);
            ?><div class="panel panel-default single-comment">
                <div class="panel-heading">
                    <?php echo $email ?> <div class="date"> <?php echo date('d-m-Y H:i'); ?></div>
                </div><div class="panel-body">
                    <?php echo $comment; ?></div></div>
            <div class="clearfix"></div> <?php
        }
    }

}
