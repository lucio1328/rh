<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regexp extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function isValidTelephone($telephone) {
        return preg_match('/^(032|033|034|037|038)\d{7}$/', $telephone);
    }
}
