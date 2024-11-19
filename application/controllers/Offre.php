<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offre extends CI_Controller {

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
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['postes']=$this->Poste_model->get_all();
        $data['candidatures']=$this->Candidature_model->get_all();
        $data['offres']=$this->Offre_model->get_all();

        $this->load->view('back_office/template', $data);
    }


    public function ajout(){
        $data['vue'] = 'offre/ajout.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['postes']=$this->Poste_model->get_all();
        $data['candidatures']=$this->Candidature_model->get_all();
        $this->load->view('back_office/template', $data);
    }
    

    public function modifier($id){
        $data['vue'] = 'offre/modif.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['postes']=$this->Poste_model->get_all();
        $data['offre']=$this->Offre_model->get($id);

        $data['candidatures']=$this->Candidature_model->get_all();
        $this->load->view('back_office/template', $data);
    }

    
    public function supprimer($id){
        $data['vue'] = 'offre/liste.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['postes']=$this->Poste_model->get_all();
        $data['candidatures']=$this->Candidature_model->get_all();
        $data['offres']=$this->Offre_model->get_all();
        $this->Offre_model->delete($id);
        $this->load->view('back_office/template', $data);
    }


    public function create() {
         
        $data['vue'] = 'offre/ajout.php';
        
         
        $data['utilisateurs'] = $this->Utilisateur_model->get_all();
        $data['employes'] = $this->Employe_model->get_all();
        $data['postes'] = $this->Poste_model->get_all();
        $data['candidatures'] = $this->Candidature_model->get_all();
    
         
        $this->load->library('form_validation');
        
        
        $this->form_validation->set_rules('titre', 'Titre de l\'offre', 'required');
        $this->form_validation->set_rules('poste_id', 'Poste', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('type_contrat', 'Type de contrat', 'required');
        $this->form_validation->set_rules('localisation', 'Localisation', 'required');
        $this->form_validation->set_rules('date_limite', 'Date limite', 'required');
        $this->form_validation->set_rules('salaire_min', 'Salaire minimum', 'numeric');
        $this->form_validation->set_rules('salaire_max', 'Salaire maximum', 'numeric');
        $this->form_validation->set_rules('experience_requise', 'Expérience requise', 'required|integer');
        $this->form_validation->set_rules('competences_requises', 'Compétences requises', 'required');
        $this->form_validation->set_rules('nb_postes', 'Nombre de postes', 'required|integer');
    
        
        if ($this->form_validation->run() === FALSE) {
            
            $this->load->view('offre/ajout', $data);
        } else {
            
            $titre = $this->input->post('titre');
            $poste_id = $this->input->post('poste_id');
            $description = $this->input->post('description');
            $type_contrat = $this->input->post('type_contrat');
            $localisation = $this->input->post('localisation');
            $date_limite = $this->input->post('date_limite');
            $salaire_min = $this->input->post('salaire_min');
            $salaire_max = $this->input->post('salaire_max');
            $experience_requise = $this->input->post('experience_requise');
            $competences_requises = $this->input->post('competences_requises');
            $teletravail = $this->input->post('teletravail') ? TRUE : FALSE;   
            $nb_postes = $this->input->post('nb_postes');
            
            
            $data = [
                'poste_id' => $poste_id,
                'titre' => $titre,
                'description' => $description,
                'date_publication' => date('Y-m-d H:i:s'),   
                'date_limite' => $date_limite,
                'salaire_min' => $salaire_min,
                'salaire_max' => $salaire_max,
                'type_contrat' => $type_contrat,
                'localisation' => $localisation,
                'experience_requise' => $experience_requise,
                'competences_requises' => $competences_requises,
                'teletravail' => $teletravail,
                'nb_postes' => $nb_postes
            ];
    
             
            $result = $this->Offre_model->insert($data);
    
            
            if ($result) {
                $this->session->set_flashdata('success', 'Offre ajoutée avec succès.');
            } else {
                $this->session->set_flashdata('error', 'Une erreur est survenue lors de l\'ajout de l\'offre.');
            }
    
             
            redirect('offre/ajout');
        }
    }


    public function modification($id){
        $data['vue'] = 'poste/ajout.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['postes']=$this->Poste_model->get_all();
        $data['candidatures']=$this->Candidature_model->get_all();
        

        $this->load->library('form_validation');
    
         
       
    
       
             
        $this->form_validation->set_rules('titre', 'Titre de l\'offre', 'required');
        $this->form_validation->set_rules('poste_id', 'Poste', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('type_contrat', 'Type de contrat', 'required');
        $this->form_validation->set_rules('statut', 'Statut', 'required');
        $this->form_validation->set_rules('localisation', 'Localisation', 'required');
        $this->form_validation->set_rules('date_limite', 'Date limite', 'required');
        $this->form_validation->set_rules('salaire_min', 'Salaire minimum', 'numeric');
        $this->form_validation->set_rules('salaire_max', 'Salaire maximum', 'numeric');
        $this->form_validation->set_rules('experience_requise', 'Expérience requise', 'required|integer');
        $this->form_validation->set_rules('competences_requises', 'Compétences requises', 'required');
        $this->form_validation->set_rules('nb_postes', 'Nombre de postes', 'required|integer');
            
    
             
        if ($this->form_validation->run() === FALSE) {
            
            $this->load->view('offre/ajout', $data);
        } else {
            
            $titre = $this->input->post('titre');
            $poste_id = $this->input->post('poste_id');
            $description = $this->input->post('description');
            $type_contrat = $this->input->post('type_contrat');
            $statut = $this->input->post('statut');
            $localisation = $this->input->post('localisation');
            $date_limite = $this->input->post('date_limite');
            $salaire_min = $this->input->post('salaire_min');
            $salaire_max = $this->input->post('salaire_max');
            $experience_requise = $this->input->post('experience_requise');
            $competences_requises = $this->input->post('competences_requises');
            $teletravail = $this->input->post('teletravail') ? TRUE : FALSE;   
            $nb_postes = $this->input->post('nb_postes');
            
            
            $data = [
                'poste_id' => $poste_id,
                'titre' => $titre,
                'description' => $description,
                'date_publication' => date('Y-m-d H:i:s'),   
                'date_limite' => $date_limite,
                'salaire_min' => $salaire_min,
                'salaire_max' => $salaire_max,
                'type_contrat' => $type_contrat,
                'statut'=>$statut,
                'localisation' => $localisation,
                'experience_requise' => $experience_requise,
                'competences_requises' => $competences_requises,
                'teletravail' => $teletravail,
                'nb_postes' => $nb_postes
            ];
    
             
            $result = $this->Offre_model->update($id,$data);
    
            
            if ($result) {
                $this->session->set_flashdata('success', 'Offre mise a jour avec succès.');
            } else {
                $this->session->set_flashdata('error', 'Une erreur est survenue lors de la mise a jour de l\'offre.');
            }
    
             
            redirect('offre/modifier/'.$id);
        }
        
    }
    
}
