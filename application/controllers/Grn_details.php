<?php

class Grn_details extends CI_controller 
{

    public function insert_grn_details()
    {


        $grnid = '45';
        $itmid = '122';
        $qunt = '0.04';
        $expDate = '17.12.17';
        $bns = '0.05';

        $this->load->model('grn_details_model');
        $this->load->model('grn_header_model');
        $a = $this->grn_header_model->select_data($grnid);
        print_r($a); //cause to print as an array.with else it prints "array()"
        //echo $a[0]->grn_id;//header id return


        if (!empty($a)) 
        {//to check that array is empty or not(empty() function)
            if ($a[0]->grn_id == $grnid)
            {
                $this->grn_details_model->insert_data
                ([
                    'grn_id' => $grnid,
                    'item_id' => $itmid,
                    'quantity' => $qunt,
                    'exp_date' => $expDate,
                    'bonus' => $bns
                ]);
            }
        } 
        else 
        {
            echo "invalid grn id";
        }
    }

}
?>

