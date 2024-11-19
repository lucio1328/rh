<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user/UserModel');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function checkConnexion() {
        try {
            $nom_utilisateur = $this->input->post('nom_utilisateur');
            $mot_de_passe = $this->input->post('mot_de_passe');

            $user = $this->UserModel->getUser($nom_utilisateur, $mot_de_passe);

            if ($user) {
                $this->session->set_userdata([
                    'user_id' => $user->id,
                    'nom_utilisateur' => $user->nom,
                ]);
                redirect('accueil');
            } else {
                throw new Exception('Nom d\'utilisateur ou mot de passe incorrect');
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('error', $e->getMessage());
            redirect('welcome');
        }
    }

    public function createUser() {
        try {
            $data = $this->input->post([
                'nom_utilisateur', 'a_propos', 'telephone', 'facebook',
                'instagram', 'linkedin', 'email', 'mot_de_passe'
            ]);

            if ($this->UserModel->getUserByEmail($data['email'])) {
                throw new Exception('Un utilisateur est déjà enregistré avec cet email.');
            }

            $user_id = $this->UserModel->insert(
                $data['nom_utilisateur'],
                $data['a_propos'],
                $data['telephone'],
                $data['facebook'],
                $data['instagram'],
                $data['linkedin'],
                $data['email'],
                $data['mot_de_passe']
            );

            $this->session->set_userdata([
                'user_id' => $user_id,
                'nom_utilisateur' => $data['nom_utilisateur']
            ]);

            redirect('accueil');
        } catch (Exception $e) {
            $this->session->set_flashdata('error', $e->getMessage());
            redirect('welcome/creation_compte');
        }
    }

    public function deconnexion() {
        $this->session->unset_userdata(['user_id', 'nom_utilisateur']);
        $this->session->sess_destroy();
        redirect('welcome');
    }

    public function profile() {
        try {
            $user_id = $this->session->userdata('user_id');
            if (!$user_id) {
                throw new Exception('Vous devez être connecté pour accéder à cette page.');
            }

            $data['user'] = $this->UserModel->getUserById($user_id);
            $data['content'] = "user/profile.php";

            $this->load->view('template', $data);
        } catch (Exception $e) {
            $this->session->set_flashdata('error', $e->getMessage());
            redirect('welcome');
        }
    }

    public function updateProfile() {
        try {
            $user_id = $this->session->userdata('user_id');
            if (!$user_id) {
                throw new Exception('Vous devez être connecté pour effectuer cette action.');
            }

            $data = $this->input->post([
                'nom_utilisateur', 'a_propos', 'telephone', 'facebook',
                'instagram', 'linkedin', 'email'
            ]);

            $result = $this->UserModel->update(
                $user_id,
                $data['nom_utilisateur'],
                $data['a_propos'],
                $data['telephone'],
                $data['facebook'],
                $data['instagram'],
                $data['linkedin'],
                $data['email']
            );

            if ($result === true) {
                $this->session->set_flashdata('success', 'Profil mis à jour avec succès.');
            } else {
                throw new Exception($result);
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('error', $e->getMessage());
        }

        redirect('user/profile');
    }

    public function updateMdp() {
        try {
            $user_id = $this->session->userdata('user_id');
            if (!$user_id) {
                throw new Exception('Vous devez être connecté pour effectuer cette action.');
            }

            $password = $this->input->post('password');
            $newpassword = $this->input->post('newpassword');
            $renewpassword = $this->input->post('renewpassword');

            if ($newpassword !== $renewpassword) {
                throw new Exception('Le nouveau mot de passe et la confirmation ne correspondent pas.');
            }

            $result = $this->UserModel->updateMdp($user_id, $password, $newpassword);

            if ($result === true) {
                $this->session->set_flashdata('success', 'Mot de passe mis à jour avec succès.');
            } else {
                throw new Exception($result);
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('error', $e->getMessage());
        }

        redirect('user/profile');
    }
}
