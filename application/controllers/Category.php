<?php

class Category extends CI_Controller 
{
/*cause to view category form*/
    public function view_category() 
    {
        $this->load->view('category');
    }

    /*insert category  to table category*/
    function insert_category() 
    {

        $this->load->model('Category_model');
        
        $this->form_validation->set_rules('catid', 'cat_id', 'trim|required');
        $this->form_validation->set_rules('catdesc', 'cat_desc', 'trim|required|max_length[200]');
        $this->form_validation->set_rules('catname', 'cat_name', 'trim|required|min_length[2]|max_length[200]');
        
         if($this->form_validation->run())
       {
          
            $catid = $this->input->post('catid');
            $this->Category_model->get_data_by_id($catid);
            
            if(empty($this->Category_model->get_data_by_id($catid)))
                {
                  $this->Category_model->insert_category($_POST);
                  echo "insert successfully";
                }
                else
                {
                echo "error";
                }
        }
        else
        {
           echo json_encode( $this->form_validation->error_array() );

        }
        
        //print_r ($_POST);
        
    }
    
     public function delete_category($cat_id)
    {
        $this->load->model('Category_model');
        $this->Category_model->delete_category($cat_id);
    }
    
     public function update_category()
    {
        $this->load->model('Category_model');
        $this->Category_model->update_category
        ([
            
            'cat_name'=>'lever',
            'cat_desc'=>'metal'
            
        ],7);
    }
    
     /**
    *  get relevent item id
    */
    public function get_category_id()
    {
        $this->load->model('Category_model');
        $a =  $this->Category_model->get_sys_id();
        $cat_id = 0;
       
            if(!empty($a[0]['id_value']))
            {
                $cat_id = $a[0]['id_value'] + 1;
            }
    
        return $cat_id;
    }
    
      /**
    *  get all items in category table
    */
    public function get_all_categorys()
    {
        $this->load->model('Category_model');
        $v_data = $this->Category_model->get_all_categorys();
        //print_r($v_data);
        //$this->load->view('category', $v_data);
        echo count($v_data);
    }
    
    /**
    *  get one item in item table
    */
    public function get_category_by_id($id)
    {
       $this->load->model('Category_model');
        $v_data = $this->Category_model->get_category_by_id($id);
        print_r($v_data);
    }
}
