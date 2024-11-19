<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email extends CI_Controller
{

    function  __construct()
    {
        parent::__construct();
    }

    function send()
    {
        /* Load PHPMailer library */
        $this->load->library('phpmailer_lib');

        /* PHPMailer object */
        $mail = $this->phpmailer_lib->load();

        /* SMTP configuration */
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'rakotondratsimbakevin@gmail.com';
        $mail->Password = 'yofkjemwjfmtugfd'; // Assure-toi de sécuriser ce mot de passe
        $mail->SMTPSecure = 'tls';
        $mail->Port     = 587;
        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'html';

        // Récupération des données dynamiques
        $senderEmail = $this->input->post('email');
        $senderName = $this->input->post('name');

        // Validation des données
        if (empty($senderEmail) || empty($senderName)) {
            $this->session->set_flashdata('error', 'L\'email ou le nom de l\'expéditeur est manquant.');
            redirect('contact');
            return;
        }

        if (!filter_var($senderEmail, FILTER_VALIDATE_EMAIL)) {
            $this->session->set_flashdata('error', 'L\'adresse e-mail de l\'expéditeur est invalide.');
            redirect('contact');
            return;
        }

        // Définir l'adresse de l'envoyeur
        $mail->setFrom($mail->Username, $senderName);
        $mail->addReplyTo($this->input->post('email'), $this->input->post('name'));

        /* Add a recipient */
        $mail->addAddress('kevinrakotondratsimba202@gmail.com');

        /* Email subject */
        $mail->Subject = $this->input->post('subject');

        /* Set email format to HTML */
        $mail->isHTML(true);

        /* Email body content */
        $mailContent = $this->input->post('message');
        $mail->Body = $mailContent;

        /* Send email */
        if (!$mail->send()) {
            $this->session->set_flashdata('error', 'Une erreur s\'est produite : ' . $mail->ErrorInfo);
        } else {
            $this->session->set_flashdata('success', 'Email envoyé avec succès.');
        }

        redirect('contact');
    }
}
