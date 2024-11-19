<?php
class Profil_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_profils($id = FALSE) {
        if ($id === FALSE) {
            $query = $this->db->get('profils');
            return $query->result_array();
        }

        $query = $this->db->get_where('profils', array('id' => $id));
        return $query->row_array();
    }

    public function add_profil($data) {
        return $this->db->insert('profils', $data);
    }

    public function profil_existe($titre, $etudes, $experience) {
        $this->db->where('poste_actuel', $titre);
        $this->db->like('etudes', $etudes);
        $this->db->where('experience >=', $experience);
        $query = $this->db->get('profils');
    
        return $query->num_rows() > 0;
    }

    public function get_profil_by_mety($etudes, $experience) {
        $this->db->where('etudes', $etudes);
        $this->db->where('experience >=', $experience);
        $query = $this->db->get('profils');

        return $query->row();
    }

    public function get_profils_by_nom($nom) {
        $this->db->like('nom', $nom);
        $query = $this->db->get('profils');
        return $query->result_array();
    }
}
