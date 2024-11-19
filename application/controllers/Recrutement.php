<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property CI_Loader $load
 * @property CI_Session $session
 * @property Profil_model $Profil_model
 * @property Besoin_model $Besoin_model
 * @property BesoinLib_model $BesoinLib_model 
 * @property PieceAFournir_model $PieceAFournir_model
 * @property MoyenPourPostuler_model $MoyenPourPostuler_model
 * @property input $input
 */
class Recrutement extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Profil_model');
        $this->load->model('Besoin_model');
        $this->load->helper('url_helper');
        $this->load->model('BesoinLib_model');
        $this->load->model('PieceAFournir_model');
        $this->load->model('MoyenPourPostuler_model');
    }

    public function index() {
        if ($this->input->post()) {
            $titre = $this->input->post('titre');
            $description = $this->input->post('description');
            $responsabilitePrincp = $this->input->post('responsabilite');
            $etudes = $this->input->post('etudes');
            $experience = $this->input->post('experience');

            if ($this->Besoin_model->typeposte_exists($titre)) {
                $data['error'] = "La poste '$titre' existe deja.";
                $data['content'] = $this->load->view('Users/home', $data, TRUE);
                $this->load->view('welcome_message', $data);
                return;
            }

            $data = array(
                'typeposte' => $titre,
                'description' => $description,
                'respprincip' => $responsabilitePrincp,
                'etudes' => $etudes,
                'experience' => $experience
            );

            $id_besoin = $this->Besoin_model->insert_besoin($data);
            $data['id_besoin'] = $id_besoin;
            
            if ($this->Profil_model->profil_existe($titre, $etudes, $experience)) {

                $data['profils']=$this->Profil_model->get_profil_by_mety($etudes, $experience);
                $this->load->view('Users/liste_profil',$data);
            } 
            else {
                $data['content'] = $this->load->view('/Users/ajouter_annonce', $data, TRUE);
                $this->load->view('welcome_message', $data);
            }
        } else {
            $data['profils'] = $this->Profil_model->get_profils();
        }
    }

    public function ajouter() {
        $idBesoin = $this->input->post('id_besoin');
        $avantages = $this->input->post('avantages');
        $date_limite = $this->input->post('date_limite');
        $pieces = $this->input->post('piece');
        $moyens = $this->input->post('moyen_postuler');

        $besoinLibData = [
            'id_besoin' => $idBesoin,
            'avantages' => $avantages,
            'date_limite' => $date_limite
        ];
        $this->BesoinLib_model->insert($besoinLibData);

        if (!empty($pieces)) {
            foreach ($pieces as $piece) {
                $idDocument = $this->getDocumentIdByName($piece);
                if ($idDocument !== null) {
                    $pieceData = [
                        'idbesoin' => $idBesoin,
                        'iddocuments' => $idDocument
                    ];
                    $this->PieceAFournir_model->insert($pieceData);
                }
            }
        }

        if (!empty($moyens)) {
            foreach ($moyens as $moyen) {
                $moyenData = [
                    'idbesoin' => $idBesoin,
                    'designation' => $moyen
                ];
                $this->MoyenPourPostuler_model->insert($moyenData);
            }
        }

        $data['poste'] = $this->Besoin_model->get_besoin_by_id($idBesoin);
        $data['description'] = $this->Besoin_model->get_besoin_lib($idBesoin);
        $data['pieceAFournir'] = $this->Besoin_model->get_pieces_a_fournir($idBesoin);
        $data['moyenPourPostuler'] = $this->Besoin_model->get_moyens_pour_postuler($idBesoin);

        $data['content'] = $this->load->view("Resultat", $data, TRUE);
        $this->load->view('welcome_message', $data);
    }

    private function getDocumentIdByName($name) {
        $documents = [
            'CV' => 1,
            'Lettre de motivation' => 2,
            'Diplômes' => 3
        ];
        return isset($documents[$name]) ? $documents[$name] : null;
    }
    
}
