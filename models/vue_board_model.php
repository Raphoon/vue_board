<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vue_board_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  public function lists($nums) {
    $num=14;
    $from=0;
    $lists=$this->db->query("SELECT * FROM vue_board.board_posts WHERE board_list=$nums ORDER BY board_id;")->result_array();
    $listCounts=$this->db->query("SELECT COUNT(*) FROM vue_board.board_posts")->row_array();
    $listCount = $listCounts['COUNT(*)'];
    return array('lists'=>$lists,'listCount'=>$listCount);
  }

  function add($title,$creator,$contents,$passwd,$board_list) {
    return $this->db->insert('vue_board.board_posts',array(
      'title'=>$title,
      'creator'=>$creator,
      'contents'=>$contents,
      'passwd'=>$passwd,
      'board_list'=>$board_list
    ));
  }

  function get($id) {
    return $this->db->query("SELECT * FROM vue_board.board_posts WHERE board_id='$id';")->result_array();
  }
}
?>
