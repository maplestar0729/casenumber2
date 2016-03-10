<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class title_edit extends MY_Controller{
    
    public function __construct(){
        parent::__construct();
		$this->load->model('case_index_model');
    }

    public function index(){
		$this->template("title_edit");
    } 
	
    public function get_title_sort(){
		
		echo json_encode($this->case_index_model->get_title_sort());
    } 
	
	public function save_title_sort(){
		$title_data = $this->input->post('title_data');
//		echo json_encode($title_data);
		echo json_encode($this->case_index_model->save_title_sort($title_data));
    } 
}
?>
