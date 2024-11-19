<?php
/**
 * @property CI_Loader $load
 * @property CI_Session $session
 */
class authentification extends CI_Model{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function register_user(){
        $password=$this->input->post('password');
        $con_password=$this->input->post('con_password');

       $data=array(
        "name"=>$this->input->post('name'),
        "email"=>$this->input->post('email'),
        "password"=>$password
       ); 

       if ($password != $con_password) {
        $this->session->set_flashdata('wrong','The password does not match the following');
        redirect('Auth/register');
       }else {
            $data=array(
                "nom"=>$this->input->post('name'),
                "email"=>$this->input->post('email'),
                "password"=>$password
            ); 
            $this->db->insert('users',$data);
            $this->session->set_flashdata('successfull','You have been registered, now login');
            redirect('Auth/');
       }
    }

    public function login_user(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $query = $this->db->get('users');
        $find_user=$query->num_rows($query);

        if ($find_user > 0) {
            $this->session->set_flashdata('successfull','You are logged');
            $data['content'] = $this->load->view('Users/home', NULL, TRUE);
            $this->load->view('welcome_message', $data);

        }else {
            $this->session->set_flashdata('warning','Incorrect authentification');
            redirect('Auth/');
        }
    }
}

?>