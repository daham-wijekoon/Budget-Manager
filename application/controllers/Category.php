<?php

class Category extends CI_Controller{
	public function index(){
                $this->load->model('Model_user');
                $data['viewCategory']=$this->Model_user->viewCategory();
		$this->load->view('category',$data);
	}

	public function insertCat(){
		$this->form_validation->set_rules('category', 'Category', 'required');

		if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('Category');
                }
                else
                { 
                        $this->load->model('Model_user');
                        $response=$this->Model_user->insertCategory();

                        if ($response) {
                        	
                        	redirect('Category/index');
                        }else{
                                $this->session->set_flashdata('msg','Something went wrong!');
                                redirect('Category/index');
                        }
                }
	}

	
}