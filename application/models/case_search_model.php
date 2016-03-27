<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class case_search_model extends CI_Model{


	public function search_case_tab($search_data,$isOldTab){

		$search_text = $search_data["search_text"];

		$this->db->select('*')
			 ->from('caseindex_caseno')
			 ->like('name',$search_text);
		if($isOldTab == "old")
		{
			$this->db->where('year < ',(date("Y") - 1911) - 5);
		}else {
			$this->db->where('year > ',(date("Y") - 1911) - 5);
		}
		$rtn = $this->db->get()->result_array();
		return $rtn;
	}
	public function search_case_tab_undecided($search_data,$isOldTab)
	{
			$search_text = $search_data["search_text"];
			$this->db->select('*')
				 ->from('caseindex_caseno_undecided')
				 ->like('name',$search_text);
			if($isOldTab == "old")
			{
				$this->db->where('year < ',(date("Y") - 1911) - 5);
			}else {
				$this->db->where('year > ',(date("Y") - 1911) - 5);
			}
		return $this->db->get()->result_array();
  }
}
?>
