<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class logbook_model extends CI_Model
{



	public function create_log($data)
	{

		try {
			$ans = $this->db->insert_batch('logbook_log', $data);
		} catch (Exception $e) {
			$ans = false;
		}
		return $ans;
	}
	public function get_prev_log($search_data)
	{

		$where_arr["member"] = $search_data["en"];
		try {
			//echo json_encode($where_arr);

			$this->db->select("logbook_log.caseno,caseindex_caseno.name,logbook_log.type")->from("logbook_log")
				->join("caseindex_caseno", "caseindex_caseno.caseno = logbook_log.caseno", "left")
				->order_by("logbook_log.date desc,NO desc");
			if (isset($where_arr))
				$this->db->where($where_arr);
			$ans = $this->db->get()->result_array();
			//echo $ans;
		} catch (Exception $e) {
			$ans = false;
		}
		return $ans;
	}

	public function get_log($search_data)
	{

		if (isset($search_data["member"])) {
			$where_arr["member"] = $search_data["member"];
		}
		if (isset($search_data["member != "])) {
			$where_arr["member != "] = $search_data["member != "];
		}
		if (isset($search_data["start_date"])) {
			$where_arr["logbook_log.date >="] = $search_data["start_date"];
		}
		if (isset($search_data["end_date"])) {
			$where_arr["logbook_log.date <="] = $search_data["end_date"];
		}
		//echo json_encode($where_arr);
		try {
			//echo json_encode($where_arr);

			$this->db->select("logbook_log.*,caseindex_caseno.name,(member.name) member_name")
				->from("logbook_log")
				->join("caseindex_caseno", "caseindex_caseno.caseno = logbook_log.caseno", "left")
				->join("member", "member.en = logbook_log.member", "left")
				->order_by("logbook_log.date desc,NO desc");
			if (isset($where_arr))
				$this->db->where($where_arr);
			$ans = $this->db->get()->result_array();
			//echo $ans;
		} catch (Exception $e) {
			$ans = false;
		}
		return $ans;
	}

	public function get_log_content()
	{
		try {
			$ans = $this->db->select("content")
				->from("logbook_log")
				->order_by("logbook_log.date desc,NO desc")
				->group_by("content")
				->limit(30)
				->get()->result_array();
		} catch (Exception $e) {
			$ans = false;
		}
		return $ans;
	}

	public function get_log_today_leng($member)
	{
		try {
			$ans = $this->db->select("SEC_TO_TIME( SUM( TIME_TO_SEC(`length`))) as today_leng ")
				->from("logbook_log")
				->where("member", $member)
				->where("date", (date("Y") - 1911) . date("/m/d"))
				->get()->result_array()[0]["today_leng"];
			if ($ans == null) {
				$ans = 0;
			}
		} catch (Exception $e) {
			$ans = false;
		}
		return $ans;
	}
	public function update_log($NO, $set_data)
	{
		try {
			//echo json_encode($case_data);
			$ans = $this->db->where('NO', $NO)->update('logbook_log', $set_data);
		} catch (Exception $e) {
			$ans = false;
		}
		return $ans;
	}
}
