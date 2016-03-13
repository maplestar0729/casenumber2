<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends MY_Controller{

    public function __construct(){
        parent::__construct();
    		$this->load->model('case_index_model');
    		$this->load->model('case_table_model');
    }

    public function index($year = 0){

  		$data['title_sort'] = $this->case_index_model->get_title_sort();
      if($year == 0)
      {
          $data['year'] = (date("Y") - 1911);
      }else {
          $data['year'] = $year;
      }


  		$this->template("home",$data);
    }


	public function get_case_tab($year = 0){
		$data_get = $this->input->get(NULL, TRUE);
		if(!isset($data_get["sort"]))
			$data_get["sort"] = "caseno";
//		$data["total"] = $this->case_table_model->get_case_tab_cnt();
//		$data["rows"] = $this->case_table_model->get_case_tab($year , $data_get);

		$data = $this->case_table_model->get_case_tab($year , $data_get);

		echo json_encode($data);

//		echo json_encode($data);
    }

	public function new_case_data(){
		$save_data_post = $this->input->post(NULL, TRUE);

		$save_data["year"]	= $save_data_post["case_code_year"];
		$save_data["no_en"]	= $save_data_post["case_code_en"];
		$save_data["no_n"]	= (($save_data_post["case_code_year"]>=100) ? $save_data_post["case_code_year"] -100 : $save_data_post["case_code_year"]).str_pad($save_data_post["case_code_n"], 2, "0", STR_PAD_LEFT) ;
		$save_data["name"]	= $save_data_post["case_name"];
		$save_data["caseno"] = $save_data["no_en"].str_pad($save_data["no_n"], 4, "0", STR_PAD_LEFT) ;
		$data['new_case_save_pass'] = $this->case_table_model->new_case_data($save_data);
//		echo json_encode($save_data);


		index($save_data_post["case_code_year"]);
  }

	public function update_caseno_data(){
		$data_post = $this->input->post(NULL, TRUE);
		$data['new_case_save_pass'] = $this->case_table_model->update_case_data($data_post);

		$this->index($data_post["year"]);
	}

  public function update_status(){
    $data_post = $this->input->post(NULL, TRUE);
    //echo json_encode($data_post);
    $id = $data_post["id"];
    $set_data[$data_post["title"]] = $data_post["date"];
    $set_data[$data_post["title"]."_state"] = $data_post["status"];

    //$this->case_table_model->update_caseno_status($id,$set_data);
    echo $this->case_table_model->update_caseno_status($id,$set_data);
    //$this->index($data_post["year"]);

  }
}
?>
