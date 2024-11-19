<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Offre_model extends MY_Model {

    protected $table="offres";  
     
    public function __construct() {
        parent::__construct();
    }

    public function get_by_statut($statut) {
         
        $this->db->where('statut', $statut);
        $query = $this->db->get($this->table);
         
        if ($query->num_rows() > 0) {
            return $query->result(); 
        }
        
        return null;  
    }

	public function filter_offres($x = null, $annee_min = null, $annee_max = null, $date_pub_start = null, $date_pub_end = null)
	{
		$this->db->select('offres.*, postes.nom AS nom_poste')
			->from('offres')
			->join('postes', 'offres.poste_id = postes.id', 'inner');

		// Filtre sur la date limite
		if (!is_null($x)) {
			$this->db->where('offres.date_limite <=', $x);
		}

		// Filtre sur l'expérience requise
		if (!is_null($annee_min) && $annee_min !== '') {
			$this->db->where('offres.experience_requise >=', (int)$annee_min);
		}

		if (!is_null($annee_max) && $annee_max !== '') {
			$this->db->where('offres.experience_requise <=', (int)$annee_max);
		}

		// Filtre sur la date de publication
		if (!is_null($date_pub_start) && $date_pub_start !== '') {
			$this->db->where('offres.date_publication >=', $date_pub_start);
		}

		if (!is_null($date_pub_end) && $date_pub_end !== '') {
			$this->db->where('offres.date_publication <=', $date_pub_end);
		}

		$query = $this->db->get();

		// Vérifier s'il y a des résultats
		if ($query->num_rows() > 0) {
			return $query->result();
		}

		return [];
	}
}
?>
