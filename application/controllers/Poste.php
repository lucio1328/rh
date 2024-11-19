<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poste extends CI_Controller {

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
        $data['candidatures']=$this->Candidature_model->get_all();
        $this->load->view('back_office/template', $data);
    }

    public function liste(){
        $data['vue'] = 'poste/liste.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['postes']=$this->Poste_model->get_all();
        $data['candidatures']=$this->Candidature_model->get_all();
        $this->load->view('back_office/template', $data);
    }


    public function ajout(){
        $data['vue'] = 'poste/ajout.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['postes']=$this->Poste_model->get_all();
        $data['candidatures']=$this->Candidature_model->get_all();
        $this->load->view('back_office/template', $data);
    }

    public function modifier($id){
        $data['vue'] = 'poste/modif.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['postes']=$this->Poste_model->get_all();
        $data['poste']=$this->Poste_model->get($id);

        $data['candidatures']=$this->Candidature_model->get_all();
        $this->load->view('back_office/template', $data);
    }

    public function supprimer($id){
        $data['vue'] = 'poste/liste.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['postes']=$this->Poste_model->get_all();
        $data['candidatures']=$this->Candidature_model->get_all();
        $this->Poste_model->delete($id);
        $this->load->view('back_office/template', $data);
    }
    

    public function create(){
        $data['vue'] = 'poste/ajout.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['postes']=$this->Poste_model->get_all();
        $data['candidatures']=$this->Candidature_model->get_all();
        

        $this->load->library('form_validation');
    
         
       
    
       
             
            $nom = $this->input->post('nom');
            $description = $this->input->post('description');
            
    
             
            // $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    
             
            $data = [
                'nom' => $nom,
                'description' => $description,
            ];
    
             

    
             
            $result = $this->Poste_model->insert($data);
    
             
            if ($result) {
                $this->session->set_flashdata('success', 'Poste ajouté avec succès.');
            } else {
                $this->session->set_flashdata('error', 'Une erreur est survenue lors de l\'ajout du poste.');
            }
    
        redirect("poste/ajout");
        
    }

    public function modification($id){
        $data['vue'] = 'poste/ajout.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['postes']=$this->Poste_model->get_all();
        $data['candidatures']=$this->Candidature_model->get_all();
        

        $this->load->library('form_validation');
    
         
       
    
       
             
            $nom = $this->input->post('nom');
            $description = $this->input->post('description');
            
    
             
            // $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    
             
            $data = [
                'nom' => $nom,
                'description' => $description,
            ];
    
             

    
             
            $result = $this->Poste_model->update($id,$data);
    
             
            if ($result) {
                $this->session->set_flashdata('success', 'Poste mise a jour avec succès.');
            } else {
                $this->session->set_flashdata('error', 'Une erreur est survenue lors de la mise a jour du poste.');
            }
    
        redirect("poste/modifier/".$id);
        
    }
    
    
}
