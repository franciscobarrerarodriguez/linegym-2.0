<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$this->load->view('linegym/header');
		$this->load->view('linegym/admin');
		$this->load->view('linegym/footer');
	}

	/*
	Revisa si el usuario esta o no logueado.
	*/
	public function isLoguedIn(){
		if(($this->session->userdata('EMAIL_PERSON') != NULL)){
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

	/*
	Carga la vista para crear un nuevo plan.
	*/
	public function view_new_plan()	{
		$this->load->view('linegym/header');
		$this->load->view('linegym/admin_views/new_plan');
		$this->load->view('linegym/footer');
	}

	/*
	Carga la vista para editar un plan.
	*/
	public function edit_plan($ID_PLAN)
	{
		$data['plan'] = $this->Plan_model->getPlanById($ID_PLAN, $this->session->ID_BOX);
		$this->load->view('linegym/header');
		$this->load->view('linegym/admin_views/edit_plan', $data);
		$this->load->view('linegym/footer');
	}

	/*
	Carga la vista para ver todos los planes.
	*/
	public function view_all_plans() {
		$this->load->view('linegym/header');
		$this->load->view('linegym/admin_views/all_plans');
		$this->load->view('linegym/footer');
	}

	/*
	Agrega un nuevo plan a la base de datos.
	*/
	public function newPlan() {
		$success = false;
		$data = array(
			'ID_BOX'       => $this->session->ID_BOX,
			'JOINING_PLAN' => date('Y-m-d'),
			'NAME_PLAN'    => $this->input->post('name'),
			'DAYS'         => $this->input->post('days'),
			'PRICE'        => $this->input->post('price'),
			'DETAILS'      => $this->input->post('details')
		);
		if($this->Plan_model->addPlan($data)){
			$success = true;
		}else{
			$success = false;
		}
		echo json_encode(array('STATUS' => $success));
	}

	/*
	Actualiza un plan en la base de datos y envia su respuesta a la vista.
	*/
	public function updatePlan($ID_PLAN)
	{
		$success = false;
		$data = array(
			'JOINING_PLAN' => date('Y-m-d'),
			'NAME_PLAN'    => $this->input->post('name'),
			'DAYS'         => $this->input->post('days'),
			'PRICE'        => $this->input->post('price'),
			'DETAILS'      => $this->input->post('details')
		);
		$where = array(
			'ID_PLAN' => $ID_PLAN,
			'ID_BOX'  => $this->session->ID_BOX
		);
		if ($this->Plan_model->updatePlan($data, $where)) {
			$success = true;
		}
		echo json_encode(array('STATUS' => $success));
	}

	/*
	Lista de planes ajax.
	*/
	public function ajaxPlan_list()
	{
		echo json_encode ($this->Plan_model->plansList($this->session->ID_BOX));
	}

	/*
	Retorna el estado de una peticion de borrado de un plan
	*/
	public function ajaxDelete_plan($ID_PLAN)
	{
		$success = false;
		if($this->Plan_model->deletePlan($ID_PLAN, $this->session->ID_BOX)){
			$success = true;
		}
		echo json_encode(array('STATUS' => $success));
	}

	/*
	Retorna un plan especifico en json_encode
	*/
	public function ajax_getPlanById($ID_PLAN)
	{
		echo json_encode($this->Plan_model->getPlanById($ID_PLAN, $this->session->ID_BOX));
	}

	/*
	Carga la vista para crear un nuevo cliente.
	*/
	public function view_new_client()	{
		$data['plans'] = $this->Plan_model->plansList($this->session->ID_BOX);
		$this->load->view('linegym/header');
		$this->load->view('linegym/admin_views/new_client', $data);
		$this->load->view('linegym/footer');
	}

	/*
	Agrega un nuevo cliente a la base de datos.
	*/
	public function newClient() {
		$success = false;
		$last_subscription = '';
		$person = array(
			'ID_BOX'           => $this->session->ID_BOX,
			'JOINING_PERSON'   => date('Y-m-d'),
			'NAME_PERSON'      => $this->input->post('name_person'),
			'GENDER_PERSON'    => $this->input->post('gender_person'),
			'BIRTHDATE_PERSON' => $this->input->post('birthdate_person'),
			'AGE_PERSON'       => $this->Person_model->age($this->input->post('birthdate_person')),
			'EMAIL_PERSON'     => $this->input->post('email_person'),
			'PHONE_PERSON'     => $this->input->post('phone_person'),
			'ADDRESS_PERSON'   => $this->input->post('address_person'),
			'IDENTIFICATION'   => $this->input->post('identification'),
			'PASSWORD_PERSON'  => md5($this->input->post('identification')),
			'STATUS_PERSON'    => 'ACT',
			'TYPE_PERSON'      => 'CLI',
			'PROFILE_PICTURE'  => 'profile.jpg'
		);
		if($this->Person_model->addPerson($person)){
			$lastPerson = $this->Person_model->getLastPerson($this->session->ID_BOX);
			$status = $this->Subscriptions_record_model->status($this->input->post('price'),$this->input->post('paid'));
			$subscription = array(
				'ID_PERSON'         => $lastPerson->ID_PERSON,
				'ID_PLAN'           => $this->input->post('plan'),
				'DATE_SUBSCRIPTION' => date('Y-m-d'),
				'PRICE'             => $this->input->post('price'),
				'PAID'              => $this->input->post('paid'),
				'STATUS'            => $status
			);
			if ($this->Subscriptions_record_model->addSubscription($subscription)) {
				$last_subscription = $this->Subscriptions_record_model->getLastSubscription($lastPerson->ID_PERSON);
				$success = true;
			}else{
				$success = false;
			}
		}else{
			$success = false;
		}
		echo json_encode(array('STATUS' => $success, 'ID_SUBSCRIPTION' => $last_subscription->ID_SUBSCRIPTION));
	}

	/*
	Carga la vista para ver una factura.
	*/
	public function view_invoice($ID_SUBSCRIPTION) {
		$box = $this->Box_model->getBoxById($this->session->ID_BOX);
		$subscription = $this->Subscriptions_record_model->getSubscriptionById($ID_SUBSCRIPTION);
		$client = $this->Person_model->getPersonById($subscription->ID_PERSON, $this->session->ID_BOX);
		$plan = $this->Plan_model->getPlanById($subscription->ID_PLAN, $this->session->ID_BOX);
		$data['subscription'] = $subscription;
		$data['client'] = $client;
		$data['plan'] = $plan;
		$data['box'] = $box;
		$this->load->view('linegym/header');
		$this->load->view('linegym/admin_views/invoice', $data);
		$this->load->view('linegym/footer');
	}

	/*
	Envia la factura por correo.
	*/
	public function sendInvoice($ID_SUBSCRIPTION)
	{

	}

	/*
	Carga la vista para ver todos los planes.
	*/
	public function view_all_clients() {
		$this->load->view('linegym/header');
		$this->load->view('linegym/admin_views/all_clients');
		$this->load->view('linegym/footer');
	}

	/*
	Lista de clientes activos ajax.
	*/
	public function ajaxActiveClient_list() {
		echo json_encode ($this->Person_model->clientList($this->session->ID_BOX));
	}

	/*
	Lista de clientes ajax.
	*/
	public function ajaxClient_list() {
		echo json_encode ($this->Person_model->clientList($this->session->ID_BOX));
	}

	/*
	Retorna el estado de una peticion de borrado de un cliente
	*/
	public function ajaxDelete_client($ID_PERSON) {
		$success = false;
		if ($this->Subscriptions_record_model->deleteSubscriptions($ID_PERSON)) {
			if($this->Person_model->deletePerson($ID_PERSON, $this->session->ID_BOX)){
				$success = true;
			}
		}
		echo json_encode(array('STATUS' => $success));
	}

	/*
	Carga la vista para editar un cliente.
	*/
	public function edit_client($ID_PERSON){
		$data['client'] = $this->Person_model->getPersonById($ID_PERSON, $this->session->ID_BOX);
		$this->load->view('linegym/header');
		$this->load->view('linegym/admin_views/edit_client', $data);
		$this->load->view('linegym/footer');
	}

	/*
	Actualiza un cliente en la base de datos y envia su respuesta a la vista.
	*/
	public function updateClient($ID_PERSON) {
		$success = false;
		$data = array(
			'NAME_PERSON'      => $this->input->post('name_person'),
			'GENDER_PERSON'    => $this->input->post('gender_person'),
			'BIRTHDATE_PERSON' => $this->input->post('birthdate_person'),
			'AGE_PERSON'       => $this->Person_model->age($this->input->post('birthdate_person')),
			'EMAIL_PERSON'     => $this->input->post('email_person'),
			'PHONE_PERSON'     => $this->input->post('phone_person'),
			'ADDRESS_PERSON'   => $this->input->post('address_person'),
			'IDENTIFICATION'   => $this->input->post('identification'),
			'PASSWORD_PERSON'  => md5($this->input->post('identification')),
			'STATUS_PERSON'    => 'ACT',
			'TYPE_PERSON'      => 'CLI',
			'PROFILE_PICTURE'  => 'profile.jpg'
		);
		$where = array(
			'ID_PERSON' => $ID_PERSON,
			'ID_BOX'    => $this->session->ID_BOX
		);
		if ($this->Person_model->updatePerson($data, $where)) {
			$success = true;
		}
		echo json_encode(array('STATUS' => $success));
	}

	/*
	Carga la vista para ver el historial de pagos de una persona
	*/
	public function record($ID_PERSON) {
		$client = $this->Person_model->getPersonById($ID_PERSON, $this->session->ID_BOX);
		$subscription = $this->Subscriptions_record_model->getLastSubscriptionByIdPerson($client->ID_PERSON);
		$plan = $this->Plan_model->getPlanById($subscription->ID_PLAN, $this->session->ID_BOX);
		if($this->Subscriptions_record_model->getSubscriptionsByIdPerson($client->ID_PERSON) != false){
			$data['subscriptions'] = $this->Subscriptions_record_model->getSubscriptionsByIdPerson($client->ID_PERSON);
		}
		$data['client'] = $client;
		$data['subscription'] = $subscription;
		$data['plan'] = $plan;
		$data['plans'] = $this->Plan_model->plansList($this->session->ID_BOX);
		$this->load->view('linegym/header');
		$this->load->view('linegym/admin_views/record', $data);
		$this->load->view('linegym/footer');
	}

	/*
	Respuesta a peticion ajax para retornar una suscripcion dependiendo su ID.
	*/
	public function ajax_getSubscription($ID_SUBSCRIPTION){
		echo json_encode($this->Subscriptions_record_model->getSubscriptionById($ID_SUBSCRIPTION));
	}

	/*
	Actualiza una suscripcion y retorna una respuesta ajax.
	*/
	public function ajaxUpdateSubscription($ID_SUBSCRIPTION){
		$success = false;
		$subscription = $this->Subscriptions_record_model->getSubscriptionById($ID_SUBSCRIPTION);
		$paid = $this->input->post('PAID') + $subscription->PAID;
		$status = $this->Subscriptions_record_model->status($subscription->PRICE, $paid);
		$data = array(
			'PAID'   => $paid,
			'STATUS' => $status
		);
		$where = array(
			'ID_SUBSCRIPTION' => $ID_SUBSCRIPTION,
			'ID_PERSON'  => $subscription->ID_PERSON
		);
		if ($this->Subscriptions_record_model->updateSubscription($data, $where)) {
			$success = true;
		}
		echo json_encode(array('STATUS' => $success));
	}

	/*
	Crea una nueva suscripcion para una persona.
	*/
	public function newSubscription($ID_PERSON){
		$success = false;
		$subscription = array(
			'ID_PERSON'         => $ID_PERSON,
			'ID_PLAN'           => $this->input->post('ID_PLAN'),
			'DATE_SUBSCRIPTION' => date('Y-m-d'),
			'PRICE'             => $this->input->post('PRICE'),
			'PAID'              => $this->input->post('PAID'),
			'STATUS'            => $this->Subscriptions_record_model->status($this->input->post('PRICE'),$this->input->post('PAID'))
		);
		if ($this->Subscriptions_record_model->addSubscription($subscription)) {
			$last_subscription = $this->Subscriptions_record_model->getLastSubscription($ID_PERSON);
			$success = true;
		}else{
			$success = false;
		}
		echo json_encode(array('STATUS' => $success, 'ID_SUBSCRIPTION' => $last_subscription->ID_SUBSCRIPTION));
	}

	/*
	Carga la vista para ingresar un nuevo coach.
	*/
	public function view_new_coach(){
		$this->load->view('linegym/header');
		$this->load->view('linegym/admin_views/new_coach');
		$this->load->view('linegym/footer');
	}

	/*
	Agrega un nuevo coach
	*/
	public function newCoach(){
		$success = false;
		$person = array(
			'ID_BOX'           => $this->session->ID_BOX,
			'JOINING_PERSON'   => date('Y-m-d'),
			'NAME_PERSON'      => $this->input->post('name_person'),
			'GENDER_PERSON'    => $this->input->post('gender_person'),
			'BIRTHDATE_PERSON' => $this->input->post('birthdate_person'),
			'AGE_PERSON'       => $this->Person_model->age($this->input->post('birthdate_person')),
			'EMAIL_PERSON'     => $this->input->post('email_person'),
			'PHONE_PERSON'     => $this->input->post('phone_person'),
			'ADDRESS_PERSON'   => $this->input->post('address_person'),
			'IDENTIFICATION'   => $this->input->post('identification'),
			'PASSWORD_PERSON'  => md5($this->input->post('identification')),
			'STATUS_PERSON'    => 'ACT',
			'TYPE_PERSON'      => 'COA',
			'PROFILE_PICTURE'  => 'profile.jpg'
		);
		if($this->Person_model->addPerson($person)){
			$success = true;
		}else{
			$success = false;
		}
		echo json_encode(array('STATUS' => $success));
	}

	/*
	Carga la vista de todos los coaches.
	*/
	public function view_all_coaches(){
		$this->load->view('linegym/header');
		$this->load->view('linegym/admin_views/all_coaches');
		$this->load->view('linegym/footer');
	}

	/*
	retorna la lista de todos los coaches.
	*/
	public function ajaxCoach_list(){
		echo json_encode ($this->Person_model->coachList($this->session->ID_BOX));
	}

	/*
	Borra un coach de la base de datos.
	*/
	public function ajaxDelete_coach($ID_PERSON){
		$success = false;
		if($this->Person_model->deletePerson($ID_PERSON, $this->session->ID_BOX)){
			$success = true;
		}
		echo json_encode(array('STATUS' => $success));
	}

	/*
	Carga la vista para editar un coach.
	*/
	public function edit_coach($ID_PERSON){
		$data['coach'] = $this->Person_model->getPersonById($ID_PERSON, $this->session->ID_BOX);
		$this->load->view('linegym/header');
		$this->load->view('linegym/admin_views/edit_coach', $data);
		$this->load->view('linegym/footer');
	}

}
