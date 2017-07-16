<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Company_model extends CI_Model {

    private $tbl_name = 'tbl_company_info';
    private $id = NULL;
    private $result = '';
    private $data = '';

    
    public function set_data($data){
        $this->data = $data;
        return $this;
    }
    
    public function set_id($id){
        $this->id = $id;
        return $this;
    }
    

    public function insert() {               
        $this->db->insert($this->tbl_name, $this->data);
    }
    
    public function get_company(){
        $this->db->select('*')->from($this->tbl_name);
        if($this->id !== NULL){
            $this->result = $this->db->where('id', $this->id)
                                    ->where('status', 1)
                                    ->get()->row();
        }else{
            $this->result = $this->db->where('status', 1)->get()->result();
        }
        
        return $this;
    }
    
    public function update(){
       $this->db->where('id', $this->id)->update($this->tbl_name, $this->data);
    }
    
    public function get_result(){
        return $this->result;
    }
    
    public function delete(){
        $this->db->set('status', 0)->where('id', $this->id)->update($this->tbl_name);
    }

}
