<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offre2 extends CI_Controller {

    public function __construct() {
        parent::__construct();
         
         
        $this->load->model('Employe_model');  
        $this->load->model('Candidat_model');  
        $this->load->library('form_validation');   
        $this->load->library('session');  
    }

    public function choix(){
        $data['vue'] = 'choix2.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['postes']=$this->Poste_model->get_all();
        $data['candidatures']=$this->Candidature_model->get_all();
        $this->load->view('back_office/template', $data);
    }

    public function liste(){
        $data['vue'] = 'offre/liste.php';
        $data['offres']=$this->Offre_model->get_by_statut('ouverte');

        $this->load->view('front_office/template', $data);
    }    
    
}
