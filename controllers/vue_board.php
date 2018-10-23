<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vue_board extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('url','date'));
    $this->load->model('vue_board_model');
    $this->load->library('form_validation');
  }

  function index() {
    $listCount = $this->vue_board_model->lists()['listCount'];
    $this->load->view('vue_board_aa',array('listCount'=>$listCount));
  }
  function index_data() {
    $result = $this-> vue_board_model->lists()['lists'];
    $this->output->set_content_type('application/json')->set_output(json_encode($result));
  }
  function get() {

  }

  function add() {
    $this->form_validation->set_rules('title', '제목', 'required');
    $this->form_validation->set_rules('creator', '작성자', 'required');
    $this->form_validation->set_rules('contents', '내용', 'required');
    $this->form_validation->set_rules('passwd', '비밀번호', 'required|exact_length[4]');
    $this->form_validation->set_rules('passconf', '비밀번호확인', 'required|alpha_numeric|matches[passwd]');

    if ($this->form_validation->run()==FALSE) {
      $this->output->set_content_type('application/json')->set_output(json_encode('fail'));
    }
    else {
      $this->vue_board_model->add($this->input->post('title'),$this->input->post('creator'),$this->input->post('contents'),$this->input->post('passwd'));
      $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
  }
}
