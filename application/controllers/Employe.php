<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employe extends CI_Controller {

    public function __construct() {
        parent::__construct();
         
         
        $this->load->model('Employe_model');  
        $this->load->model('Candidat_model');  
        $this->load->library('form_validation');   
        $this->load->library('session');  
    }

    public function liste(){
        $data['vue'] = 'employe/liste.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['postes']=$this->Poste_model->get_all();
        $data['candidatures']=$this->Candidature_model->get_all();
        $this->load->view('back_office/template', $data);
    }

    public function modifier($id){
        $data['vue'] = 'employe/modif.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['employe']=$this->Employe_model->get($id);
        $data['postes']=$this->Poste_model->get_all();
        $data['candidatures']=$this->Candidature_model->get_all();
        $this->load->view('back_office/template', $data);
    }


    public function competence($id){
        $data['vue'] = 'employe/competence.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['employe']=$this->Employe_model->get($id);
        $data['postes']=$this->Poste_model->get_all();
        $data['candidatures']=$this->Candidature_model->get_all();
        $data['competences']=$this->Competence_model->get_all();
        $this->load->view('back_office/template', $data);
    }


    public function competence_aj($id) {
         
        $data['vue'] = 'employe/competence.php';
        $data['utilisateurs'] = $this->Utilisateur_model->get_all();
        $data['employes'] = $this->Employe_model->get_all();
        $data['employe'] = $this->Employe_model->get($id);
        $data['postes'] = $this->Poste_model->get_all();
        $data['candidatures'] = $this->Candidature_model->get_all();
        $data['competences'] = $this->Competence_model->get_all();
    
         
        $competence['employe_id'] = $this->input->post('employe_id');
        $competence['competence_id'] = $this->input->post('competence_id');
    
         
        if (!empty($competence['employe_id']) && !empty($competence['competence_id'])) {
            try {
                 
                if ($this->EmployeCompetence_model->insert2($competence)) {
                    $this->session->set_flashdata('success', 'La compétence a été ajoutée avec succès');
                } else {
                    $this->session->set_flashdata('error', 'Une erreur s\'est produite lors de l\'ajout de la compétence');
                }
            } catch (Exception $e) {
                 
                $this->session->set_flashdata('error', 'Erreur système : ' . $e->getMessage());
            }
        } else {
             
            $this->session->set_flashdata('error', 'Veuillez sélectionner un employé et une compétence');
        }
    
         
        $this->load->view('back_office/template', $data);
    }

    public function contrat($id){
        $data['vue'] = 'employe/contrat.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['employe']=$this->Employe_model->get($id);
        $data['contrat']=$this->Contrat_model->get_contrat($id);
        $data['postes']=$this->Poste_model->get_all();
        $data['candidatures']=$this->Candidature_model->get_all();
        $data['competences']=$this->Competence_model->get_all();
        $this->load->view('back_office/template', $data);
    }

    public function contrat_up($id) {
         
        $data['utilisateurs'] = $this->Utilisateur_model->get_all();
        $data['employes'] = $this->Employe_model->get_all();
        $data['employe'] = $this->Employe_model->get($id); 
        $data['postes'] = $this->Poste_model->get_all();
        $data['contrat'] = $this->Contrat_model->get_contrat($id); 
        $data['candidatures'] = $this->Candidature_model->get_all();
        $data['competences'] = $this->Competence_model->get_all();
    
         
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             
            // $employe_id = $this->input->post('employe_id');
            $poste_id = $this->input->post('poste_id');
            $date_debut = $this->input->post('date_debut');
            $date_fin = $this->input->post('date_fin');
            $type = $this->input->post('type');
    
             
            // $this->form_validation->set_rules('employe_id', 'Employé', 'required');
            $this->form_validation->set_rules('poste_id', 'Poste', 'required');
            $this->form_validation->set_rules('date_debut', 'Date de début', 'required');
            $this->form_validation->set_rules('date_fin', 'Date de fin', 'required');
            $this->form_validation->set_rules('type', 'Type de contrat', 'required');
    
            if ($this->form_validation->run() === TRUE) {
                 
                $data_update = array(
                    'employe_id' => $id,
                    'poste_id' => $poste_id,
                    'date_debut' => $date_debut,
                    'date_fin' => $date_fin,
                    'type' => $type
                );
    
                 
                if ($this->Contrat_model->update($id, $data_update)) {
                     
                    $this->session->set_flashdata('success', 'Le contrat a été mis à jour avec succès.');
                      
                } else {
                    
                    $this->session->set_flashdata('error', 'Une erreur est survenue lors de la mise à jour du contrat.');
                }
            }
        }
    
         
        $data['vue'] = 'employe/contrat.php'; 
        $this->load->view('back_office/template', $data);
    }


    public function promotion($id){
        $data['vue'] = 'employe/promotion.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['employe']=$this->Employe_model->get($id);
        $data['postes']=$this->Poste_model->get_all();
        $data['candidatures']=$this->Candidature_model->get_all();
        $data['competences']=$this->EmployeCompetence_model->get_competence($id);
        $data['poste']=$this->EmployePoste_model->get($id);
        $data['contrat']=$this->Contrat_model->get_contrat($id);
        $data['promotion']=$this->Promotion_model->get_promotion($id);
        $this->load->view('back_office/template', $data);
    }

    public function promouvoir($id) {
         
        $data['utilisateurs'] = $this->Utilisateur_model->get_all();
        $data['employes'] = $this->Employe_model->get_all();
        $data['employe'] = $this->Employe_model->get($id);
        $data['postes'] = $this->Poste_model->get_all();
        $data['candidatures'] = $this->Candidature_model->get_all();
        $data['competences'] = $this->EmployeCompetence_model->get_competence($id);
        $data['poste'] = $this->EmployePoste_model->get($id);  
        $data['contrat'] = $this->Contrat_model->get_contrat($id);
        $data['promotion'] = $this->Promotion_model->get_promotion($id);
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $poste_id = $this->input->post('nouveau_poste_id');
            $date_promotion = $this->input->post('date_promotion');
            $niveau_competence = $this->input->post('niveau_competence');
            $experience = $this->input->post('experience');
    
            
            $this->form_validation->set_rules('nouveau_poste_id', 'Poste', 'required');
            $this->form_validation->set_rules('date_promotion', 'Date de la promotion', 'required');
            $this->form_validation->set_rules('niveau_competence', 'Niveau de compétence', 'required');
            $this->form_validation->set_rules('experience', 'Années d\'expérience', 'required|numeric');
    
            if ($this->form_validation->run() === TRUE) {
                 
                $data_update_promotion = array(
                    'employe_id' => $id,
                    'ancienne_poste_id' => $data['poste']->poste_id,
                    'nouveau_poste_id' => $poste_id,
                    'date_promotion' => $date_promotion
                );
    
                 
                if ($this->Promotion_model->insert($data_update_promotion)) {
                     
                    $data_update_employe_poste = array(
                        'niveau_competence' => $niveau_competence,
                        'experience' => $experience,
                        'poste_id' => $poste_id,
                        'employe_id' => $id,
                        'date_ajout'=>$date_promotion
                    );
     
                    if ($this->EmployePoste_model->update2($id, $data['poste']->poste_id, $data_update_employe_poste)) {
                        
                        $this->session->set_flashdata('success', 'L\'employé a été promu avec succès');
                    } else {
                        $this->session->set_flashdata('error', 'Une erreur est survenue lors de la mise à jour du poste.');
                    }
                } else {
                     
                    $this->session->set_flashdata('error', 'Une erreur est survenue lors de l\'insertion de la promotion.');
                }
            }
        }
    
        
        $data['vue'] = 'employe/promotion.php'; 
        $this->load->view('back_office/template', $data);
    }
    
    
    
    public function ajout(){
        $data['vue'] = 'employe/ajout.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['postes']=$this->Poste_model->get_all();
        $data['candidatures']=$this->Candidature_model->get_all();
        $this->load->view('back_office/template', $data);
    }

    public function supprimer($id){
        $this->Employe_model->delete($id);
        redirect('employe/liste');
    }


    public function modification($id) {
        $employe = $this->Employe_model->get($id);  
        if ($employe) {
             
            if ($this->input->post()) {
                $data = [
                    'nom' => $this->input->post('nom'),
                    'prenom' => $this->input->post('prenom'),
                    'date_naissance' => $this->input->post('date_naissance'),
                    'adresse' => $this->input->post('adresse'),
                    'sexe' => $this->input->post('sexe'),
                    'contact' => $this->input->post('contact'),
                    'email' => $this->input->post('email'),
                    

                ];
                
                $data_utilisateur =[
                    'id_source'=>$employe->id,
                    'email'=>$this->input->post('email'),
                    'mdp' => !empty($this->input->post('mdp')) ? password_hash($this->input->post('mdp'), PASSWORD_DEFAULT) : (isset($this->Utilisateur_model->get_by_email($employe->email)->mdp) ? $this->Utilisateur_model->get_by_email($employe->email)->mdp : '')
                ];
                 
                $this->Utilisateur_model->update($this->Utilisateur_model->get_by_email($employe->email)->id, $data);
                
                $this->Employe_model->update($id, $data);
                $this->session->set_flashdata('success', 'Employé mis à jour avec succès.');
                $data['vue'] = 'employe/modif.php';
                $data['utilisateurs']=$this->Utilisateur_model->get_all();
                $data['employes']=$this->Employe_model->get_all();
                $data['employe']=$this->Employe_model->get($id);
                $data['postes']=$this->Poste_model->get_all();
                $data['candidatures']=$this->Candidature_model->get_all();
                $this->load->view('back_office/template', $data);
            }
    
             
            $data['vue'] = 'employe/modif.php';
            $data['utilisateurs']=$this->Utilisateur_model->get_all();
            $data['employes']=$this->Employe_model->get_all();
            $data['employe']=$this->Employe_model->get($id);
            $data['postes']=$this->Poste_model->get_all();
            $data['candidatures']=$this->Candidature_model->get_all();
            $this->load->view('back_office/template', $data);
        } else {
            $this->session->set_flashdata('error', 'Employé non trouvé.');
            $data['vue'] = 'employe/modif.php';
            $data['utilisateurs']=$this->Utilisateur_model->get_all();
            $data['employes']=$this->Employe_model->get_all();
            $data['employe']=$this->Employe_model->get($id);
            $data['postes']=$this->Poste_model->get_all();
            $data['candidatures']=$this->Candidature_model->get_all();
            $this->load->view('back_office/template', $data);
        }
    }
    

    public function profil($id){
        $data['vue'] = 'employe/profil.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['employe']=$this->Employe_model->get($id);
        $data['postes']=$this->Poste_model->get_all();
        $data['candidatures']=$this->Candidature_model->get_all();
        $data['competences']=$this->EmployeCompetence_model->get_competence($id);
        $data['poste']=$this->EmployePoste_model->get($id);
        $data['contrat']=$this->Contrat_model->get_contrat($id);
        $data['promotion']=$this->Promotion_model->get_promotion($id);

        $this->load->view('back_office/template', $data);
    }
    
}
