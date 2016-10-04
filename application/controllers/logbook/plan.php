<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class plan extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('logbook/logbook_plan_model');
		$this->load->model('logbook/logbook_model');
		$this->load->model('login_model');
        $this->load->model('case_table_model');
        $this->load->model('member_model');
        $this->load->model('error_model');
    }

    public function index($set_type = ""){
	  
      $uid = $this->session->userdata('case_number')["user_id"];
      $userdata = $this->login_model->get_user_uid($uid);
      $search_data["en"] = $userdata[0]["member"];
      $data["log_member"] = $userdata[0]["member"];
      $get_data = $this->input->get(null,true);
      $data["tab_search_str"] = "?start_date=".$get_data["start_date"]."&end_date=".$get_data["end_date"];
      
      if($get_data["start_date"]){
        $data["start_date"] = $get_data["start_date"];
      }else{
        $data["start_date"] = (date("Y", strtotime("-10 days")) - 1911 )."/".date("m/d", strtotime("-10 days"));
      } 
      if($get_data["end_date"]){
        $data["end_date"] = $get_data["end_date"];
      }else {
        $data["end_date"] =  (date("Y") - 1911 )."/".date("m/d");
      }
      $log_data = $this->logbook_model->get_prev_log($search_data);


      if($this->session->userdata('case_number')["class"] != 3 )
      {
        $data["tab_search_str"] = $data["tab_search_str"]."&en=".$get_data["en"];
      }
      $data["member"] = $this->member_model->get_member();
      if(isset($log_data[0]["caseno"]))
      {
          $data["prev_caseno"] = $log_data[0]["caseno"];
          $data["prev_caseno_name"] = $log_data[0]["name"];
          $data["prev_caseno_state"] = $log_data[0]["type"];
      }else
      {
          $data["prev_caseno"] = "";
          $data["prev_caseno_name"] = "";
          $data["prev_caseno_state"] = "";
      }
		 $this->logbook_template("logbook/plan/index",$data);

    }
  public function planend(){
    
      $get_data = $this->input->get(null,true);
      $data["tab_search_str"] = "?start_date=".$get_data["start_date"]."&end_date=".$get_data["end_date"];
      


      if($this->session->userdata('case_number')["class"] != 3 )
      {
        $data["tab_search_str"] = $data["tab_search_str"]."?en=".$get_data["en"];
      }
    $this->logbook_template("logbook/plan/planend",$data);
  }
	public function get_plan_list(){
		$get_data = $this->input->get(null,true);

      if($this->session->userdata('case_number')["class"] != 3 )
      {
        $search_data = "";
        if($get_data["en"] != "all" && $get_data["en"] != "")
          $search_data["member"] = $get_data["en"];
        if($get_data["start_date"])
        {
          $search_data["start_date"] = $get_data["start_date"];
        }else{
          $search_data["start_date"] = (date("Y", strtotime("-10 days")) - 1911 )."/".date("m/d", strtotime("-10 days"));
        }
        if($get_data["end_date"])
        {
          $search_data["end_date"] = $get_data["end_date"];
        }else {
          $search_data["end_date"] = (date("Y") - 1911 )."/".date("m/d");
        }

        $uid = $this->session->userdata('case_number')["user_id"];
        $userdata = $this->login_model->get_user_uid($uid);
        $search_data["member"] = $userdata[0]["member"];
      }else {
        $uid = $this->session->userdata('case_number')["user_id"];
        $userdata = $this->login_model->get_user_uid($uid);
        $search_data["member"] = $userdata[0]["member"];

        if($get_data["start_date"])
          $search_data["start_date"] = $get_data["start_date"];
        if($get_data["end_date"])
          $search_data["end_date"] = $get_data["end_date"];
      }
	  	// echo json_encode($search_data);
		$rtn = $this->logbook_plan_model->get_plan_list($search_data,'1');
		echo json_encode($rtn);
	}
	public function get_plan_END_list(){
		$rtn = $this->logbook_plan_model->get_plan_list('','2');
		echo json_encode($rtn);
	}

  public function get_plan_del_list(){
		$rtn = $this->logbook_plan_model->get_plan_list('','3');
		echo json_encode($rtn);
	}
  public function get_LogbookPage_plan__list()
  {
      $get_data = $this->input->get(null,true);
      $uid = $this->session->userdata('case_number')["user_id"];
      $userdata = $this->login_model->get_user_uid($uid);
      $search_data["member"] = $userdata[0]["member"];
      $rtn = $this->logbook_plan_model->get_LogbookPage_plan__list($search_data);
      echo json_encode($rtn);
  }

    public function create_log_plan()
    {
        $post_data = $this->input->post(null,true);
        $uid = $this->session->userdata('case_number')["user_id"];
        $userdata = $this->login_model->get_user_uid($uid);
		if(isset($post_data["member"]))
		{
        $create_log_data["member"] = $post_data["member"];
		}else
		{
			$create_log_data["member"] = $userdata[0]["member"];
        // echo json_encode($create_log_data);
		} 
    $create_log_data["state"] = "A";
		$create_log_data["date"]  =  $post_data["date"];
		$create_log_data["type"]   =  $post_data["today_state"];
		$create_log_data["caseno"]  =  $post_data["today_caseno"];
		$create_log_data["content"] =  $post_data["today_content"];
		$create_log_data["remark"]  =  $post_data["today_remark"];
    $create_log_data["CreateID"] = $userdata[0]["member"];
			//$create_log_data[$key]["name"]    =  $post_data["today_name"][$key];
		//echo "{";
		$error_data["error_string"] =  $uid.",";
		echo json_encode($this->session->userdata('case_number')).",";
		echo json_encode($userdata).",<br>";
		echo "post_data:".json_encode($post_data).",";
        echo json_encode($create_log_data);
		//$post_data["member"] = "";
		$error_data["error_string"] = json_encode($this->session->userdata('case_number')).",".json_encode($userdata).",".json_encode($post_data).",".json_encode($create_log_data);
    // return;
		if($userdata[0]["member"] == "")
		{
			echo "<script>";
            echo "alert(\"資料錯誤，請重新輸入\\nData Error\");";
            //redirect(base_url('login/creat_user'));
            echo "location.href ='".base_url('logbook')."'";
            echo "</script>";
			$this->error_model->create_log($error_data);
			return;
		}
		//echo "}";
        try {

            $ans = $this->logbook_plan_model->creat_plan($create_log_data);
            echo "<script>";
            echo "alert(\"OK\");";
            echo "location.href ='".base_url('logbook_plan')."'";
            echo "</script>";
        } catch (Exception $e) {
            echo "<script>";
            echo "alert(\"FAIL\");";
            //redirect(base_url('login/creat_user'));
            echo "location.href ='".base_url('logbook_plan')."'";
            echo "</script>";
        }

        
    }
    public function update_plan(){
      $post_data = $this->input->post(null,true);
      if($this->logbook_plan_model->update_plan($post_data)){
        echo json_encode(1);
      }else{
        echo "FALSE";
      }

    }
	public function delete_head(){
		
	}
}
?>
