<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logbook_plan_model extends CI_Model{



	public function creat_plan($data){

		try
		{
		$ans = $this->db->insert('logbook_plan', $data);

		} catch (Exception $e){
		$ans = false;
		}
		return $ans;
	}
	public function get_plan_list($search_data){

		
		
		$where_arr["member"] = $search_data["member"];
		// if(isset($search_data["start_date"]))
		// {
		// 		$where_arr["logbook_plan.date >="] = $search_data["start_date"];
		// }
		// if(isset($search_data["end_date"]))
		// {
		// 		$where_arr["logbook_plan.date <="] = $search_data["end_date"];
		// }
		try
		{
			//echo json_encode($where_arr);
// echo json_encode(where_arr);
  		$this->db->select("logbook_plan.*,caseindex_caseno.name,(member.name) member_name")
				->from("logbook_plan")
				->join("caseindex_caseno","caseindex_caseno.caseno = logbook_plan.caseno","left")
				->join("member","member.en = logbook_plan.member","left")
				->order_by("logbook_plan.date desc,NO desc");
			// if(isset($where_arr))
			// {
			// 	$this->db->where($where_arr);
				
			// }
			$where_str = "(state = \"B\" or member = '".$where_arr["member"]."' ) and state != \"D\"";
			$this->db->where($where_str);
			$ans = $this->db->get()->result_array();
			//echo $ans;
		} catch (Exception $e){
			$ans = false;
		}
		return $ans;
	}

	public function update_plan($data){
		try
		{
			$ans = $this->db->where('NO',$data["NO"])->update("logbook_plan", $data);
		}catch (Exception $e){
			$ans = false;
		}
		return $ans;

		
	}
	public function get_LogbookPage_plan__list($search_data){

		
		
		$where_arr["member"] = $search_data["member"];
		// if(isset($search_data["start_date"]))
		// {
		// 		$where_arr["logbook_plan.date >="] = $search_data["start_date"];
		// }
		// if(isset($search_data["end_date"]))
		// {
		// 		$where_arr["logbook_plan.date <="] = $search_data["end_date"];
		// }
		try
		{
			//echo json_encode($where_arr);
// echo json_encode(where_arr);
  		$this->db->select("logbook_plan.*,caseindex_caseno.name,(member.name) member_name")
				->from("logbook_plan")
				->join("caseindex_caseno","caseindex_caseno.caseno = logbook_plan.caseno","left")
				->join("member","member.en = logbook_plan.member","left")
				->order_by("logbook_plan.date desc,NO desc");
			// if(isset($where_arr))
			// {
			// 	$this->db->where($where_arr);
				
			// }
			$where_str = "member = '".$where_arr["member"]."' and state != \"D\"";
			$this->db->where($where_str);
			$ans = $this->db->get()->result_array();
			//echo $ans;
		} catch (Exception $e){
			$ans = false;
		}
		return $ans;
	}

}
?>
