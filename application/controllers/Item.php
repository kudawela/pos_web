

<?php

class Item extends CI_Controller 
{

    /**
    *   load form 
    */
    public function view_item() 
    {
    
        $this->load->view('item');
    }
    
    /**
    *  insert item
    */
       public function insert_item() 
    {
           
           
        
        $this->load->model('Item_model');
        
        //form validations
        
        $this->form_validation->set_rules('itemId', 'item_id', 'required|numeric');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('catId', 'cat_id', 'required|numeric');
        $this->form_validation->set_rules('unit', 'unit', 'required');
        $this->form_validation->set_rules('minQty', 'min_qty', 'required|numeric');
        $this->form_validation->set_rules('remark', 'remark', 'required');
        
        if ($this->form_validation->run()) 
        {
            //check item id is duplicate entry
            $resault = $this->Item_model->get_data($this->input->post('itemId'));
            
            //check array is empty
            if(empty($resault ))
            {
                $this->Item_model->insert_item($_POST);
                $this->_update_itemid();
                echo "insert successfully";
                
            }
            else
            {
                echo "Duplicate entry for item id";
            }
        }
        else
        {
            echo json_encode ($this->form_validation->error_array());
        }
    }

    /**
    *  delete item
    */
    public function delete_item($itemid)
    {
        $this->load->model('Item_model');
        $this->Item_model->delete_item($itemid);
    }
    
    /**
    *  update item
    */
    public function update_item()
    {
        $this->load->model('Item_model');
        $this->Item_model->update_item
            ([
              'name' => 'isanka',
              'cat_id' => '1',
              'unit' => '1',
              'remark' => 'good',
              'min_qty' => '5'
             ],56);
    }

    /**
    *  get relevent item id
    */
    public function get_itemid()
    {
        $this->load->model('Item_model');
        $a =  $this->Item_model->get_sys_id();
        $item_id = 0;
       
            if(!empty($a[0]['id_value']))
            {
                $item_id = $a[0]['id_value'] + 1;
            }
      
        return $item_id;
    /**
    *  this return value use to
    * 
    *  generate item code with model pop
    *  by kalpani 
    */
 
    }

    /**
    *  get all items in item table
    */
    public function get_all_items()
    {
        $this->load->model('Item_model');
        $v_data = $this->Item_model->get_all_items();
        echo count($v_data);
    }
    
    /**
    *  get one item in item table
    */
    public function get_item_by_id($id)
    {
       $this->load->model('Item_model');
        $v_data = $this->Item_model->get_item_by_id($id);
        print_r($v_data);
    }
    
     /**
    *  update item_id in system_id table after inserting
    */
    private function _update_itemid()
    {
        $value = $this->get_itemid();      
        $this->load->model('Item_model');
        $this->Item_model->update_itemid(['id_value' => $value],'item_id');
    }

}
