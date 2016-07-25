<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('member_model');
    }

    public function index(){
  		if(!$this->session->userdata('case_number')["logged_in"])
  		{
  			//$data['img']=$this->captcha_img();
  			$this->load->view('login/login.php');
  		}
  		else
  		{
  			redirect(base_url('logbook/index'));
  		}
    }

  	//登入檢查
  	public function login_check(){
  		if( $this->session->userdata('case_number')["logged_in"] ){		//已登入
              redirect( base_url('logbook/index') );
          }else{
  			//驗證碼驗證
  			// $this->load->library('securimage/securimage');

  			//帳密驗證
              // $this->form_validation->set_rules('username', '帳號', 'trim|required|xss_clean');
              // $this->form_validation->set_rules('password', '密碼', 'trim|required|callback_user_valid');
              $uid = $this->input->post('uid',true);
              $pw = $this->input->post('pw',true);
              $user = $this->login_model->get_user($uid,$pw);
              if($user == false){      //驗證失敗
                  $data["login_error"] = "驗證失敗";
        			    $this->load->view('login/login.php',$data);
              }else{                							//驗證成功
                  $session_data["case_number"]["user_name"] = $user[0]['name'];
                  $session_data["case_number"]["user_id"] = $user[0]['id'];
                  $session_data["case_number"]["class"] = $user[0]['clas'];
                  $session_data["case_number"]["logged_in"] = true;
  				        $this->session->set_userdata($session_data);
                  redirect( base_url('login') );
              }
          }
  	}

  	//認證密碼
    public function logout(){
      $this->session->unset_userdata('case_number');
      redirect( base_url('logbook') );
    }
  	public function edit(){
        $uid = $this->session->userdata('case_number')["user_id"] ;
        //echo $uid;
        $post_data = $this->input->post(null,true);
        if($post_data["old_pw"])
        {
          $user = $this->login_model->get_user($uid,$post_data["old_pw"]);
          if($user == false)
          {
            echo "<script>alert(\"密碼錯誤\");</script>";
          }else if($post_data["new_pw"] != $post_data["chk_pw"])
          {
            echo "<script>alert(\"兩次密碼不一致\");</script>";
          }
          $this->login_model->update_user_pw($uid,$post_data);
          echo "<script>alert(\"修改成功\");</script>";
        }
    		$this->logbook_template("login/edit");
    }

    public function creat_user()
    {
        $data["member"] = $this->member_model->get_member();
        //echo json_encode($data["member"]);
    		$this->logbook_template("login/creat_user",$data);

    }
    public function creat_user_chk()
    {
        $post_data = $this->input->post(null,true);
        //echo json_encode($data["member"]);
        $data["id"] = $post_data["uid"];
        $data["pw"] = $post_data["pw"];
        $data["member"] = $post_data["member"];
        $data["clas"] = $post_data["clas"];
        try {
            $this->login_model->new_user($data);
            echo "<script>";
            echo "alert(\"OK\");";
            echo "location.href ='".base_url('logbook')."'";
            echo "</script>";
        } catch (Exception $e) {
            echo "<script>";
            echo "alert(\"FAIL\");";
            //redirect(base_url('login/creat_user'));
            echo "location.href ='".base_url('login/creat_user')."'";
            echo "</script>";
        }




    }
}
?>
