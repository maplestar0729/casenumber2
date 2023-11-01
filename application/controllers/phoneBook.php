<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class phoneBook extends Phone_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('phone_book_model');
    }

    private function get_bookType()
    {

        return $this->session->userdata('bookType');
    }

    public function index()
    {
        $session_data["bookType"] = "bookPublic";
        $this->session->set_userdata($session_data);

        $data["book_class"] = $this->phone_book_model->get_phoneBook_class();

        $data["page_title"] = "事務所電話簿";
        $this->template("index", $data);
    }

    public function myBook()
    {
        $session_data["bookType"] = "bookPrivate";
        $this->session->set_userdata($session_data);

        $bookType = $this->get_bookType();
        $data["book_class"] = $this->phone_book_model->get_phoneBook_class();

        $user_name = $this->session->userdata('case_number')["user_name"];
        $data["page_title"] = $user_name . "電話簿";
        $this->template("index", $data);

    }

    public function get_phoneBook_list()
    {
        $SearchInfo["order"] = $this->input->get("order", true);
        $SearchInfo["limit"] = $this->input->get("limit", true);
        $SearchInfo["offset"] = $this->input->get("offset", true);
        $SearchInfo["sort"] = $this->input->get("sort", true);
        $SearchInfo["search"] = $this->input->get("search", true);
        // echo json_encode($SearchInfo);
        $bookType = $this->get_bookType();
        switch ($bookType) {
            case "bookPrivate":
                $user_id = $this->session->userdata('case_number')["user_id"];
                break;
            case "bookPublic":
            default:
                $user_id = "";
                break;
        }
        $rtn = $this->phone_book_model->get_phoneBook_List($SearchInfo, $user_id);
        echo json_encode($rtn);
    }

    // public function get_phoneBook_My_list()
    // {
    //     $SearchInfo["order"] = $this->input->get("order", true);
    //     $SearchInfo["limit"] = $this->input->get("limit", true);
    //     $SearchInfo["offset"] = $this->input->get("offset", true);
    //     $SearchInfo["sort"] = $this->input->get("sort", true);
    //     $SearchInfo["search"] = $this->input->get("search", true);
    //     // echo json_encode($SearchInfo);
    //     $user_id = $this->session->userdata('case_number')["user_id"];
    //     $rtn = $this->phone_book_model->get_phoneBook_My_list($SearchInfo, $user_id);
    //     echo json_encode($rtn);
    // }

    public function create_phone()
    {

        $stnDataInfo["class"] = $this->input->post("class", true);
        $stnDataInfo["unit"] = $this->input->post("unit", true);
        $stnDataInfo["name"] = $this->input->post("name", true);
        $stnDataInfo["cellphone"] = $this->input->post("cellphone", true);
        $stnDataInfo["phone"] = $this->input->post("phone", true);
        $stnDataInfo["phone2"] = $this->input->post("phone2", true);
        $stnDataInfo["fax"] = $this->input->post("fax", true);
        $stnDataInfo["mail"] = $this->input->post("mail", true);
        $stnDataInfo["address"] = $this->input->post("address", true);
        $stnDataInfo["date"] = date('Y-m-j');
        $stnDataInfo["OrderDate"] = date("Y-m-d H:i:s");
        $bookType = $this->get_bookType();
        switch ($bookType) {
            case "bookPrivate":
                $rtnUrl = "myBook";
                break;
            case "bookPublic":
            default:
                $rtnUrl = "";
                break;
        }
        $rtn = $this->phone_book_model->create_phone($stnDataInfo);

        if ($rtn) {

            echo "<script>";
            echo "alert(\"OK\");";
            echo "location.href ='" . base_url('phoneBook/' . $rtnUrl) . "'";
            echo "</script>";
        } else {

            echo "<script>";
            echo "alert(\"FAIL\");";
            //redirect(base_url('login/creat_user'));
            echo "location.href ='" . base_url('phoneBook/' . $rtnUrl) . "'";
            echo "</script>";
        }
    }

    public function update_phone()
    {
        $stnDataInfo["NO"] = $this->input->post("NO", true);
        $stnDataInfo["class"] = $this->input->post("class", true);
        $stnDataInfo["unit"] = $this->input->post("unit", true);
        $stnDataInfo["name"] = $this->input->post("name", true);
        $stnDataInfo["cellphone"] = $this->input->post("cellphone", true);
        $stnDataInfo["phone"] = $this->input->post("phone", true);
        $stnDataInfo["phone2"] = $this->input->post("phone2", true);
        $stnDataInfo["fax"] = $this->input->post("fax", true);
        $stnDataInfo["mail"] = $this->input->post("mail", true);
        $stnDataInfo["address"] = $this->input->post("address", true);
        // $stnDataInfo["date"] = date('Y-m-j');
        // $stnDataInfo["OrderDate"] = date("Y-m-d H:i:s");
        $bookType = $this->get_bookType();
        switch ($bookType) {
            case "bookPrivate":
                $rtnUrl = "myBook";
                break;
            case "bookPublic":
            default:
                $rtnUrl = "";
                break;
        }
        // echo json_encode($stnDataInfo);
        $rtn = $this->phone_book_model->update_phoneBook($stnDataInfo);

        if ($rtn) {

            echo "<script>";
            echo "alert(\"OK\");";
            echo "location.href ='" . base_url('phoneBook/' . $rtnUrl) . "'";
            echo "</script>";
        } else {

            echo "<script>";
            echo "alert(\"FAIL\");";
            //redirect(base_url('login/creat_user'));
            echo "location.href ='" . base_url('phoneBook/' . $rtnUrl) . "'";
            echo "</script>";
        }
    }
    public function update_orderdate()
    {

        $NO = $this->input->post("NO", true);

        $stn_data_info["NO"] = $NO;
        $stn_data_info["OrderDate"] = date("Y-m-d H:i:s");
        $bookType = $this->get_bookType();
        switch ($bookType) {
            case "bookPrivate":
                $rtnUrl = "myBook";
                break;
            case "bookPublic":
            default:
                $rtnUrl = "";
                break;
        }
        $rtn = $this->phone_book_model->update_phoneBook($stn_data_info);
        echo json_encode($rtn);
    }

    public function del_phoneBook()
    {

        $NO = $this->input->post("NO", true);

        $rtn = $this->phone_book_model->del_phoneBook($NO);
        $bookType = $this->get_bookType();
        switch ($bookType) {
            case "bookPrivate":
                $rtnUrl = "myBook";
                break;
            case "bookPublic":
            default:
                $rtnUrl = "";
                break;
        }
        if ($rtn) {

            echo "<script>";
            echo "location.href ='" . base_url('phoneBook/' . $rtnUrl) . "'";
            echo "</script>";
        } else {

            echo "<script>";
            echo "alert(\"FAIL\");";
            //redirect(base_url('login/creat_user'));
            echo "location.href ='" . base_url('phoneBook/' . $rtnUrl) . "'";
            echo "</script>";
        }
    }

    public function test()
    {
        $prt = $this->session->userdata('case_number');
        echo json_encode($prt);
    }

}
