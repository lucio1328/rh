<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('user/login');
	}

	public function creation_compte()
	{
		$this->load->view('user/registration');
	}
}
