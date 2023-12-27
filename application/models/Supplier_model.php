<?php

class Supplier_model  extends  CI_Model
{
    public function insert_supplier($data)
    {
         
        $db_data=array
        (
            'sup_id'=>$data['supid'],
            'sup_name'=>$data['supname'],
            'add_line'=>$data['addline'],
            'street'=>$data['street'],
            'city'=>$data['city'],
            'postal_code'=>$data['postalcode'],
            'contact_person'=>$data['contactperson'],
            'phone'=>$data['phone']
        );
        $this->db->insert('supplier', $db_data);
    }
    
    public function delete_supplier($supid)
    {
        $this->db->where(['sup_id' => $supid]);
        $this->db->delete('supplier');
    }

    public function update_supplier($data, $id)
    {
        $this->db->where(['sup_id' => $id]);
        $this->db->update('supplier', $data);
    }
    
    public function get_data_by_id($supid) 
    {
        $this->db->where(['sup_id' => $supid]);
        $result = $this->db->get('supplier');
        return $result->result();
    }
    
}