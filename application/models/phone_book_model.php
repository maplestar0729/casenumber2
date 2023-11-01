<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class phone_book_model extends CI_Model
{

    private function get_phoneBook_sql_set($SearchInfo, $user_array)
    {

        $this->db->select('*')
            ->from('phone_table')
            ->where($user_array);
        if ($SearchInfo["search"]) {
            $this->db->or_like("name", $SearchInfo["search"]);
            $this->db->or_like("unit", $SearchInfo["search"]);
            $this->db->or_like("cellphone", $SearchInfo["search"]);
            $this->db->or_like("phone", $SearchInfo["search"]);
        }
        if ($SearchInfo["sort"]) {
            $this->db->order_by($SearchInfo["sort"], $SearchInfo["order"]);
        } else {

            $this->db->order_by("OrderDate desc, date desc");
        }
    }

    private function get_phone_book_list($SearchInfo, $user_array)
    {
        $this->get_phoneBook_sql_set($SearchInfo, $user_array);
        $total = $this->db->count_all_results();

        $this->get_phoneBook_sql_set($SearchInfo, $user_array);

        if ($SearchInfo["offset"] != null) {

            $this->db->limit($SearchInfo["limit"], $SearchInfo["offset"]);
        }
        $rows = $this->db->get()->result_array();
        $rtn["total"] = $total;
        $rtn["rows"] = $rows;
        return $rtn;
    }

    public function get_phoneBook_List($SearchInfo, $user_id = "")
    {

        $user_array = array('belongMember' => $user_id);
        return $this->get_phone_book_list($SearchInfo, $user_array);
    }

    // public function get_phoneBook_My_List($SearchInfo, $user_id)
    // {

    //     $user_array = array('belongMember' => $user_id);
    //     return $this->get_phone_book_list($SearchInfo, $user_array);
    // }

    public function get_phoneBook($NO)
    {

        $sch_array = array('NO' => $NO);
        $this->db->select('*')
            ->from('phone_table')
            ->where($sch_array);
        return $this->db->get()->result_array();
    }

    public function update_phoneBook($data_info)
    {

        try
        {
            $ans = $this->db->where('NO', $data_info['NO'])->update('phone_table', $data_info);

        } catch (Exception $e) {
            $ans = false;
        }
        return $ans;
    }

    public function create_phone($data)
    {

        try
        {
            $ans = $this->db->insert('phone_table', $data);

        } catch (Exception $e) {
            $ans = false;
        }
        return $ans;
    }

    public function del_phoneBook($NO)
    {

        $sch_array = array('NO' => $NO);
        try
        {
            $ans = $this->db->delete('phone_table', $sch_array);
        } catch (Exception $e) {
            $ans = false;
        }

        return $ans;
    }



    public function get_phoneBook_class()
    {
        
        $this->db->select('*')
            ->from('phonebook_class');
        return $this->db->get()->result_array();
    }
}
