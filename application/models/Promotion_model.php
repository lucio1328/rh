<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Promotion_model extends MY_Model {

    protected $table="promotions";  
     
    public function __construct() {
        parent::__construct();
    }

    public function get_promotion($id){
        return $this->db->get_where($this->table,['employe_id'=>$id])->result();
    }
}
?>
