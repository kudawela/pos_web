<?php

class Supplier  extends  CI_Controller
{
    public function view_supplier()
    {
        $this->load->view('supplier');
    }
    
    public function insert_supplier()
    {
        $this->load->model('Supplier_model');

        $this->form_validation->set_rules('supid', 'sup_id', 'required');
        $this->form_validation->set_rules('supname', 'Supname', 'required');
        $this->form_validation->set_rules('addline', 'add_line', 'required');
        $this->form_validation->set_rules('street', 'Street', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('postalcode', 'postal_code', 'required');
        $this->form_validation->set_rules('contactperson', 'contact_person', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');

        if ($this->form_validation->run())
        {
              $supid = $this->input->post('supid');
              $this->Supplier_model->get_data_by_id($supid);
            
            if (empty($this->Supplier_model->get_data_by_id($supid)))
                {
                  $this->Supplier_model->insert_supplier($_POST);
                  echo "insert successfully";
                }
                else
                {
                echo "error";
                }
        }  
        else 
        {
            echo json_encode($this->form_validation->error_array());
        }
    }
    
    public function delete_supplier($supid)
    {
        $this->load->model('Supplier_model');
        $this->Supplier_model->delete_supplier($supid);
    }

    public function update_supplier()
    {
        $this->load->model('Supplier_model');
        $this->Supplier_model->update_supplier
        ([
            'sup_name'=>'kamal',
            'add_line'=>'abcd',
            'street'=>'matara',
            'city'=>'pqrs',
            'postal_code'=>'12220',
            'contact_person'=>'arjun',
            'phone'=>'077569856'
        ],76);
        }
    
    
}