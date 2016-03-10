<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class case_index_model extends CI_Model{
    

	
	public function get_title_sort(){  
		
		$this->db->select('*')
			 ->from('caseindex_title_edit')->order_by("caseindex_title_edit.sort", "ASC");
		
		return $this->db->get()->result_array();  
	}
	
	public function save_title_sort($title_data){  
		if($this->db->update_batch('caseindex_title_edit',$title_data,'id'))
			return 1;  
	}
	

}
?>