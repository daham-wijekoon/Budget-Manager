<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Model_user');
	}


	function index(){
		//$data['year_list']=$this->Model_user->fetch_year();
		$data['chartBar']=$this->Model_user->getIncome2();
		$this->load->view('reports',$data);
	}

	function fetch_data(){
		if ($this->input->post('year')) {
			$chart_data=$this->Model_user->fetch_chart_data($this->input->post('year'));

			foreach ($chart_data->result_array() as $row) {
				$output[] = array(
					'month' => $row["month"],
					'amount' => floatval($row["amount"]) 
				);
			}
			echo json_encode($chart_data);
		}
	}


}