<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vue_board_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  public function lists() {
    $num = 15;
    $from= 0;
    $lists=$this->db->query("SELECT * FROM vue_board.board_posts ORDER BY board_id DESC LIMIT $from,$num;")->result_array();
    $listCounts=$this->db->query("SELECT COUNT(*) FROM vue_board.board_posts")->row_array();
    $listCount = $listCounts['COUNT(*)'];
    return array('lists'=>$lists,'listCount'=>$listCount);
  }

  function add($title,$creator,$contents,$passwd) {
    return $this->db->insert('vue_board.board_posts',array(
      'title'=>$title,
      'creator'=>$creator,
      'contents'=>$contents,
      'passwd'=>$passwd,
    ));
  }

}
?>
