<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }  

    public function sendEmail($data) {
        if ($this->email->send()) {
            return true;
        } else {
            return $this->email->print_debugger(); 
        }
    }
}
