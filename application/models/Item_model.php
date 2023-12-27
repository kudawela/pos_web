<?php

class Item_model extends CI_Model 
{

     function insert_item($data)
    {
        $db_data = array
        (
            'item_id' => $data['itemId'],
            'name' => $data['name'],
            'cat_id' => $data['catId'],
            'unit' => $data['unit'],
            'remark' => $data['remark'],
            'min_qty' => $data['minQty']
        );

        /* isert item by defining table */
        $this->db->insert('item', $db_data);
    }
    
    public function delete_item($itemid)
    {
        $this->db->where(['item_id'=>$itemid]);
        $this->db->delete('item');
    }
    
    public function update_item($data,$id)
    {
        $this->db->where(['item_id'=>$id]);
        $this->db->update('item', $data);
    }
    
    public function get_data($id)
    {
        $this->db->where(['item_id' => $id]);
        $resault = $this->db->get('item');
        return $resault->result();
    }
    /**
    *  relevent to system id table
    */
    public function get_sys_id()
    {
        $this->db->where(['id_name' => 'item_id']);
        $result = $this->db->get('system_id');
        return $result->result_array();
    }
    
    public function get_all_items()
    {
    	$result = $this->db->query("SELECT * FROM item");
        return $result->result_array();
    }
    
    public function get_item_by_id($id)
    {
    	$result = $this->db->where(['item_id' => $id]);
        $result = $this->db->get('item');
        return $result->result_array();
    }
    
    /**
    *  relevent to system id table
    */
    public function update_itemid($data,$id)
    {
        $this->db->where(['id_name' => $id]);
        $this->db->update('system_id', $data);
        
    }
    
}
