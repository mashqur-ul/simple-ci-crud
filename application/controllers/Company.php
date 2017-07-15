<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->model('company_model');
        $this->load->library('form_validation');
    }
    
    public function index(){
        $data['company_list'] = $this->company_model->get_company()->get_result();
        $this->load->view('template/header');
        $this->load->view('template/home_content', $data);
        $this->load->view('template/footer');
    }
    
    public function view_add_form(){
        $this->load->view('template/header');
        $this->load->view('template/company_add_form');
        $this->load->view('template/footer');
    }
    
    private function upload_image() {
        $config['upload_path'] = './asset/uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('logo')) {
            $data = $this->upload->data();
            $_POST['logo'] = 'asset/uploads/'.$data['file_name'];
            return TRUE;
        }else{
            $data['error'] = $this->upload->display_errors();
            $this->load->view('template/header');
            $this->load->view('template/company_add_form', $data);
            $this->load->view('template/footer');
            return FALSE;
        }
    }
    
    public function add(){
        $this->form_validation->set_rules('country','Country Name', 'required');
        $this->form_validation->set_rules('name','Company Name', 'required');
        $this->form_validation->set_rules('phone','Phone Number', 'numeric');
        $this->form_validation->set_rules('email','Email Address', 'valid_email');
        
        if($this->form_validation->run() == FALSE){
            $this->view_add_form();
        }else{
            if(($_FILES['logo']['size'] > 0) && ($this->upload_image() == TRUE)){
                $this->company_model->set_data($this->input->post(NULL, TRUE))->insert();
            }
        }
        
    }
}
