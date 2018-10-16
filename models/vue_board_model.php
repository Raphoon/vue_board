<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vue_board_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  public function gets() {
    return $this->db->query("SELECT * FROM vue_board.board_posts")->result_array();
  }

}
