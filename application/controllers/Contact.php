<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('util/ContactModel');
        $this->load->model('user/UserModel');
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        $user = $this->UserModel->getUserById($user_id);

        $data['user'] = $user;
        $data['content'] = "autres/contact.php";
        $this->load->view('template', $data);
    }
}
