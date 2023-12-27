<?php

class Customer_model extends CI_Model 
{

    public function insert_customer($data) 
    {
        /* define database and table */

        $db_data = array
        (
            'cus_id' => $data['cusid'],
            'name' => $data['name'],
            'contact' => $data['contact'],
            'address_line1' => $data['adrs'],
            'city' => $data['city'],
            'street' => $data['street'],
            'postal_code' => $data['postalcode'],
            'credit_limit' => $data['credlimit']
        );

        $this->db->insert('customer',  $db_data);
    }

    public function delete_customer($cus_id) 
    {
        $this->db->where(['cus_id' => $cus_id]);
        $this->db->delete('customer');
    }
    
    public function update_customer($data,$id)
    {
        $this->db->where(['cus_id'=>$id]);
         $this->db->update('customer', $data);
    }
    
     public function get_data_by_id($cusid) 
    {
        $this->db->where(['cus_id' => $cusid]);
        $result = $this->db->get('customer');
        return $result->result();    
    }


}
