<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan_model extends CI_Model {

  var $table;

  public function __construct() {
    parent::__construct();
    $this->table = 'PLANS';
  }

  /*
  Retorna todos los planes del box.
  */
  public function plansList($id_box){
    $this->db->where('ID_BOX', $id_box);
    $query = $this->db->get($this->table);
    if ($query->num_rows() > 0) {
      return $query->result();
    }else{
      return false;
    }
  }

  /*
  Guarda una plan en la base de datos.
  */
  public function addPlan($data) {
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
    if ($this->db->affected_rows() > 0) {
      return true;
    }else{
      return false;
    }
  }

  /*
  Borra un plan de la base de datos.
  */
  public function deletePlan($id_plan, $id_box) {
    $this->db->where('ID_PLAN', $id_plan);
    $this->db->where('ID_BOX', $id_box);
    $this->db->delete($this->table);
    if ($this->db->affected_rows() > 0) {
      return true;
    }else{
      return false;
    }
  }

  /*
  Obtiene los datos de un plan.
  */
  public function getPlanById($id_plan, $id_box) {
    $this->db->where('ID_PLAN', $id_plan);
    $this->db->where('ID_BOX', $id_box);
    $query = $this->db->get($this->table);
    return $query->row();
  }

  /*
  Actualiza un plan en la base de datos.
  */
  public function updatePlan($data, $where) {
    $this->db->update($this->table, $data, $where);
    if ($this->db->affected_rows() > 0) {
      return true;
    }else{
      return false;
    }
  }
}
