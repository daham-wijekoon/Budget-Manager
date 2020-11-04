<?php

class Admin extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Model_user');
	}

	public function index(){
		$data['chartBar']=$this->Model_user->getYear();
		$this->load->view('Admin/dashboard',$data);
	}

}