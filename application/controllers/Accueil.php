<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Accueil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        
    }

    public function index()
    {
		$data['vue'] = 'offre/liste.php';
        $data['offres']=$this->Offre_model->get_by_statut('ouverte');

        $this->load->view('front_office/template', $data);
    }

    public function filtrer_besoins()
    {
        $date_limite = $this->input->post('date_limite');
        $annee_min = $this->input->post('annee_min');
        $annee_max = $this->input->post('annee_max');
        $date_pub_start = $this->input->post('date_pub_start');
        $date_pub_end = $this->input->post('date_pub_end');

        if (empty($date_limite)) {
            $date_limite = null;
        }
        if (empty($annee_min)) {
            $annee_min = null;
        }
        if (empty($annee_max)) {
            $annee_max = null;
        }
        if (empty($date_pub_start)) {
            $date_pub_start = null;
        }
        if (empty($date_pub_end)) {
            $date_pub_end = null;
        }

        $resultats = $this->Offre_model->filter_offres($date_limite, $annee_min, $annee_max, $date_pub_start, $date_pub_end);

        $data['offres'] = $resultats;
        $data['date_limite'] = $date_limite;
        $data['annee_min'] = $annee_min;
        $data['annee_max'] = $annee_max;
        $data['date_pub_start'] = $date_pub_start;
        $data['date_pub_end'] = $date_pub_end;
        $data['vue'] = "offre/liste.php";

        $this->load->view('front_office/template', $data);
    }

    public function details_offre()
    {
        $id_offre = $this->input->get('id_offre');
        $data['offre']=$this->Offre_model->get($id_offre);
        $data['vue'] = "offre/details_offre.php";

        $this->load->view('front_office/template', $data);
    }

    public function soumettre_offre_upload()
	{
		$id_offre = $this->input->post('id_offre');
		$id_user = $this->session->userdata('utilisateur_id_source');

		 
		$cv_file_name = $this->Upload->upload_files($id_user, $id_offre, "cv");
		if (isset($cv_file_name['error'])) {
			$data['error'] = $cv_file_name['error'];
			echo $data['error'];
			return;  
		}

		$lm_file_name = $this->Upload->upload_files($id_user, $id_offre, "lm");
		if (isset($lm_file_name['error'])) {
			$data['error'] = $lm_file_name['error'];
			echo $data['error'];
			return;  
		}

		 
		$data_candidature = [
			'offre_id' => $id_offre,
			'candidat_id' => $id_user,
			'cv' =>''.$id_offre.'-'.$id_user.'-cv--' . time(). '.pdf',  
			'lettre_motivation' => ''.$id_offre.'-'.$id_user.'-lm--' . time(). '.pdf',
			'date_candidature' => date('Y-m-d H:i:s'),  
			'statut' => 'en attente', 
		];

		 
		$this->db->insert('candidatures', $data_candidature);

		
		redirect('accueil');
	}


    public function soumettre_offre()
    {
        $id_offre = $this->input->get('id_offre');

        $data['id_offre'] = $id_offre;
        $data['vue'] = "offre/postuler_offre.php";

        $this->load->view('front_office/template', $data);
    }

    public function soumettre_offre_form()
    {
        $id_offre = $this->input->get('id_offre');

        $data['id_offre'] = $id_offre;
        $data['vue'] = "offre/postuler_offre_form.php";

        $this->load->view('front_office/template', $data);
    }

    public function  validerCV()
    {
        $data['cv'] = array(
            'candidat_id' => $this->input->post('user_id'),
            'titre_professionnel' => $this->input->post('titre_pro'),
            'etudes' => $this->input->post('etudes'),
            'experiences' => $this->input->post('experiences'),
            'salaire_souhaite' => $this->input->post('pretention_salaire'),
            'competences_specifiques' => $this->input->post('competences_specifiques'),
            'qualites' => $this->input->post('qualites'),
            'loisirs' => $this->input->post('loisirs'),
            'date_creation' => date('Y-m-d')
        );

        $cv = $this->Cv_model->insert($data['cv']);

        if ($cv) {
            $data['annonce_id'] = $this->input->post('id_offre');
            $data['cv_id'] = $cv;
            $data['content'] = "offre/lettre_motivation_form";
            $this->load->view('template', $data);
        } else {
            redirect('accueil/soumettre_offre_form');
        }
    }

    public function enregistrerLM()
    {
        $data['lm'] = array(
            'candidat_id' => $this->input->post('user_id'),
            'titre' => $this->input->post('titre'),
            'contenu' => $this->input->post('contenu')
        );

        $lm = $this->LettresMotivation_model->insert($data['lm']);

        $data['candidature'] = array(
            'candidat_id' => $this->session->userdata('user_id'),
            'annonce_id' => $this->input->post('id_offre'),
            'cv_id' => $this->input->post('id_cv'),
            'lettres_motivation_id' => $lm
        );

        if ($lm) {
            $this->Candidature_model->insert($data['candidature']);
            redirect("accueil");
        } else {
            $data['content'] = "offre/lettre_motivation_form";
            $this->load->view('template', $data);
        }
    }
}
