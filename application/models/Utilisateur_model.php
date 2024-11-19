<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Utilisateur_model extends MY_Model {

    protected $table="utilisateurs";  
     
    public function __construct() {
        parent::__construct();
    }

    public function create_utilisateur($data) {
         
        $data['mdp'] = password_hash($data['mdp'], PASSWORD_BCRYPT);

        $this->db->insert($this->table, $data);
        
        return $this->db->insert_id();
    }

    

    public function login($email, $mdp) {
         
        $this->db->where('email', $email);
        $user = $this->db->get($this->table)->row();

         
        if ($user) {
             
            if (password_verify($mdp, $user->mdp)) {
                 
                return $user;
            } else {
                 
                return false;
            }
        } else {
            
            return false;
        }
    }


    
}   
?>
