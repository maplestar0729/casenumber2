<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class error_model extends CI_Model{



	public function create_log($data){

		
		try
		{
		$ans = $this->db->insert('error_log', $data);

		} catch (Exception $e){
		$ans = false;
		}
		return $ans;
	}



}
?>
