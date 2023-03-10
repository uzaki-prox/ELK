<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contest_model extends CI_Model
{

    public $table = 'contest';
    public $id = 'no_contest';
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
        $this->db->like('no_contest', $q);
	$this->db->or_like('name_contest', $q);
	$this->db->or_like('kind_contest', $q);
	$this->db->or_like('quota_partisipant', $q);
	$this->db->or_like('contest_level', $q);
    $this->db->or_like('institution', $q);
    $this->db->or_like('address', $q);
    $this->db->or_like('contact_person', $q);
    $this->db->or_like('tlp_cp', $q);
    $this->db->or_like('time_contest', $q);
    $this->db->or_like('time_tm', $q);
    $this->db->or_like('place_contest', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('no_contest', $q);
	$this->db->or_like('name_contest', $q);
	$this->db->or_like('kind_contest', $q);
	$this->db->or_like('quota_partisipant', $q);
	$this->db->or_like('contest_level', $q);
    $this->db->or_like('institution', $q);
    $this->db->or_like('address', $q);
    $this->db->or_like('contact_person', $q);
    $this->db->or_like('tlp_cp', $q);
    $this->db->or_like('time_contest', $q);
    $this->db->or_like('time_tm', $q);
    $this->db->or_like('place_contest', $q);
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

/* End of file pengaduan_model.php */
/* Location: ./application/models/pengaduan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-03 15:15:51 */
/* http://harviacode.com */