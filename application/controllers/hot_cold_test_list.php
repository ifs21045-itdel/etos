<?php

class hot_cold_test_list extends CI_Controller{
    
    public function __construct() {
        parent :: __construct();
        $this->load->model('model_hot_cold_test_list');
    }
     function index() {
        $data['action'] = explode('|', $this->model_user->get_action($this->session->userdata('id'), 42));
        $this->load->view('hot_cold_test_list/index', $data);
    }
    function get($flag = "") {
        echo $this->model_hot_cold_test_list->get($flag);
    }

    function input() {
        $this->load->view('hot_cold_test_list/input');
    }
}