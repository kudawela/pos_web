<?php

class Category_model extends CI_Model 
{
    /* model to insert category */

    public function insert_category($data)
    {
        $db_data = array
        (
            'cat_id' => $data['catid'],
            'cat_name' => $data['catname'],
            'cat_desc' => $data['catdesc']
        );


        $this->db->insert('category', $db_data);
    }

    public function delete_category($cat_id) 
    {
        $this->db->where(['cat_id' => $cat_id]);
        $this->db->delete('category');
    }

    public function update_category($data, $id) 
    {
        $this->db->where(['cat_id' => $id]);
        $this->db->update('category', $data);
    }
    
    /*check duplicate cat_id */
    
    public function get_data_by_id($catid) 
    
    {
             $this->db->where(['cat_id' => $catid]);
             $result = $this->db->get('category');
             return $result->result();
    
        
    }
    
    public function get_sys_id()
    {
        $this->db->where(['id_name' => 'category_id']);
        $result = $this->db->get('system_id');
        return $result->result_array();
    }
    
    public function get_all_categorys()
    {
    	$result = $this->db->get('category');
        return $result->result_array();
    }
    
    public function get_category_by_id($id)
    {
    	$this->db->where(['cat_id' => $id]);
        $result = $this->db->get('category');
        return $result->result_array();
    }

}
