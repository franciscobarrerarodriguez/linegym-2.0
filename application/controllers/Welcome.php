<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
			if($this->isLoggedIn() != true){
				$this->load->view('welcome');
			}else{
				$this->redirecting($this->session->userdata('TYPE_PERSON'));
			}
	}

	public function isLoggedIn()
	{
		if ($this->session->userdata('EMAIL_PERSON') != NULL) {
			return true;
		}else{
			return false;
		}
	}

	/*
  Termina la sesion activa del Admin y lo redirige a la pagina principal.
  */
  public function logout()
  {
    $this->session->sess_destroy();
    redirect('welcome');
  }
}
