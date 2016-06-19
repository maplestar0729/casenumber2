<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends MY_Controller{

    public function __construct(){
        parent::__construct();
    		$this->load->model('case_index_model');
    		$this->load->model('case_table_model');
    }

    public function index($year = 0){

  		$data['title_sort'] = $this->case_index_model->get_title_sort();
      $data['year'] = $year;
      $data['page_name'] = "case_show";

      $data["get_case_tab_link"] = "/home/get_case_tab/".$year;
      $data["search_case_tab_undecided_link"] = "/home/get_case_tab_undecided/".$year;

  		$this->caseindex_template("home",$data);
    }

    public function search()
    {
        $data['title_sort'] = $this->case_index_model->get_title_sort();
        $this->caseindex_template("search",$data);
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
  public function get_case_tab_undecided($year = 0)
  {
    $data = $this->case_table_model->get_case_tab_undecided($year);

		echo json_encode($data);
  }
	public function new_case_data(){
		$save_data_post = $this->input->post(NULL, TRUE);

		$save_data["year"]	= $save_data_post["case_code_year"];
		$save_data["no_en"]	= $save_data_post["case_code_en"];
		$save_data["no_n"]	= (($save_data_post["case_code_year"]>=100) ? $save_data_post["case_code_year"] -100 : $save_data_post["case_code_year"]).str_pad($save_data_post["case_code_n"], 2, "0", STR_PAD_LEFT) ;
		$save_data["name"]	= $save_data_post["case_name"];
		$save_data["caseno"] = $save_data["no_en"].str_pad($save_data["no_n"], 4, "0", STR_PAD_LEFT);
    if($save_data_post["undecided_tab_id"] != 0)
    {
        $this->case_table_model->del_undecided_tab($save_data_post["undecided_tab_id"]);
    }
    for($i = 1; $i<=20; $i++)
    {
       $save_data["title".$i."_state"] =  (int)$save_data_post["case_title"];
    }
	$data['new_case_save_pass'] = $this->case_table_model->new_case_data($save_data);
	$tmp_html = "<script>";
	$tmp_html = $tmp_html."alert('".$data['new_case_save_pass']."');";
	$tmp_html = $tmp_html."location.href='".base_url('home/index/'.($save_data_post["case_code_year"]))."'";
	$tmp_html = $tmp_html."</script>";
	//redirect(base_url('home/index/'.($save_data_post["case_code_year"])));
	echo $tmp_html;
	//echo "<script>alert('".$data['new_case_save_pass']."')</script>";
  }

  public function new_case_undecided()
  {
		$save_data_post = $this->input->post(NULL, TRUE);

    $save_data["year"]	= $save_data_post["case_code_year"];
    $save_data["name"]	= $save_data_post["case_name"];

    $data['new_case_save_pass'] = $this->case_table_model->new_case_undecided($save_data);
		redirect(base_url('home/index/'.($save_data_post["case_code_year"])));
  }

  public function chg_to_formal()
  {
    $data_post = $this->input->post(NULL, TRUE);
  }


	public function update_caseno_data(){
		$data_post = $this->input->post(NULL, TRUE);
    //echo json_encode($data_post);
    $id = $data_post["id"];
    $tab_name = $data_post["tab_name"];
    $set_data = $data_post["set_data"];
    //echo $tab_name;
		echo $this->case_table_model->update_caseno_status($id,$set_data,$tab_name);
		//$this->index($data_post["year"]);
	}

  public function update_status(){
    $data_post = $this->input->post(NULL, TRUE);
    //echo json_encode($data_post);
    $id = $data_post["id"];
    $set_data[$data_post["title"]] = $data_post["date"];
    $set_data[$data_post["title"]."_state"] = $data_post["status"];
    $tab_name = "caseindex_caseno";
    //$this->case_table_model->update_caseno_status($id,$set_data);
    echo $this->case_table_model->update_caseno_status($id,$set_data,$tab_name);
    /*if($data_post["status"] == 0)
    {
        $sCode = '<div class="row"><div class="col-md-1"><a class="musPick"><i data-title-id="'.$id.'"  class="glyphicon glyphicon-unchecked ban" data-title="'.$data_post["title"].'" aria-hidden="true"></i></a></div>';
        if($data_post["status"] == 0){
            $sCode += " <div data-title-id='".$id."' data-title='".$data_post["title"]."' class='row_date musPick col-md-9 date_done' >".$data_post["date"]."</div></div>";
        }else{
            $sCode += " <div data-title-id='".$id."' data-title='".$data_post["title"]."' class='row_date musPick col-md-9 date_done_befor' >".$data_post["date"]."</div></div>";
        }

    }else{
        $sCode = '<div align="center">';
        $sCode += '<a class="musPick"><i class="glyphicon glyphicon-ban-circle chk" data-title-id="'.$id.'" data-title="'.$data_post["title"].'" aria-hidden="true"></i></a>';
        $sCode += '</div>';

    }
    echo $sCode ;*/
    //$this->index($data_post["year"]);

  }
  public function del_undecided()
  {
      $data_post = $this->input->post(NULL, TRUE);
      //echo json_encode($data_post["id"]);
      echo $this->case_table_model->del_undecided_tab($data_post["id"]);
  }
  public function del_case()
  {

    $data_post = $this->input->post(NULL, TRUE);
    //echo json_encode($data_post["id"]);
    echo $this->case_table_model->del_case_tab($data_post["id"]);

  }
}
?>
