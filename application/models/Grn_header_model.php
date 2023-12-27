<?php

class grn_header_model extends CI_Model 
{

    function insert_data($data)
    {
        $this->db->insert('grn_header', $data);
    }

    /* method to check equality of grn id in grndetails and grnheader */

    function select_data($grnid) 
    {
        $this->db->where
        ([
            'grn_id' => $grnid
        ]);

        $resault = $this->db->get('grn_header');
        return $resault->result();
    }

}
