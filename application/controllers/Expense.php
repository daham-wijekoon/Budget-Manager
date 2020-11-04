<?php

class Expense extends CI_Controller{
	public function __construct(){
                parent::__construct();
                $this->load->model('Model_user');
        }
        public function index(){
                $data['chartDonut']=$this->Model_user->getExpenseCategory();
                $this->load->view('expense',$data);
        }

	public function insertExpense(){
		$this->form_validation->set_rules('amount', 'Amount', 'required');
		$this->form_validation->set_rules('expense', 'Category', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('year', 'Year', 'required');
		$this->form_validation->set_rules('month', 'Month', 'required');



		if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('Expense');
                }
                else
                { 
                        $this->load->model('Model_user');
                        $response=$this->Model_user->insertExpenseData();

                        if ($response) {
                        	$this->session->set_flashdata('msg','New Expense Entered!');
                        	redirect('Expense/index');
                        }else{
                                $this->session->set_flashdata('msg','Something went wrong!');
                                redirect('Expense/index');
                        }
                }
	}

	
}