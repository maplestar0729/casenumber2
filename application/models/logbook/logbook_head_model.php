<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logbook_head_model extends CI_Model{



	public function creat_head($data){

		try
		{
		$ans = $this->db->insert('logbook_head', $data);

		} catch (Exception $e){
		$ans = false;
		}
		return $ans;
	}
	public function get_head_list($search_data){

		$where_arr["type"] = $search_data["type"];
		$where_arr["state"] = "A";
		try
		{
			//echo json_encode($where_arr);

			$this->db->select("*")->from("logbook_head")
					->order_by("sort_no","ASC")
					->where($where_arr);
			$ans = $this->db->get()->result_array();
			//echo $ans;
		} catch (Exception $e){
			$ans = false;
		}
		return $ans;
	}

	public function update_head($data){
		try
		{
			$ans = $this->db->where('uid',$data["uid"])->update("logbook_head", $data);
		}catch (Exception $e){
			$ans = false;
		}
		return $ans;

		
	}


}
?>
