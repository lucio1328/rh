<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EmployeCompetence_model extends MY_Model {

    protected $table="employe_competences";  
    protected $primaryKey = 'employe_id';  
     
    public function __construct() {
        parent::__construct();
    }

    public function get_competence($id){
        return $this->db->get_where($this->table,['employe_id'=>$id])->result();
    }
}
?>
