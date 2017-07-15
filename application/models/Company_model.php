<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Company_model extends CI_Model {

    private $tbl_name = 'tbl_company_info';
    private $id = NULL;
    private $result = '';
    private $data;

    
    public function set_data($data){
        $this->data = $data;
        return $this;
    }
    

    public function insert() {               
        $this->db->insert($this->tbl_name, $this->data);
    }
    
    public function get_company(){
        $this->db->select('*')->from($this->tbl_name);
        if($this->id !== NULL){
            $this->result = $this->db->where('id', $this->id)
                                    ->get()->row();
        }else{
            $this->result = $this->db->get()->result();
        }
        
        return $this;
    }
    
    public function update(){
        $field_name = array('');
        $data = $this->input->post($field_name, TRUE);
        
    }
    
    public function get_result(){
        return $this->result;
    }
    
    

}
