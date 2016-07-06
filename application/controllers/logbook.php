<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logbook extends MY_Controller{

    public function __construct(){
        parent::__construct();
    		$this->load->model('logbook_model');
    		$this->load->model('login_model');
        $this->load->model('case_table_model');
        $this->load->model('member_model');
    }

    public function index(){

      $uid = $this->session->userdata('case_number')["user_id"];
      $userdata = $this->login_model->get_user_uid($uid);
      $search_data["en"] = $userdata[0]["member"];

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


      if($this->session->userdata('case_number')["class"] == 1)
      {
          $data["tab_search_str"] = $data["tab_search_str"]."&en=".$get_data["en"];
          $data["member"] = $this->member_model->get_member();
      }
      if(isset($log_data[0]["caseno"]))
      {
          $data["prev_caseno"] = $log_data[0]["caseno"];
          $data["prev_caseno_name"] = $log_data[0]["name"];
          $data["prev_caseno_state"] = $log_data[0]["state"];
      }else
      {
          $data["prev_caseno"] = "";
          $data["prev_caseno_name"] = "";
          $data["prev_caseno_state"] = "";
      }
      //echo json_encode($data);
  		$this->logbook_template("logbook/index",$data);
    }

    public function get_caseno()
    {
      $case_data = $this->case_table_model->get_case_name();
      echo json_encode($case_data);
    }
    public function search_caseno()
    {

      $get_data = $this->input->get(null,true);

      if($this->session->userdata('case_number')["class"] == 1)
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
      }else {
        $uid = $this->session->userdata('case_number')["user_id"];
        $userdata = $this->login_model->get_user_uid($uid);
        $search_data["member"] = $userdata[0]["member"];

        if($get_data["start_date"])
          $search_data["start_date"] = $get_data["start_date"];
        if($get_data["end_date"])
          $search_data["end_date"] = $get_data["end_date"];
      }
      $log_data = $this->logbook_model->get_log($search_data);
      echo json_encode($log_data);
    }


    public function create_log_today()
    {
        $post_data = $this->input->post(null,true);
        $uid = $this->session->userdata('case_number')["user_id"];
        $userdata = $this->login_model->get_user_uid($uid);
        $post_data["member"] = $userdata[0]["member"];
        
        foreach ($post_data["today_content"] as $key => $value)
        {
            if( !$value )
            {
              continue;
            }
            $create_log_data[$key]["length"]  =  $post_data["today_leng"][$key];
            $create_log_data[$key]["state"]   =  $post_data["today_state"][$key];
            $create_log_data[$key]["caseno"]  =  $post_data["today_caseno"][$key];
            //$create_log_data[$key]["name"]    =  $post_data["today_name"][$key];
            $create_log_data[$key]["content"] =  $post_data["today_content"][$key];
            $create_log_data[$key]["remark"]  =  $post_data["today_remark"][$key];
            $create_log_data[$key]["member"]  =  $userdata[0]["member"];
            $create_log_data[$key]["date"]    =  (date("Y") - 1911 )."/".date("m/d");
        }
        echo json_encode($create_log_data);
        try {

            $ans = $this->logbook_model->creat_log($create_log_data);
            echo "<script>";
            echo "alert(\"OK\");";
            echo "location.href ='".base_url('logbook')."'";
            echo "</script>";
        } catch (Exception $e) {
            echo "<script>";
            echo "alert(\"FAIL\");";
            //redirect(base_url('login/creat_user'));
            echo "location.href ='".base_url('logbook')."'";
            echo "</script>";
        }

        
    }

    public function creat_log(){
        $post_data = $this->input->post(null,true);
        $uid = $this->session->userdata('case_number')["user_id"];
        $userdata = $this->login_model->get_user_uid($uid);
        $post_data["member"] = $userdata[0]["member"];
        // try {

        //     $ans = $this->logbook_model->creat_log($post_data);
        //     echo "<script>";
        //     echo "alert(\"OK\");";
        //     echo "location.href ='".base_url('logbook')."'";
        //     echo "</script>";
        // } catch (Exception $e) {
        //     echo "<script>";
        //     echo "alert(\"FAIL\");";
        //     //redirect(base_url('login/creat_user'));
        //     echo "location.href ='".base_url('logbook')."'";
        //     echo "</script>";
        // }

    }

    public function get_log_content(){
      $rtn = $this->logbook_model->get_log_content();
      echo json_encode($rtn);
    }
}
?>
