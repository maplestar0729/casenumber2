<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function caseindex_template($page_name, $data=[])
	{
		$data['leftmenu'] = $this->load->view('caseindex/templates/leftmenu', $data, TRUE);
		$data['body'] = $this->load->view("caseindex/".$page_name, $data, TRUE);
		$this->load->view('caseindex/templates/layout', $data);
	}
	//顯示template
	public function logbook_template($page_name, $data=[])
	{
		//登入的session
		if($this->session->userdata('case_number')["logged_in"])
		{
			$data['user_name']=$this->session->userdata('case_number')["user_name"];
			$data['user_class']=$this->session->userdata('case_number')["class"];

			//echo json_encode($this->session->userdata('case_number'));
			$data['leftmenu'] = $this->load->view('logbook/template/leftmenu', $data, TRUE);
			$data['top'] = $this->load->view('logbook/template/top', $data, TRUE);
			$data['body'] = $this->load->view($page_name, $data, TRUE);
			$this->load->view('logbook/template/layout', $data);
		}
		else
		{
			redirect(base_url('login'));
		}


	}


	//取得使用者IP
	public function get_ip(){
        static $realIP;
        if($realIP) return $realIP;
        //代理時
        $ip = getenv('HTTP_CLIENT_IP')?  getenv('HTTP_CLIENT_IP'):getenv('HTTP_X_FORWARDED_FOR');
        preg_match("/[\d\.]{7,15}/", $ip, $match);
        if(isset($match[0])) return $realIP = $match[0];
        //非代理時
        $ip = !empty($_SERVER['REMOTE_ADDR'])? $_SERVER['REMOTE_ADDR']:'0.0.0.0';
        preg_match("/[\d\.]{7,15}/", $ip, $match);
        return $realIP = isset($match[0])? $match[0]:'0.0.0.0';
    }





	//遞迴刪除整個資料夾
	public function rrmdir($dir) {
		if (is_dir($dir)) {
		 $objects = scandir($dir);
		 foreach ($objects as $object) {
		   if ($object != "." && $object != "..") {
			 if (filetype($dir."/".$object) == "dir") $this->rrmdir($dir."/".$object); else unlink($dir."/".$object);
		   }
		 }
		 reset($objects);
		 rmdir($dir);
		}
	}





}
