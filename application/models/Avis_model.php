<?php

class Avis_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function ajouter_avis($data)
    {
        return $this->db->insert('avis_test', $data);
    }

    public function get_avis_par_id($avis_id) {
        $this->db->select('a.id as avis_id, a.message, a.date_test, a.heure_test, c.nom, c.prenom');
        $this->db->from('avis_test a');
        $this->db->join('candidature ca', 'a.id_candidature = ca.id');
        $this->db->join('candidat c', 'ca.id_candidat = c.id');
        $this->db->where('a.id', $avis_id);
        $query = $this->db->get();
        
        return $query->row();
    }

    public function get_avis_par_besoin($idBesoin){

        $this->db->select('a.id_candidature AS id_candidature, a.id AS avis_id, a.message, a.date_test, a.heure_test, 
                        c.nom, c.prenom, b.typeposte AS besoin_type');
        $this->db->from('avis_test a');
        $this->db->join('candidature ca', 'a.id_candidature = ca.id');
        $this->db->join('candidat c', 'ca.id_candidat = c.id'); 
        $this->db->join('besoin b', 'ca.id_besoin = b.id'); 
        $this->db->where('ca.id_statut', 3);
        $this->db->where('b.id', $idBesoin);

        $query = $this->db->get();
        return $query->result();
    }

}


?>