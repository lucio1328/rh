<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function upload_files($user_id, $id_offre, $file_type)
    {
        $this->load->library('upload');

        $config['upload_path']   = './application/uploads/' . $id_offre;
        $config['allowed_types'] = 'pdf|doc|docx|jpg|png';  
        $config['max_size']      = 2048;
        $config['file_name']     = "{$id_offre}-{$user_id}-{$file_type}--" . time();

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
        }

        $this->upload->initialize($config);

        if ($this->upload->do_upload($file_type)) {
            return $this->upload->data('file_name'); 
        } else {
            return ['error' => $this->upload->display_errors()]; 
        }
    }
}
