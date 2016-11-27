<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Box_model extends CI_Model {

  var $table;

  public function __construct() {
    parent::__construct();
    $this->table = 'BOXES';
  }

  /*
  Obtiene los datos de una BOX por medio de su ID en la base de datos.
  */
  public function getBoxById($id_box) {
    $this->db->where('ID_BOX', $id_box);
    $query = $this->db->get($this->table);
    return $query->row();
  }
}
