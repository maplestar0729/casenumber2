<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class case_table_model extends CI_Model{


	public function get_case_tab($year=0){
		//$start_year = $this->config->load('start_year');
			if($year == 0){
				$this->db->select('*')
					 ->from('caseindex_caseno');
			}else{
				$this->db->select('*')
					 ->from('caseindex_caseno')
					 ->where('year',$year);
			}
		return $this->db->get()->result_array();
	}
	public function get_case_name($year=0){
		//$start_year = $this->config->load('start_year');
			if($year == 0){
				$this->db->select('caseno,name')
					 ->from('caseindex_caseno')
					 ->order_by("year desc,caseno desc");
			}else{
				$this->db->select('caseno,name')
					 ->from('caseindex_caseno')
					 ->where('year',$year);
			}
		return $this->db->get()->result_array();
	}
	public function get_case_tab_undecided($year)
  {
		if($year == 0){
			$this->db->select('*')
				 ->from('caseindex_caseno_undecided');
		}else{
			$this->db->select('*')
				 ->from('caseindex_caseno_undecided')
				 ->where('year',$year);
		}
		return $this->db->get()->result_array();
  }
	public function new_case_data($case_data){
		try
		{
			//echo json_encode($case_data);
			//$tmp =
			$tmp = $this->db->select('*')
					 ->from('caseindex_caseno')
					 ->where('caseno',$case_data["caseno"])
					 ->get()->result_array();
			if($tmp )
			{
				$ans = $case_data["caseno"]."案件編號重複";
			}else {
				$this->db->insert('caseindex_caseno', $case_data);
				$ans = "新增成功";
			}
		} catch (Exception $e){
			$ans = $e;
		}
		return $ans;
	}
	public function new_case_undecided($case_data){
		try
		{
			$ans = $this->db->insert('caseindex_caseno_undecided', $case_data);

		} catch (Exception $e){
			$ans = false;
		}
		return $ans;
	}
	public function update_case_data($case_data){
		try
		{
			//echo json_encode($case_data);
			$ans = $this->db->where('id',$case_data['id'])->update('caseindex_caseno', $case_data);

		} catch (Exception $e){
			$ans = false;
		}
		return $ans;
	}
	public function get_case_tab_cnt(){

		return $this->db->count_all('caseindex_caseno');
	}
  public function update_caseno_status($id,$status_data,$tab_name)
  {
      try
  		{
  			$ans = $this->db->where('id',$id)->update($tab_name, $status_data);

  		} catch (Exception $e){
  			$ans = false;
  		}

		return $ans;
  }
	public function del_undecided_tab($id){
		try
		{
			$ans = $this->db->delete('caseindex_caseno_undecided', array('id' => $id));
		} catch (Exception $e){
			$ans = false;
		}

		return $ans;
	}
	public function del_case_tab($id){
		try
		{
			$ans = $this->db->delete('caseindex_caseno', array('id' => $id));
		} catch (Exception $e){
			$ans = false;
		}

		return $ans;
	}
}
?>
