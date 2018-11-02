<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vue_board extends CI_Controller{

  public function __construct()
  {
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    parent::__construct();
    $this->load->helper(array('url','date'));
    $this->load->model('vue_board_model');
    $this->load->library('form_validation');

  }

  function index($nums) {
    $listCount = $this->vue_board_model->lists($nums)['listCount'];
    $this->load->view('vue_board_header');
    $this->load->view('vue_board_middle',array('listCount'=>$listCount));
    $this->load->view('vue_board_bottom');
  }

  function index_data($nums) {
    $result=$this->vue_board_model->lists($nums)['lists'];
    $this->output->set_content_type('application/json')->set_output(json_encode($result));
  }

  function get($id) {
    $res=$this->vue_board_model->get($id);
    $this->output->set_content_type('application/json')->set_output(json_encode($res));
  }

  function add() {
    var_dump($this->input->post());
    $this->form_validation->set_rules('title', '제목', 'required');
    $this->form_validation->set_rules('creator', '작성자', 'required');
    $this->form_validation->set_rules('board_list', '게시판 번호', 'required');
    $this->form_validation->set_rules('contents', '내용', 'required');
    $this->form_validation->set_rules('passwd', '비밀번호', 'required|exact_length[4]');
    $this->form_validation->set_rules('passconf', '비밀번호확인', 'required|alpha_numeric|matches[passwd]');

    if ($this->form_validation->run()==FALSE) {
      $this->output->set_content_type('application/json')->set_output(json_encode('fails'));
    }
    else {
      $this->vue_board_model->add($this->input->post('title'),$this->input->post('creator'),$this->input->post('contents'),$this->input->post('passwd'),$this->input->post('board_list'));
      $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
  }
}
