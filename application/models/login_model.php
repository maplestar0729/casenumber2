<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model{



	public function get_user($uid,$pw){

    $user_array = array('id'=>$uid,'pw'=>$pw);
		$this->db->select('*')
			 ->from('user')->where($user_array)->join('member','user.member = member.EN','left');

		return $this->db->get()->result_array();
	}
	public function get_user_uid($uid){

    $user_array = array('id'=>$uid);
		$this->db->select('*')
			 ->from('user')->where($user_array)->join('member','user.member = member.EN','left');

		return $this->db->get()->result_array();
	}
	public function update_user_pw($id,$in_data){
		$pw = "";
		$en = "";
		if(isset($in_data["new_pw"]))
			$pw = $in_data["new_pw"];
		if(isset($in_data["en"]))
			$en = $in_data["en"];
		try
		{

      if($pw)
        $data["pw"] = $pw;
      if($en)
        $data["member"] = $en;
			//echo json_encode($data);
      if($data)
			   $ans = $this->db->where('id',$id)->update('user', $data);

		  if(count($ans) == 0)
				$ans = false;
		} catch (Exception $e){
			$ans = false;
		}
		return $ans;
	}

  public function new_user($data)
  {
    try
    {
      $ans = $this->db->insert('user', $data);

    } catch (Exception $e){
      $ans = false;
    }
    return $ans;
  }


}
?>
