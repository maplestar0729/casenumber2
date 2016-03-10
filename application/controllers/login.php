<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
		if(!$this->session->userdata('logged_in'))
		{
			$data['img']=$this->captcha_img();
			$this->load->view('login',$data);     
		}
		else
		{
			redirect(base_url('systems'));
		}		
    }

	//登入檢查
	public function login_check(){
		if( $this->session->userdata('logged_in') ){		//已登入
            redirect( base_url('systems') );
        }else{	
			//驗證碼驗證
			$this->load->library('securimage/securimage');
			$img = new Securimage();
			if( !$img->check( $this->input->post('captcha',true) ) ) {
				$this->session->set_userdata('msg', '驗證碼錯誤!!');
				redirect(base_url('login'));  
			}
			//帳密驗證
            $this->form_validation->set_rules('username', '帳號', 'trim|required|xss_clean');
            $this->form_validation->set_rules('password', '密碼', 'trim|required|callback_user_valid');   

            if($this->form_validation->run() == false){      //驗證失敗
				redirect( base_url('login') );                                 
            }else{                							//驗證成功
				$name=$this->input->post('username',true);
                redirect( base_url('systems') );                
            }        
        }	
	}
	
	//認證密碼
	public function user_valid($password){
		if($this->session->userdata('logged_in'))
		{
			$username  = $this->session->userdata('logged_in')['account'];
		}else
		{
		    $username  = $this->input->post('username',true);
		}
		$this->db->select('*')
				 ->from('user')
				 ->where('account',$username);
		$result=$this->db->get()->row_array();
		if($result && password_verify($password, $result['password']) ){		
			$sess_array = array(      
				'id'   		=> $result['id'],
                'name' 		=> $result['name'],
				'account'	=> $result['account']
            );
            $this->session->set_userdata('logged_in',$sess_array); 
			$this->session->set_userdata('session_id', md5(microtime()+rand()));	
			if($this->session->userdata('logged_in'))
			{
				echo 1;
			}
            return TRUE;
		} else {
			if($this->session->userdata('logged_in'))
			{
				echo 0;
			}else
			{
				$this->session->set_userdata('msg', '登入失敗!!');
			}
			return FALSE;
		}
    }
	
	//驗證碼
	public function captcha_img() 
    {
        return base_url('login/securimage_jpg');
    }
	//驗證碼設定
    public function securimage_jpg() 
    {
        $this->load->library('securimage/securimage');
        $img = new Securimage();
		$img->charset = '0123456789';
        $img->image_width = 100;
        $img->image_height = 45;
        $img->perturbation = 0;	//干擾雜訊度
		$img->num_lines = 0;		//線條數
		$img->text_transparency_percentage = 20; // 100 為全透明 
		$img->image_bg_color = new Securimage_Color("#f6f6f6");
        $img->use_transparent_text = true;        
        //$img->use_wordlist = true; 		
        $img->show(); // 套背景圖並顯示		
    }
	
	//登出
	public function logout(){
        if ( $this->session->userdata('logged_in') ){
            $this->session->unset_userdata('logged_in');
            redirect(base_url('login'));
        }else{
            redirect(base_url('login'));
        }
    }
	
	//忘記密碼驗證及發送Email
	/*public function forget(){
		if(!$this->input->post()) redirect(base_url('login'));
		//驗證碼驗證
		$this->load->library('securimage/securimage');
		$img = new Securimage();
		if( !$img->check( $this->input->post('forget_captcha',true) ) ) {
			echo json_encode('驗證碼錯誤!!');
			return;
		}
		$this->form_validation->set_rules('forget_usr', 'Email', 'trim|required|xss_clean');
		if($this->form_validation->run() == true){ 					
			$email = $this->input->post('forget_usr',true);			
            if($this->common_model->check_email($email)){		//帳號存在								
				$session_key = md5($email.date("Y-m-d H:i:s"));
				$link = base_url('login/reset_pwd')."/".$session_key;
				$subject = '';
				$content = '請點擊下面連結進行更改密碼：<br>'.$link;				
				$this->common_model->send_email($email,$subject,$content);				
				$key = array(
					'session_key'   => $session_key,
					'session_expire'=> date("Y-m-d H:i:s",mktime(date("H"),date("i"),date("s"),date("m"),date("d")+1,date("Y")))
				);	
				$this->db->where('email',$email)
						 ->update('account',$key);			
				echo json_encode(1);
				return;	
			}
			else{												//帳號不存在
				echo json_encode('此帳號不存在!');
				return;
			}
        } 	
	}
	
	//修改密碼
	public function change_pwd(){
		if(!$this->input->post()) redirect (base_url('login'));
        $pwd = $this->input->post("new_pwd",true);
        $hash = $this->input->post("hash",true);            
		$data = array(
			'password'      =>  password_hash($pwd, PASSWORD_BCRYPT, array('cost' => ENCRYPT_LENGTH)),
			'session_key'   =>  ''
		);
		$this->db->where('session_key',$hash)
				 ->update('account',$data);	
		redirect (base_url('login'));	
	}*/
		
	//測試
	public function create($password){
		echo password_hash($password, PASSWORD_BCRYPT, array('cost' => ENCRYPT_LENGTH));
	}	
	
}
?>
