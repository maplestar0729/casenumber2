<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Phone_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Taipei');
	}

	public function template($page_name, $data=[])
	{
		if($this->session->userdata('case_number')["logged_in"])
		{
			$data['user_name']=$this->session->userdata('case_number')["user_name"];
			$data['user_class']=$this->session->userdata('case_number')["class"];
			$data['leftmenu'] = $this->load->view('phoneBook/templates/leftmenu', $data, TRUE);
			$data['top'] = $this->load->view('templates/top', $data, TRUE);
			$data['body'] = $this->load->view("phoneBook/".$page_name.".view.php", $data, TRUE);
			$this->load->view('phoneBook/templates/layout', $data);}
		else
		{
			redirect(base_url('login'));
		}
	}
	







}