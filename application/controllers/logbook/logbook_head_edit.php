<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logbook_head_edit extends MY_Controller{

    public function __construct(){
        parent::__construct();
    		$this->load->model('logbook_model');
    		$this->load->model('login_model');
        $this->load->model('case_table_model');
        $this->load->model('member_model');
        $this->load->model('error_model');
    }

    public function index(){

      
  		$this->logbook_template("logbook/logbook_head/index",$data);
    }

	public function edit_head(){
		$post_data = $this->input->post(null,true);
		$post_data["t_update_date"] = date ("Y- m - d / H : i : s"); 
		$post_data["t_update_id"] = $session_data["case_number"]["user_id"];
		if($post_data["uid"] == 0)
		{
			unset($post_data["uid"]);
			$post_data["t_create_id"] = $session_data["case_number"]["user_id"];
			$post_data["state"] = "A";
		}
	}
	
	public function delete_head(){
		
	}
}
?>
