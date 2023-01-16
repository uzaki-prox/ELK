<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sub_delegation_model extends CI_Model
{

    public $table = 'submission_delegation';
    public $id = 'no_delegation';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('no_delegation', $q);
	    $this->db->or_like('id_unit', $q);
        $this->db->or_like('choach', $q);
	    $this->db->or_like('no_contest', $q);
	    $this->db->or_like('edu_level', $q);
        $this->db->or_like('amount_partisipant', $q);
        $this->db->or_like('expectation', $q);
        $this->db->or_like('place_delegation', $q);
        $this->db->or_like('date_delegation', $q);
	    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('no_delegation', $q);
        $this->db->or_like('id_unit', $q);
	    $this->db->or_like('choach', $q);
	    $this->db->or_like('no_contest', $q);
	    $this->db->or_like('edu_level', $q);
        $this->db->or_like('amount_partisipant', $q);
        $this->db->or_like('expectation', $q);
        $this->db->or_like('place_delegation', $q);
        $this->db->or_like('date_delegation', $q);
	    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Tamu_psb_model.php */
/* Location: ./application/models/Tamu_psb_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-14 04:12:27 */
/* http://harviacode.com */