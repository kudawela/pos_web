<?php


class grn_details_model extends CI_Model 
{
    function insert_data($data)
    {
        $this->db->insert('grn_details',$data);
    }
}