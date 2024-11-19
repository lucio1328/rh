<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contrat_model extends MY_Model {

    protected $table="contrats";  
    
    
    public function __construct() {
        parent::__construct();
    }

    public function get_contrat($id){
        return $this->db->get_where($this->table,['employe_id'=>$id])->row();
    }

}
?>
