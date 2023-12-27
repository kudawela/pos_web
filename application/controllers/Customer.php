<?php

class Customer extends CI_Controller 
{

    public function view_customer()
    {
        $this->load->view('customer');
    }

    public function insert_customer()
    {


        /* load model and insert data, display field names */
        $this->load->model('Customer_model');

        $this->form_validation->set_rules('cusid', 'cus_id', 'trim|required|numeric');
        $this->form_validation->set_rules('name', 'cus_name', 'trim|required');
        $this->form_validation->set_rules('contact', 'contact', 'trim|required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('adrs', 'address', 'trim|required');
        $this->form_validation->set_rules('city', 'city', 'trim|required');
        $this->form_validation->set_rules('street', 'street', 'trim|required');
        $this->form_validation->set_rules('postalcode', 'postal_code', 'trim|required');
        $this->form_validation->set_rules('credlimit', 'credit_limit', 'trim|numeric|required');
        
        if($this->form_validation->run())
        {
          
            $cusid = $this->input->post('cusid');
            $this->Customer_model->get_data_by_id($cusid);
            
            if(empty($this->Customer_model->get_data_by_id($cusid)))
            {
                $this->Customer_model->insert_customer($_POST);
                echo "insert successfully";
            }
            else
            {
                echo "Duplicate entry for customer id";
            }
        }
        else
        {
           echo json_encode( $this->form_validation->error_array() );

        }


    }

    public function delete_customer($cus_id)
    {
        $this->load->model('Customer_model');
        $this->Customer_model->delete_customer($cus_id);
    }
    
    public function update_customer()
    {
        $this->load->model('Customer_model');
        $this->Customer_model->update_customer
        ([
            'name'=>'thiwanka',
            'contact'=>'0712564897',
            'address_line1'=>'good',
            'city'=>'nuwara',
            'street'=>'street road',
            'postal_code'=>'5',
            'credit_limit'=>'500'
        ],87);
    }

}
