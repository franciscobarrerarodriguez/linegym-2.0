<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		//	$this->load->view('linegym/header');
			$this->load->view('linegym/login');
			//$this->load->view('linegym/footer');
	}

	/*
	Metodo para autenticacion de usuarios, en caso de ser incorrecto sera redirigido a la
	vista principal.
	*/
	public function start()
	{
		$login = $this->Person_model->login($this->input->post('email'), md5($this->input->post('password')));
		$status = '';
		$type = '';
		if ($login) {
			$this->session->set_userdata('ID_PERSON', $login[0]->ID_PERSON);
			$this->session->set_userdata('ID_BOX', $login[0]->ID_BOX);
			$this->session->set_userdata('NAME_PERSON', ucwords(strtolower ($login[0]->NAME_PERSON)));
			$this->session->set_userdata('EMAIL_PERSON', $this->input->post('email'));
			$this->session->set_userdata('PHONE_PERSON', $login[0]->PHONE_PERSON);
			$this->session->set_userdata('ADDRESS_PERSON', $login[0]->ADDRESS_PERSON);
			$this->session->set_userdata('TYPE_PERSON', $login[0]->TYPE_PERSON);
			$this->session->set_userdata('PROFILE_PICTURE', $login[0]->PROFILE_PICTURE);
			$status = true;
			$type = $login[0]->TYPE_PERSON;
		}else {
			$status = false;
		}
		echo json_encode(array('STATUS' => $status, 'TYPE' => $type));
	}
}
