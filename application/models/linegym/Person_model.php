<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Person_model extends CI_Model {

  var $table;

  public function __construct() {
    parent::__construct();
    $this->table = 'PERSONS';
  }

  /*
  Metodo para realizar el ingreso de un usuario en caso de ser correcto retorna
  la informacion seleccionada, en caso de no encontrar al usuario en la base de
  datos retorna false, el estado del usuario debe ser activo (ACT).
  */
  public function login($email, $password) {
    $this->db->where('STATUS_PERSON', 'ACT');
    $this->db->where('EMAIL_PERSON', $email);
    $this->db->where('PASSWORD_PERSON', $password);
    $query = $this->db->get($this->table);
    if ($query->num_rows() > 0) {
      return $query->result();
    }else{
      return false;
    }
  }

  /*
  Guarda una persona en la base de datos.
  */
  public function addPerson($data) {
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
    if ($this->db->affected_rows() > 0) {
      return true;
    }else{
      return false;
    }
  }

  /*
  Borra una persona de la base de datos en base su id en la base de datos, retorna verdadero si la
  persona fue borrada con exito y falso si no se borra.
  */
  public function deletePerson($id_person, $id_box) {
    $this->db->where('ID_PERSON', $id_person);
    // $this->db->where('ID_BOX', $id_box);
    $this->db->delete($this->table);
    if ($this->db->affected_rows() > 0) {
      return true;
    }else{
      return false;
    }
  }

  /*
  Actualiza una persona en la base de datos teniendo en cuenta su ID.
  */
  public function updatePerson($data, $where) {
    $this->db->update($this->table, $data, $where);
    if ($this->db->affected_rows() > 0) {
      return true;
    }else{
      return false;
    }
  }

  /*
  Retorna la ultima persona registrada en el box.
  */
  public function getLastPerson($id_box) {
    $this->db->select_max('ID_PERSON');
    $this->db->where('ID_BOX', $id_box);
    $query = $this->db->get($this->table);
    return $query->row();
  }

  /*
  Obtiene los datos de una persona por medio de su ID en la base de datos.
  */
  public function getPersonById($id_person, $id_box) {
    $this->db->where('ID_PERSON', $id_person);
    $this->db->where('ID_BOX', $id_box);
    $query = $this->db->get($this->table);
    return $query->row();
  }

  /*
  Retorna todas las personas que son clientes de un box especifico,
  identificandolo por su ID.
  */
  public function clientList($id_box){
    $this->db->where('ID_BOX', $id_box);
    $this->db->where('TYPE_PERSON', 'CLI');
    $query = $this->db->get($this->table);
    if ($query->num_rows() > 0) {
      return $query->result();
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
