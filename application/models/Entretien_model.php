<?php
class Entretien_model extends CI_Model {
       
    public function __construct() {
        $this->load->database();
    }

    public function insert_entretien($data) {
        $this->db->insert('entretien', $data);
        return $this->db->insert_id();
    }

    public function get_all_entretiens() {
        $query = $this->db->get('entretien');
        return $query->result_array();
    }

    public function get_entretien_by_id($id) {
        $query = $this->db->get_where('entretien', array('id' => $id));
        return $query->row_array();
    }

    public function get_entretien_par_besoin($idBesoin){

        $this->db->select('a.id_candidature AS id_candidature, a.id AS entretien_id, a.date_entretien, a.heure_entretien, 
                        c.nom, c.prenom, b.typeposte AS besoin_type');
        $this->db->from('entretien a');
        $this->db->join('candidature ca', 'a.id_candidature = ca.id');
        $this->db->join('candidat c', 'ca.id_candidat = c.id'); 
        $this->db->join('besoin b', 'ca.id_besoin = b.id'); 
        $this->db->where('ca.id_statut', 4);
        $this->db->where('b.id', $idBesoin);

        $query = $this->db->get();
        return $query->result();
    }
}
