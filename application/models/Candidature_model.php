<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Smalot\PdfParser\Parser;

class Candidature_model extends MY_Model {

    protected $table = "candidatures";

    public function __construct() {
        parent::__construct();
    }

    public function predire_reussite_candidat($offre_id, $candidat_id) {
        // Récupération des informations de l'offre
        $offre = $this->db->select('competences_requises, experience_requise, localisation, teletravail')
                          ->from('offres')
                          ->where('id', $offre_id)
                          ->get()
                          ->row_array();
        
        // if (!$offre) {
        //     log_message('error', 'Offre non trouvée pour l\'ID ' . $offre_id);
        //     return 0; // Retourne un score de 0 si l'offre est introuvable
        // }

        // Récupération de la candidature
        $candidature = $this->db->select('cv, lettre_motivation')
                                ->from('candidatures')
                                ->where('offre_id', $offre_id)
                                ->where('candidat_id', $candidat_id)
                                ->get()
                                ->row_array();
        
        // if (!$candidature) {
        //     log_message('error', 'Candidature non trouvée pour l\'offre ID ' . $offre_id . ' et le candidat ID ' . $candidat_id);
        //     return 0; 
        // }

        // Extraction du texte des fichiers PDF
        
        $lettre_motivation_text = $this->extraire_texte_pdf('./uploads/' . $offre_id . '/' . $candidature['lettre_motivation']);
        
        // if (!$cv_text || !$lettre_motivation_text) {
        //     log_message('error', 'Impossible d\'extraire le texte du CV ou de la lettre de motivation.');
        //     return 0;
        // }

        // Analyse des informations
        $experience_candidat = $this->extraire_experience($cv_text);
        $prediction_score = 0;

        $prediction_score += $this->analyser_competences($cv_text, $offre['competences_requises']);
        $prediction_score += $this->analyser_experience($experience_candidat, $offre['experience_requise']);
        $prediction_score += $this->analyser_localisation($offre['localisation'], $cv_text);
        $prediction_score += $this->analyser_teletravail($offre['teletravail'], $cv_text);
        $prediction_score += $this->analyser_culture_entreprise($lettre_motivation_text, $offre['competences_requises']);

        // Normalisation du score
        $max_score = 100;
        $normalized_score = min($prediction_score, $max_score);
        $percentage_score = ($normalized_score / $max_score) * 100;

        // return round($percentage_score, 2);
		return $cv_text;
    }

    private function extraire_texte_pdf($file_path) {
        if (!file_exists($file_path)) {
            log_message('error', 'Fichier introuvable : ' . $file_path);
            return '';
        }

        try {
            $parser = new Parser();
            $pdf = $parser->parseFile($file_path);
            return $pdf->getText();
        } catch (Exception $e) {
            log_message('error', 'Erreur lors de l\'extraction du texte du fichier PDF : ' . $e->getMessage());
            return '';
        }
    }

    private function extraire_experience($cv_text) {
        $experience = 0;
        $pattern = '/(\d+)\s*(ans?|année|an)\s*d\'?expérience/i';

        preg_match($pattern, $cv_text, $matches);

        if (!empty($matches)) {
            $experience = (int)$matches[1];
        }

        return $experience;
    }

    private function analyser_competences($cv, $competences_requises) {
        $score = 0;
        $competences_requises = explode(',', $competences_requises);

        foreach ($competences_requises as $competence) {
            if (stripos($cv, trim($competence)) !== false) {
                $score += 10;
            }
        }

        return $score;
    }

    private function analyser_experience($experience, $experience_requise) {
        return ($experience >= $experience_requise) ? 20 : 0;
    }

    private function analyser_localisation($localisation_offre, $cv) {
        return (stripos($cv, $localisation_offre) !== false) ? 10 : 0;
    }

    private function analyser_teletravail($teletravail_offre, $cv) {
        return ($teletravail_offre && stripos($cv, 'télétravail') !== false) ? 10 : 0;
    }

    private function analyser_culture_entreprise($lettre_motivation, $culture_keywords) {
        $score = 0;
        $keywords = explode(',', $culture_keywords);

        foreach ($keywords as $keyword) {
            if (stripos($lettre_motivation, trim($keyword)) !== false) {
                $score += 15;
            }
        }

        return $score;
    }
}
