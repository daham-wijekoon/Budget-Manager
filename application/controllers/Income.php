<?php

class Income extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model('Model_user');
        }
	public function index(){
                $data['chartDonut']=$this->Model_user->getIncomeCategory();
		$this->load->view('income',$data);
	}

	public function insertIncome(){
		$this->form_validation->set_rules('amount', 'Amount', 'required');
		$this->form_validation->set_rules('income', 'Category', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
                
               

		if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('Income');
                }
                else
                { 
                        $this->load->model('Model_user');
                        $response=$this->Model_user->insertIncomeData();

                        if ($response) {
                        	$this->session->set_flashdata('msg','New Income Entered!');
                        	redirect('Income/index');
                        }else{
                                $this->session->set_flashdata('msg','Something went wrong!');
                                redirect('Income/index');
                        }
                }
	}

	
}