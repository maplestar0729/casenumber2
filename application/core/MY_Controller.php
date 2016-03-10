<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	
	//顯示template
	public function template($page_name, $data=[])
	{		
		//登入的session
/*		if($this->session->userdata('logged_in'))
			$data['logged_in']=$this->session->userdata('logged_in');		
		//訊息session	
		if($this->session->userdata('msg'))
			$data['msg']=$this->session->userdata('msg');				
		$this->session->set_userdata('current_url',current_url());	
		
		if($this->session->userdata('logged_in'))
		{*/
			// 已登入
//			$data['logged_in'] = $this->session->userdata('logged_in');
//			$data['top'] = $this->load->view('templates/top', $data, TRUE);	
			$data['leftmenu'] = $this->load->view('templates/leftmenu', $data, TRUE);
			$data['body'] = $this->load->view($page_name, $data, TRUE);
			$this->load->view('templates/layout', $data);	
/*		}
		else
		{
			redirect(base_url('login'));
		}
	*/		
		
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

	
	//清空資料夾
	public function clean_mytmp()
	{
		$user_id = $this->session->userdata('logged_in')['id'];
		$this->rrmdir(ROOT.'/public/photos/tmp/'.$user_id);
	}


	
}