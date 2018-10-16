<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vue_board extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //캐쉬 삭제를 위한 추가항목
    $this-> output-> set_header('Last-Modified:'.gmdate("D, d M Y H:i:s").'GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    $this-> output-> set_header('Pragma: no-cache');
    $this-> output-> set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");//
  }

  function index() {
    $data= $this-> vue_board_model-> gets();
    $this-> load-> model('vue_board_model');
    $this-> load-> view('vue_board_aa',array('data'=> $data));
  }
  function get() {

  }

}
