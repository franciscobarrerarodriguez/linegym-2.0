<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscriptions_record_model extends CI_Model {

  var $table;

  public function __construct() {
    parent::__construct();
    $this->table = 'SUBSCRIPTIONS_RECORD';
  }

  /*
  Retorna la ultima suscripcion registrada en el box.
  */
  public function getLastSubscription($id_person) {
    $this->db->select_max('ID_SUBSCRIPTION');
    $this->db->where('ID_PERSON', $id_person);
    $query = $this->db->get($this->table);
    return $query->row();
  }

  /*
  Retorna el estado de una suscripcion.
  */
  public function status($price, $paid) {
    if(($price - $paid) > 0){
      return 'PEN';
    }else{
      return 'CLO';
    }
  }

/*
Guarda una registro de pago en la base de datos.
*/
public function addSubscription($data) {
  $this->db->insert($this->table, $data);
  return $this->db->insert_id();
  if ($this->db->affected_rows() > 0) {
    return true;
  }else{
    return false;
  }
}

/*
Obtiene los datos de una suscipcionn por medio de su ID en la base de datos.
*/
public function getSubscriptionById($id_subscription) {
  $this->db->where('ID_SUBSCRIPTION', $id_subscription);
  $query = $this->db->get($this->table);
  return $query->row();
}

/*
Obtiene los datos de una suscipcionn por medio de su ID_PERSON en la base de datos.
*/
public function getLastSubscriptionByIdPerson($id_person) {
  $this->db->select_max('ID_SUBSCRIPTION');
  $this->db->where('ID_PERSON', $id_person);
  $result = $this->db->get($this->table);
  $result = $result->row();
  $this->db->where('ID_SUBSCRIPTION', $result->ID_SUBSCRIPTION);
  $query = $this->db->get($this->table);
  return $query->row();
}

/*
Retorna todas las suscripciones de una persona ordenada por fecha descendiente.
*/
public function getSubscriptionsByIdPerson($id_person){
  $this->db->where('ID_PERSON', $id_person);
  $this->db->order_by("DATE_SUBSCRIPTION","DESC");
  $query = $this->db->get($this->table);
  if ($query->num_rows() > 0) {
    return $query->result();
  }else{
    return false;
  }
}

/*
Borra todas las suscripciones de una persona.
*/
public function deleteSubscriptions($id_person) {
  $this->db->where('ID_PERSON', $id_person);
  $this->db->delete($this->table);
  if ($this->db->affected_rows() > 0) {
    return true;
  }else{
    return false;
  }
}

/*
Actualiza una suscripcion en la base de datos teniendo en cuenta su ID.
*/
public function updateSubscription($data, $where) {
  $this->db->update($this->table, $data, $where);
  if ($this->db->affected_rows() > 0) {
    return true;
  }else{
    return false;
  }
}

/*
Retorna todas las personas que son Administradores.
*/
public function adminList(){
  $this->db->where('TIPO_PERSONA', 'ADM');
  $query = $this->db->get('PERSONAS');
  if ($query->num_rows() > 0) {
    return $query->result();
  }else{
    return false;
  }
}

/*
Retorna todas las personas que son clientes de un box especifico,
identificandolo por su ID.
*/
public function clientsList($id_box){
  $this->db->where('ID_BOX', $id_box);
  $this->db->where('TIPO_PERSONA', 'CLI');
  $query = $this->db->get('PERSONAS');
  if ($query->num_rows() > 0) {
    return $query->result();
  }else{
    return false;
  }
}

/*
Retorna todas las personas que son coaches de un box especifico,
identificandolo por su ID.
*/
public function coachesList($id_box){
  $this->db->where('ID_BOX', $id_box);
  $this->db->where('TIPO_PERSONA', 'COA');
  $query = $this->db->get('PERSONAS');
  if ($query->num_rows() > 0) {
    return $query->result();
  }else{
    return false;
  }
}

/*
Calcula la edad de una persona dependiendo de su fecha de nacimiento.
*/
public function age($date){
  $date = str_replace("/","-",$date);
  $date = date('Y/m/d',strtotime($date));
  $today = date('Y/m/d');
  $age = $today - $date;
  return $age;
}

}
