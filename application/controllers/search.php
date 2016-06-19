<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class search extends MY_Controller{

    public function __construct(){
        parent::__construct();
    		$this->load->model('case_index_model');
    		$this->load->model('case_table_model');
    		$this->load->model('case_search_model');
    }

    public function index($str = ""){
      $data["search_str"] = $str;
      $data["isOld"] = "";
      $this->call_view($data);
    }
    public function old($str = ""){
      $data["search_str"] = $str;
      $data["isOld"] = "old";
      $this->call_view($data);

    }
    public function call_view($data)
    {
      if($data["search_str"] == "")
	  {
        $get_data = $this->input->get(NULL, TRUE);
		$data["search_str"] = $get_data["str"];
	  }
      $search_str = $data["search_str"];

	  //  echo $search_str;
      if($search_str != "")
      {

          $data["get_case_tab_link"] = "/search/search_case_tab/".$search_str."/".$data["isOld"];
          $data["search_case_tab_undecided_link"] = "/search/search_case_tab_undecided/".$search_str."/".$data["isOld"];
          $data['title_sort'] = $this->case_index_model->get_title_sort();
          $this->caseindex_template("home",$data);
      }else{
          $this->caseindex_template("search/info",$data);
      }
    }
    public function search_case_tab($search_str = "",$isOldTab = "")
    {

      $search_data["search_text"]	= urldecode($search_str);
      $result = $this->case_search_model->search_case_tab($search_data,$isOldTab);
      echo json_encode($result);
    }

    public function search_case_tab_undecided($search_str = "",$isOldTab = "")
    {
      $search_data["search_text"]	= urldecode($search_str);
      $result = $this->case_search_model->search_case_tab_undecided($search_data,$isOldTab);
      echo json_encode($result);
    }

}
?>
