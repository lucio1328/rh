<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MoyenPourPostuler_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data) {
        return $this->db->insert('moyenpourpostuler', $data);
    }
}
?>