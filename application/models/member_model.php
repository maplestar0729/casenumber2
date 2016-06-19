<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class member_model extends CI_Model{



	public function get_member(){

    $user_array = array('status'=>"Y");
		$this->db->select('*')
			 ->from('member')->where($user_array);
		
		return $this->db->get()->result_array();
	}



}
?>
