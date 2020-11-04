<?php

class Register extends CI_Controller{
	public function registerUser(){
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('pword', 'Password', 'required');
		$this->form_validation->set_rules('cword', 'Confirm Password', 'required|matches[pword]');

		if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('Register');
                }
                else
                { 
                        $this->load->model('Model_user');
                        $response=$this->Model_user->insertUserData();

                        if ($response) {
                        	$this->session->set_flashdata('msg','Registered successfully!');
                        	redirect('Welcome/register');
                        }else{
                                $this->session->set_flashdata('msg','Something went wrong!');
                                redirect('Welcome/register');
                        }
                }
	}
}
