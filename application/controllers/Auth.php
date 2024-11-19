<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property CI_Loader $load
 * @property CI_Session $session
 * @property authentification $authentification
 */
class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('Auth/login');
	}
	
	public function welcome() {
		$this->load->view('welcom_message');
	}
	
	public function register(){
		$this->load->view('Auth/register');
	}

	public function registration_form(){
		$this->load->model('authentification');
		$this->authentification->register_user();
	}

	public function login_form(){
		$this->load->model('authentification');
		$this->authentification->login_user();
	}

	public function main(){
		$data['error'] = null;
		$data['content'] = $this->load->view('Users/home', NULL, TRUE);
		$this->load->view('welcome_message', $data);
	}
}
