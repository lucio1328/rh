<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilisateur extends CI_Controller {

    public function __construct() {
        parent::__construct();
         
         
        $this->load->model('Utilisateur_model');  
        $this->load->model('Candidat_model');  
        $this->load->library('form_validation');   
        $this->load->library('session');  
    }

    public function liste(){
        $data['vue'] = 'utilisateur/liste.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['postes']=$this->Poste_model->get_all();
        $data['candidatures']=$this->Candidature_model->get_all();
        $this->load->view('back_office/template', $data);
    }

    public function ajouter()
    {
        $this->load->library('form_validation');
    
         
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Mot de passe', 'required|min_length[6]');
        $this->form_validation->set_rules('role', 'Rôle', 'required');
    
        if ($this->form_validation->run() == FALSE) {
             
            redirect("auth/ajout");
        } else {
             
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $role = $this->input->post('role');
    
             
            $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    
             
            $data = [
                'email' => $email,
                'mdp' => $password_hashed,
                'role' => $role,
                'id_source' => 0  
            ];
    
             

    
             
            $result = $this->Utilisateur_model->insert($data);
    
             
            if ($result) {
                $this->session->set_flashdata('success', 'Utilisateur ajouté avec succès.');
            } else {
                $this->session->set_flashdata('error', 'Une erreur est survenue lors de l\'ajout de l\'utilisateur.');
            }
    
             
            redirect('auth/ajout');
        }
    }

    public function modifier($id){
        $data['vue'] = 'utilisateur/modif.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['utilisateur']=$this->Utilisateur_model->get($id);
        $data['employes']=$this->Employe_model->get_all();
        $data['postes']=$this->Poste_model->get_all();
        $data['candidatures']=$this->Candidature_model->get_all();
        $this->load->view('back_office/template', $data);
    }

    public function modification($id)
    {
        $this->load->library('form_validation');
        $this->load->model('Utilisateur_model');

        
        $utilisateur = $this->Utilisateur_model->get($id);
        
         
        if (!$utilisateur) {
            $this->session->set_flashdata('error', 'Utilisateur non trouvé.');
            redirect('auth/liste');
        }

        
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Mot de passe', 'min_length[6]');
        $this->form_validation->set_rules('role', 'Rôle', 'required');

         
        if ($this->form_validation->run() === TRUE) {
             
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $role = $this->input->post('role');

             
            if (!empty($password)) {
                $password_hashed = password_hash($password, PASSWORD_DEFAULT);
            } else {
                $password_hashed = $utilisateur->mdp; 
            }

            
            $data = [
                'email' => $email,
                'mdp' => $password_hashed,
                'role' => $role,
            ];

             
            $result = $this->Utilisateur_model->update($id, $data);

             
            if ($result) {
                $this->session->set_flashdata('success', 'Utilisateur mis à jour avec succès.');
            } else {
                $this->session->set_flashdata('error', 'Une erreur est survenue lors de la mise à jour.');
            }

             
            redirect('auth/liste');
        }

        // Charger la vue avec les données de l'utilisateur
        $data['utilisateur'] = $utilisateur;
        $this->load->view('auth/modifier', $data);
    }


    public function supprimer($id){
        $this->Utilisateur_model->delete($id);
        redirect('auth/liste');
    }

    public function ajout(){
        $data['vue'] = 'utilisateur/ajout.php';
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['postes']=$this->Poste_model->get_all();
        $data['candidatures']=$this->Candidature_model->get_all();
        $this->load->view('back_office/template', $data);
    }

    public function dashbord(){
        $data['utilisateurs']=$this->Utilisateur_model->get_all();
        $data['employes']=$this->Employe_model->get_all();
        $data['postes']=$this->Poste_model->get_all();
        $data['candidatures']=$this->Candidature_model->get_all();
        
        $this->load->view("back_office/template" ,$data);
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function signup()
    {
        $this->load->view('signup');
    }

    
    public function login()
    {
        
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('mdp', 'Mot de passe', 'required');

       
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('login');
        } else {
            
            $email = $this->input->post('email');
            $mdp = $this->input->post('mdp');

            
            $utilisateur = $this->Utilisateur_model->login($email, $mdp);

            if ($utilisateur) {

                $this->session->set_userdata('logged_in', TRUE);
                $this->session->set_userdata('utilisateur_id', $utilisateur->id);
                
                $this->session->set_userdata('utilisateur_email', $utilisateur->email);
                $this->session->set_userdata('utilisateur_role', $utilisateur->role);

                if ($utilisateur->role == 'admin') {
                    $data['utilisateurs']=$this->Utilisateur_model->get_all();
                    $data['employes']=$this->Employe_model->get_all();
                    $data['postes']=$this->Poste_model->get_all();
                    $data['candidatures']=$this->Candidature_model->get_all();
                    
                    $this->load->view("back_office/template" ,$data);

                } else {
					$this->session->set_userdata('utilisateur_id_source', $utilisateur->id_source);
                    $this->load->view("front_office/template");
                }
            } else {
                $this->session->set_flashdata('error', 'Identifiants incorrects.');
                $this->load->view("login");
            }
        }
    }


    public function create_account()
    {
        
        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('prenom', 'Prénom', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[candidats.email]');
        $this->form_validation->set_rules('mdp', 'Mot de passe', 'required|min_length[6]');
        $this->form_validation->set_rules('contact', 'Contact', 'required');
        $this->form_validation->set_rules('sexe', 'Sexe', 'required|in_list[masculin,feminin]');
        $this->form_validation->set_rules('date_naissance', 'Date de naissance', 'required');
        $this->form_validation->set_rules('adresse', 'Adresse', 'required');

        if ($this->form_validation->run() === FALSE) {
             
            $this->load->view('signup');
        } else {
            $action=$this->input->post('action');
            if($action=='candidat'){
                $data_candidat = array(
                    'nom' => $this->input->post('nom'),
                    'prenom' => $this->input->post('prenom'),
                    'email' => $this->input->post('email'),
                    'date_naissance' => $this->input->post('date_naissance'),
                    'adresse' => $this->input->post('adresse'),
                    'sexe' => $this->input->post('sexe'),
                    'contact' => $this->input->post('contact')
                );
    
                 
                $candidat_id = $this->Candidat_model->insert($data_candidat);
    
                if ($candidat_id) {
                     
                    $data_utilisateur = array(
                        'id_source' => $candidat_id,
                        'email' => $this->input->post('email'),
                        'mdp' => password_hash($this->input->post('mdp'), PASSWORD_DEFAULT),
                        'role' => 'candidat'
                    );
    
                    if ($this->Utilisateur_model->insert($data_utilisateur)) {
                        $this->session->set_flashdata('success', 'Compte créé avec succès. Vous pouvez maintenant vous connecter.');
                        $this->load->view('signup');
                    } else {
                         
                        $this->Candidat_model->delete($candidat_id);
                        $this->session->set_flashdata('error', 'Une erreur s\'est produite lors de la création de l\'utilisateur.');
                        $this->load->view('signup');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Une erreur s\'est produite lors de la création du candidat.');
                    $this->load->view('signup');
                }
            }
            else{
                $data_employe = array(
                    'nom' => $this->input->post('nom'),
                    'prenom' => $this->input->post('prenom'),
                    'email' => $this->input->post('email'),
                    'date_naissance' => $this->input->post('date_naissance'),
                    'adresse' => $this->input->post('adresse'),
                    'sexe' => $this->input->post('sexe'),
                    'contact' => $this->input->post('contact')
                );
    
                 
                $employe_id = $this->Employe_model->insert($data_employe);
    
                if ($employe_id) {
                     
                    $data_utilisateur = array(
                        'id_source' => $employe_id,
                        'email' => $this->input->post('email'),
                        'mdp' => password_hash($this->input->post('mdp'), PASSWORD_DEFAULT),
                        'role' => 'employe'
                    );
    
                    if ($this->Utilisateur_model->insert($data_utilisateur)) {
                        $this->session->set_flashdata('success', 'Compte créé avec succès. Vous pouvez maintenant vous connecter.');
                        $data['vue'] = 'employe/ajout.php';
                        $data['utilisateurs']=$this->Utilisateur_model->get_all();
                        $data['employes']=$this->Employe_model->get_all();
                        $data['postes']=$this->Poste_model->get_all();
                        $data['candidatures']=$this->Candidature_model->get_all();
                        $this->load->view('back_office/template', $data);
                    } else {
                         
                        $this->Candidat_model->delete($employe_id);
                        $this->session->set_flashdata('error', 'Une erreur s\'est produite lors de la création de l\'utilisateur.');
                        $data['vue'] = 'employe/ajout.php';
                        $data['utilisateurs']=$this->Utilisateur_model->get_all();
                        $data['employes']=$this->Employe_model->get_all();
                        $data['postes']=$this->Poste_model->get_all();
                        $data['candidatures']=$this->Candidature_model->get_all();
                        $this->load->view('back_office/template', $data);
                    }
                } else {
                    $this->session->set_flashdata('error', 'Une erreur s\'est produite lors de la création du candidat.');
                    $data['vue'] = 'employe/ajout.php';
                    $data['utilisateurs']=$this->Utilisateur_model->get_all();
                    $data['employes']=$this->Employe_model->get_all();
                    $data['postes']=$this->Poste_model->get_all();
                    $data['candidatures']=$this->Candidature_model->get_all();
                    $this->load->view('back_office/template', $data);
                }
            }
        }
    }




    public function logout() {
         
        $this->session->sess_destroy();

        
        redirect('utilisateur/index');
    }
}
