<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Competence extends CI_Controller {

    public function __construct() {
        parent::__construct();
         
         
        $this->load->model('Employe_model');  
        $this->load->model('Candidat_model');  
        $this->load->library('form_validation');   
        $this->load->library('session');  
    }

    public function choix(){
        $data['vue'] = 'choix.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['postes']=$this->Poste_model->get_all();
        $data['competences']=$this->Competence_model->get_all();

        $data['candidatures']=$this->Candidature_model->get_all();
        $this->load->view('back_office/template', $data);
    }

    public function liste(){
        $data['vue'] = 'competence/liste.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['postes']=$this->Poste_model->get_all();
        $data['candidatures']=$this->Candidature_model->get_all();
        $data['competences']=$this->Competence_model->get_all();

        $this->load->view('back_office/template', $data);
    }


    public function ajout(){
        $data['vue'] = 'competence/ajout.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['postes']=$this->Poste_model->get_all();
        $data['candidatures']=$this->Candidature_model->get_all();
        $data['competences']=$this->Competence_model->get_all();
        $this->load->view('back_office/template', $data);
    }

    public function modifier($id){
        $data['vue'] = 'competence/modif.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['postes']=$this->Poste_model->get_all();
        $data['competences']=$this->Competence_model->get_all();

        $data['competence']=$this->Competence_model->get($id);

        $data['candidatures']=$this->Candidature_model->get_all();
        $this->load->view('back_office/template', $data);
    }

    public function supprimer($id){
        $data['vue'] = 'competence/liste.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['postes']=$this->Poste_model->get_all();
        $data['candidatures']=$this->Candidature_model->get_all();
        $this->Competence_model->delete($id);
        $data['competences']=$this->Competence_model->get_all();

        $this->load->view('back_office/template', $data);
    }
    

    public function create(){
        $data['vue'] = 'competence/ajout.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['postes']=$this->Poste_model->get_all();
        $data['candidatures']=$this->Candidature_model->get_all();
        $data['competences']=$this->Competence_model->get_all();

        

        $this->load->library('form_validation');
    
         
       
    
       
             
            $nom = $this->input->post('nom');
            $description = $this->input->post('description');
            
    
             
            // $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    
             
            $data = [
                'nom' => $nom,
                'description' => $description,
            ];
    
             

    
             
            $result = $this->Competence_model->insert($data);
    
             
            if ($result) {
                $this->session->set_flashdata('success', 'Competence ajouté avec succès.');
            } else {
                $this->session->set_flashdata('error', 'Une erreur est survenue lors de l\'ajout du competence.');
            }
    
        redirect("competence/ajout");
        
    }

    public function modification($id){
        $data['vue'] = 'competence/ajout.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['postes']=$this->Poste_model->get_all();
        $data['candidatures']=$this->Candidature_model->get_all();
        $data['competences']=$this->Competence_model->get_all();
        

        $this->load->library('form_validation');
    
         
       
    
       
             
            $nom = $this->input->post('nom');
            $description = $this->input->post('description');
            
    
             
            // $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    
             
            $data = [
                'nom' => $nom,
                'description' => $description,
            ];
    
             

    
             
            $result = $this->Competence_model->update($id,$data);
    
             
            if ($result) {
                $this->session->set_flashdata('success', 'Competence mise a jour avec succès.');
            } else {
                $this->session->set_flashdata('error', 'Une erreur est survenue lors de la mise a jour du competence.');
            }
    
        redirect("competence/modifier/".$id);
        
    }
    
    
}
