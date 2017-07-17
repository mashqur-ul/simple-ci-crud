<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('company_model');
        $this->load->library(array('form_validation', 'encryption'));
    }

    public function index($data = NULL) {
        if (!isset($data['company_list'])) {
            $data['company_list'] = $this->company_model->get_company()->get_result();
        }
        $this->load->view('template/header');
        $this->load->view('template/home_content', $data);
        $this->load->view('template/footer');
    }

    public function view_add_form() {
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
            $_POST['logo'] = 'asset/uploads/' . $data['file_name'];
            return TRUE;
        } else {
            $this->session->set_flashdata('upload_error', $this->upload->display_errors());
            return FALSE;
        }
    }

    private function set_validation_rules() {
        $this->form_validation->set_rules('country', 'Country Name', 'required');
        $this->form_validation->set_rules('name', 'Company Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'numeric');
        $this->form_validation->set_rules('email', 'Email Address', 'valid_email');
    }

    public function add() {
        $this->set_validation_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->view_add_form();
        } else {
            if (($_FILES['logo']['size'] > 0) && ($this->upload_image() == TRUE)) {
                $this->company_model->set_data($this->input->post(NULL, TRUE))->insert();
                redirect();
            } else {
                $this->view_add_form();
            }
        }
    }

    public function view_detail($enc_id) {
        $id = $this->encryption->decrypt($enc_id);
        $data['company'] = $this->company_model->set_id($id)->get_company()->get_result();
        $this->load->view('template/header');
        $this->load->view('template/company_detail', $data);
        $this->load->view('template/footer');
    }

    public function view_edit_form($enc_id) {
        $id = $this->encryption->decrypt($enc_id);
        $data['company'] = $this->company_model->set_id($id)->get_company()->get_result();
        $this->load->view('template/header');
        $this->load->view('template/company_edit_form', $data);
        $this->load->view('template/footer');
    }

    public function update() {
        $this->set_validation_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->view_edit_form($this->input->post('update_id'));
        } else {
            if (($_FILES['logo']['size'] > 0) && ($this->upload_image() == FALSE)) {
                $this->view_edit_form($this->input->post('update_id'));
                return;
            }

            $data = $this->input->post(NULL, TRUE);
            $id = $this->encryption->decrypt($data['update_id']);
            unset($data['update_id']);
            $this->company_model->set_id($id)->set_data($data)->update();
            redirect();
        }
    }

    public function delete($enc_id) {
        $id = $this->encryption->decrypt($enc_id);
        $this->company_model->set_id($id)->delete();
        redirect();
    }

    public function search() {
        $param = $this->input->post(NULL, TRUE);

        if (!empty($param['search_name']) || !empty($param['search_country'])) {
            $data['company_list'] = $this->company_model->set_search_param($param)->search()->get_result();
            $data['search_option'] = $param;            
            $this->index($data);
        } else {
            $data['search_error'] = 'Country Name or Company Name is Required for Search !';
            $this->session->set_flashdata('search_error', 'Country Name or Company Name is Required for Search !');
            redirect();
        }
    }

}
