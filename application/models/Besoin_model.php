<?php
class Besoin_model extends CI_Model {
    
    public function __construct() {
        $this->load->database();
    }

    public function insert_besoin($data) {
        $this->db->insert('besoin', $data);
        return $this->db->insert_id();
    }

    public function get_all_besoins() {
        $query = $this->db->get('besoin');
        return $query->result();
    }

    public function get_besoin_by_id($id) {
        $query = $this->db->get_where('besoin', array('id' => $id));
        return $query->row();
    }

    public function typeposte_exists($typePoste) {
        $this->db->where('typeposte', $typePoste);
        $query = $this->db->get('besoin');
        return $query->num_rows() > 0;
    }    

    public function get_besoin_lib($idBesoin) {
        $this->db->select('avantages, date_limite');
        $this->db->from('besoin_lib');
        $this->db->where('id_besoin', $idBesoin);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_pieces_a_fournir($idBesoin) {
        $this->db->select('d.designation as designation');
        $this->db->from('pieceafournir pf');
        $this->db->join('documents d', 'pf.iddocuments = d.id');
        $this->db->where('pf.idbesoin', $idBesoin);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_moyens_pour_postuler($idBesoin) {
        $this->db->select('designation');
        $this->db->from('moyenpourpostuler');
        $this->db->where('idbesoin', $idBesoin);
        $query = $this->db->get();

        return $query->result();
    }
}
