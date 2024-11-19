<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EmployePoste_model extends MY_Model {

    protected $table="employe_postes";  
    protected $primaryKey = 'employe_id';
    protected $primaryKey2 = 'poste_id';

    public function __construct() {
        parent::__construct();
    }

}
?>
