<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
header("Content-Type: text/html;charset=utf-8");
class work extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('case_number')["logged_in"]) {
        } else {
            redirect(base_url('login'));
        }
        $this->load->model('logbook/logbook_model');
        $this->load->model('login_model');
        $this->load->model('case_table_model');
        $this->load->model('member_model');
        $this->load->model('error_model');
    }

    public function index()
    {

        $uid = $this->session->userdata('case_number')["user_id"];
        $userdata = $this->login_model->get_user_uid($uid);
        $search_data["en"] = $userdata[0]["member"];

        $get_data = $this->input->get(null, true);
        $data["tab_search_str"] = "?start_date=" . $get_data["start_date"] . "&end_date=" . $get_data["end_date"];

        if ($get_data["start_date"]) {
            $data["start_date"] = $get_data["start_date"];
        } else {
            $data["start_date"] = (date("Y", strtotime("-10 days")) - 1911) . "/" . date("m/d", strtotime("-10 days"));
        }
        if ($get_data["end_date"]) {
            $data["end_date"] = $get_data["end_date"];
        } else {
            $data["end_date"] =  (date("Y") - 1911) . "/" . date("m/d");
        }
        $log_data = $this->logbook_model->get_prev_log($search_data);


        if ($this->session->userdata('case_number')["class"] != 3) {
            $data["tab_search_str"] = $data["tab_search_str"] . "&en=" . $get_data["en"];
            $data["member"] = $this->member_model->get_member();
        }
        if (isset($log_data[0]["caseno"])) {
            $data["prev_caseno"] = $log_data[0]["caseno"];
            $data["prev_caseno_name"] = $log_data[0]["name"];
            $data["prev_caseno_state"] = $log_data[0]["type"];
        } else {
            $data["prev_caseno"] = "";
            $data["prev_caseno_name"] = "";
            $data["prev_caseno_state"] = "";
        }
        //echo json_encode($data);
        $this->logbook_template("logbook/index", $data);
    }

    public function get_caseno()
    {
        $case_data = $this->case_table_model->get_case_name();
        echo json_encode($case_data);
    }
    public function search_caseno()
    {

        $get_data = $this->input->get(null, true);

        if ($this->session->userdata('case_number')["class"] != 3) {
            $search_data = "";
            if ($get_data["en"] != "all" && $get_data["en"] != "")
                $search_data["member"] = $get_data["en"];
            if ($this->session->userdata('case_number')["class"] == 2) {
                $search_data["member != "] = "F";
            }
            if ($get_data["start_date"]) {
                $search_data["start_date"] = $get_data["start_date"];
            } else {
                $search_data["start_date"] = (date("Y", strtotime("-10 days")) - 1911) . "/" . date("m/d", strtotime("-10 days"));
            }
            if ($get_data["end_date"]) {
                $search_data["end_date"] = $get_data["end_date"];
            } else {
                $search_data["end_date"] = (date("Y") - 1911) . "/" . date("m/d");
            }
        } else {
            $uid = $this->session->userdata('case_number')["user_id"];
            $userdata = $this->login_model->get_user_uid($uid);
            $search_data["member"] = $userdata[0]["member"];

            if ($get_data["start_date"])
                $search_data["start_date"] = $get_data["start_date"];
            if ($get_data["end_date"])
                $search_data["end_date"] = $get_data["end_date"];
        }
        $log_data = $this->logbook_model->get_log($search_data);
        echo json_encode($log_data);
    }


    public function create_log_today()
    {
        $post_data = $this->input->post(null, true);
        $uid = $this->session->userdata('case_number')["user_id"];
        $userdata = $this->login_model->get_user_uid($uid);
        $post_data["member"] = $userdata[0]["member"];

        foreach ($post_data["today_content"] as $key => $value) {
            if (!$value) {
                continue;
            }
            if (strpos($post_data["today_leng"][$key], ":")) {
                //True
                $post_data["today_leng"][$key] = $post_data["today_leng"][$key] . ":00";
            } else {
                //False
                $post_data["today_leng"][$key] = $post_data["today_leng"][$key] . ":00:00";
            }
            $create_log_data[$key]["length"]  =  $post_data["today_leng"][$key];
            $create_log_data[$key]["type"]   =  $post_data["today_state"][$key];
            $create_log_data[$key]["caseno"]  =  $post_data["today_caseno"][$key];
            //$create_log_data[$key]["name"]    =  $post_data["today_name"][$key];
            $create_log_data[$key]["content"] =  $post_data["today_content"][$key];
            // $create_log_data[$key]["woker"] =  $post_data["today_woker"][$key];
            $create_log_data[$key]["remark"]  =  $post_data["today_remark"][$key];
            $create_log_data[$key]["remark2"]  =  "";
            $create_log_data[$key]["member"]  =  $userdata[0]["member"];
            $create_log_data[$key]["date"]    =  (date("Y") - 1911) . "/" . date("m/d");
        }
        //echo "{";
        $error_data["error_string"] =  $uid . ",";
        echo json_encode($this->session->userdata('case_number')) . ",";
        echo json_encode($userdata) . ",";
        echo json_encode($post_data) . ",";
        echo json_encode($create_log_data);
        //$post_data["member"] = "";
        $error_data["error_string"] = json_encode($this->session->userdata('case_number')) . "," . json_encode($userdata) . "," . json_encode($post_data) . "," . json_encode($create_log_data);
        if ($post_data["member"] == "") {
            echo "<script>";
            echo "alert(\"資料錯誤，請重新輸入\\nData Error\");";
            //redirect(base_url('login/creat_user'));
            echo "location.href ='" . base_url('logbook') . "'";
            echo "</script>";
            $this->error_model->create_log($error_data);
            return;
        }
        //echo "}";
        try {

            $ans = $this->logbook_model->create_log($create_log_data);
            echo "<script>";
            echo "alert(\"OK\");";
            echo "location.href ='" . base_url('logbook') . "'";
            echo "</script>";
        } catch (Exception $e) {
            echo "<script>";
            echo "alert(\"FAIL\");";
            //redirect(base_url('login/creat_user'));
            echo "location.href ='" . base_url('logbook') . "'";
            echo "</script>";
        }
    }

    public function create_log()
    {
        $post_data = $this->input->post(null, true);
        $uid = $this->session->userdata('case_number')["user_id"];
        $userdata = $this->login_model->get_user_uid($uid);
        $post_data["member"] = $userdata[0]["member"];
        // try {

        //     $ans = $this->logbook_model->create_log($post_data);
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

    public function get_log_content()
    {
        $rtn = $this->logbook_model->get_log_content();
        echo json_encode($rtn);
    }
    public function get_log_today_leng()
    {
        $uid = $this->session->userdata('case_number')["user_id"];
        $userdata = $this->login_model->get_user_uid($uid);
        $rtn = $this->logbook_model->get_log_today_leng($userdata[0]["member"]);
        // $rtn = str_pad($rtn,6,'0',STR_PAD_LEFT);
        $rtn = substr($rtn, 0, 5);
        // $rtn = substr_replace($rtn,":",2,0);
        // $rtn_data["today_work_time"] = $rtn;
        echo json_encode($rtn);
    }

    public function update_log_data()
    {
        $data_post = $this->input->post(NULL, TRUE);
        //echo json_encode($data_post);
        $NO = $data_post["NO"];
        //$tab_name = $data_post["tab_name"];
        $set_data = $data_post["set_data"];
        //echo $tab_name;
        echo $this->logbook_model->update_log($NO, $set_data);
    }
}
