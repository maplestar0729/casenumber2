<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class head extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('logbook/logbook_head_model');
        $this->load->model('error_model');
    }

    public function index($set_type = ""){
		$data["set_type"] = $set_type;
		if($set_type == "")
		{
			$data["set_type"] = "W";
		}
      
  		$this->logbook_template("logbook/head/index",$data);
    }

	public function edit_head(){
		$post_data = $this->input->post(null,true);
		$post_data["t_update_date"] = date ("Y-m-d H:i:s"); 
		$post_data["t_update_id"] = $this->session->userdata('case_number')["user_id"];
		if($post_data["uid"] == 0)
		{
			unset($post_data["uid"]);
			$post_data["t_create_id"] = $this->session->userdata('case_number')["user_id"];
			//$post_data["type"] = "A";
			$rtn = $this->logbook_head_model->creat_head($post_data);
			redirect(base_url('logbook_head/index/'.$post_data["type"]));
		}else{
			$rtn = $this->logbook_head_model->update_head($post_data);
			echo json_encode($rtn);
		}
	}
	
	public function get_head_list($set_type){
		$search_data["type"] = $set_type;
		if($set_type == "")
		{
			$search_data["type"] = "W";
		}
		$rtn = $this->logbook_head_model->get_head_list($search_data);
		echo json_encode($rtn);
	}

	public function delete_head(){
		
	}
}
?>
