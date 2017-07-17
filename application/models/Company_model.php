<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @desc This model class is responsible for all crud operation of made to 
 *       table tbl_company_info
 * @author Md Mashqur Ul Alam <alam_rashu@yahoo.com>
 *  */
class Company_model extends CI_Model {

    /**
     * @var string database table name
     *  */
    private $tbl_name = 'tbl_company_info';

    /**
     * @var string database primary key
     *  */
    private $id = NULL;

    /**
     * @var mixed stores the output result
     *  */
    private $result = '';

    /**
     * @var mixed holds data for inserting or updating database
     *  */
    private $data = '';

    /**
     * @var string search parameter
     *  */
    private $search_country;

    /**
     * @var string search parameter
     *  */
    private $search_name;

    /**
     * @desc Set the value of the property $data
     * @param mixed $data 
     * @return object
     *  */
    public function set_data($data) {
        $this->data = $data;
        return $this;
    }

    /**
     * @desc Set the value of the property $id
     * @param mixed $id
     * @return object
     *  */
    public function set_id($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * @desc insert data into table
     *  */
    public function insert() {
        $this->db->insert($this->tbl_name, $this->data);
    }

    /**
     * @desc get company detail based on id property or all
     * @return object
     *  */
    public function get_company() {
        $this->db->select('*')->from($this->tbl_name);
        if ($this->id !== NULL) {
            $this->result = $this->db->where('id', $this->id)
                            ->where('status', 1)
                            ->get()->row();
        } else {
            $this->result = $this->db->where('status', 1)->get()->result();
        }

        return $this;
    }

    /**
     * @desc update company information into table
     *  */
    public function update() {
        $this->db->where('id', $this->id)->update($this->tbl_name, $this->data);
    }

    /**
     * @desc returns the result of CRUD Operation
     * @return mixed values of $result property
     *  */
    public function get_result() {
        return $this->result;
    }

    /**
     * @desc Update status to 0 in the database status field based on company id
     *  */
    public function delete() {
        $this->db->set('status', 0)->where('id', $this->id)->update($this->tbl_name);
    }

    /**
     * @desc set the properties required for search operation
     * @param array $params - search parameters
     * @return object
     *  */
    public function set_search_param($params) {
        if (is_array($params)) {
            $this->search_country = isset($params['search_country']) ? $params['search_country'] : NULL;
            $this->search_name = isset($params['search_name']) ? $params['search_name'] : NULL;
        }
        return $this;
    }

    /**
     * @desc Search and return company detail based on the search parameter
     * @return object
     *  */
    public function search() {
        $this->db->select('*')->from($this->tbl_name);

        if (isset($this->search_name) && !empty($this->search_name)) {
            $this->db->like('name', $this->search_name);
        }

        if (isset($this->search_country) && !empty($this->search_country)) {
            $this->db->where('country', $this->search_country);
        }

        $this->result = $this->db->where('status', '1')->get()->result();
        return $this;
    }

}
