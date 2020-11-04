<?php

class Model_user extends CI_Model{
	function insertUserData(){
		$udata=array(
			'fname'=>$this->input->post('fname',TRUE),
			'lname'=>$this->input->post('lname',TRUE),
			'email'=>$this->input->post('email',TRUE),
			'password'=>$this->input->post('pword',TRUE)
		);

		return $this->db->insert('users',$udata);
		
	}

	function getUserData(){
		$email=$this->input->post('email');
		$password=$this->input->post('pword');

		$this->db->where('email',$email);
		$this->db->where('password',$password);

		$respond=$this->db->get('users');
		if ($respond->num_rows()==1) {
			return $respond->row(0);
			
		}else{
			return false;
		}
	}

	function insertCategory(){
		$cdata=array(
			'name'=>$this->input->post('category',TRUE)
			
		);

		return $this->db->insert('category',$cdata);
		
	}

	function insertIncomeData(){
		$idata=array(
			'amount'=>$this->input->post('amount',TRUE),
			'category'=>$this->input->post('income',TRUE),
			'description'=>$this->input->post('description',TRUE),
			'year'=>$this->input->post('year',TRUE),
			'month'=>$this->input->post('month',TRUE)
		);

		return $this->db->insert('income',$idata);
		
	}

	function insertExpenseData(){
		$edata=array(
			'amount'=>$this->input->post('amount',TRUE),
			'category'=>$this->input->post('expense',TRUE),
			'description'=>$this->input->post('description',TRUE),
			'year'=>$this->input->post('year',TRUE),
			'month'=>$this->input->post('month',TRUE)
		);

		return $this->db->insert('expense',$edata);
		
	}

	function viewCategory(){
		$query=$this->db->get('category');
		return $query;
	}

	function fetch_year(){
		$this->db->select('year');
		$this->db->from('expense');
		$this->db->group_by('year');
		$this->db->order_by('year','DESC');
		return $this->db->get();
	}

	function fetch_chart_data($year){
		//$this->db->select('amount');
		// $this->db->from('expense');
		$this->db->where('year',$year);
		$this->db->order_by('year','ASC');
		return $this->db->get('expense');
	}

	public function getYear(){
		return $this->db->query('SELECT expense.year, SUM(expense.amount) as expense,(SELECT SUM(income.amount) FROM income WHERE expense.year=income.year GROUP BY income.year) as income FROM expense GROUP BY expense.year')->result_array();
	}

	public function getIncomeCategory(){
		return $this->db->query('SELECT SUM(amount) as income,category FROM income WHERE year=2020 GROUP by category')->result_array();
	}
	public function getExpenseCategory(){
		return $this->db->query('SELECT SUM(amount) as expense,category FROM expense WHERE year=2020 GROUP by category')->result_array();
	}
	// public function getIncome(){
	// 	return $this->db->query('SELECT income.month,SUM(income.amount)as income,SUM(expense.amount)as expense FROM income,expense WHERE income.year=2020 AND expense.year=2020 GROUP by month ORDER by month')->result_array();
	// }
	public function getIncome2(){
		return $this->db->query('SELECT expense.month, SUM(expense.amount) as expense,(SELECT SUM(income.amount) FROM income WHERE income.year=2020 AND income.month = expense.month GROUP BY income.month) as income FROM expense WHERE expense.year=2020 GROUP BY expense.month ORDER by FIELD(expense.month,"JAN","FEB","MAR","APR","MAY","JUN","JUL","AUG","SEP","OCT","NOV","DEC")')->result_array();
	}

	public function income_expense(){
		return $this->db->query('SELECT income.year,SUM(income.amount) as income,SUM(expense.amount) as expense FROM income,expense WHERE income.year=expense.year GROUP by income.year ORDER by income.year')->result_array();
	}
}