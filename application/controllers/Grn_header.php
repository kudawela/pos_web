<?php

class grn_header extends CI_controller 
{

    public function view_grn_header() 
    {
        $this->load->view('grnHeader');
    }

    public function insert_grn_header() 
    {

        $grnid = '00041';
        $rcptno = 'IS1112';
        $spid = '76';
        $grnDate = '17.12.03';
        $remrk = 'abce';

        $this->load->model('grn_header_model');
        $this->grn_header_model->insert_data
        ([
            'grn_id' => $grnid,
            'recipt_no' => $rcptno,
            'sup_id' => $spid,
            'grn_date' => $grnDate,
            'remark' => $remrk
        ]);
    }

}

?>
