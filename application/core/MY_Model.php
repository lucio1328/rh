<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Model extends CI_Model {

    protected $table;  
    protected $primaryKey = 'id';
    protected $primaryKey2 = 'id';  

     
    public function __construct() {
        parent::__construct();
    }

    
    public function get_all() {
        return $this->db->get($this->table)->result();
    }

    
    public function get($id) {
        return $this->db->get_where($this->table, [$this->primaryKey => $id])->row();
    }

     
    public function insert($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function insert2($data) {
        try {
            
            $this->db->insert($this->table, $data);
            return $data; 
        } catch (\Exception $th) {
             
            log_message('error', 'Erreur lors de l\'insertion: ' . $th->getMessage()); 
            throw new \Exception('Erreur lors de l\'insertion des données dans la base de données: ' . $th->getMessage()); // Relance l'exception
        }
    }
    

     
    public function update($id, $data) {
        return $this->db->update($this->table, $data, [$this->primaryKey => $id]);
    }

    public function update2($id,$id2,$data) {
        return $this->db->update($this->table, $data, [$this->primaryKey => $id,$this->primaryKey2 =>$id2]);
    }

    public function get_by_email($email) {
         
        $this->db->where('email', $email);
        $query = $this->db->get($this->table);
         
        if ($query->num_rows() > 0) {
            return $query->row(); 
        }
        
        return null;  
    }
     
    public function delete($id) {
        return $this->db->delete($this->table, [$this->primaryKey => $id]);
    }
}
?>
