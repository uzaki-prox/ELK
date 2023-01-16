<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sub_delegation extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sub_delegation_model');
        $this->load->model('Serial_number');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'sub_delegation/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sub_delegation/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sub_delegation/index.html';
            $config['first_url'] = base_url() . 'sub_delegation/index.html';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Sub_delegation_model->total_rows($q);
        $sub_del = $this->Sub_delegation_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sub_del_data' => $sub_del,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'sub_delegation/sub_delegation_list',
            'judul' => 'Pengajuan Lomba',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Sub_delegation_model->get_by_id($id);
        if ($row) {
            $data = array(
		    'no_delegation' => $row->no_delegation,
            'id_unit' => $row->id_unit,
		    'choach' => $row->choach,
		    'no_contest' => $row->no_contest,
		    'edu_level' => $row->edu_level,
            'amount_partisipant' => $row->amount_partisipant,
            'expectiation' => $row->expectation,
            'place_delegation' => $row->place_delegation,
            'date_delegation' => $row->date_delegation,
	        );
            $this->load->view('sub_delegation/sub_delegation_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sub_delegation'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sub_delegation/create_action'),
	        'no_delegation' => $this->Serial_number->make_no_delegation(),
            'id_unit' => set_value('id_unit'),
	        'choach' => set_value('choach'),
	        'no_contest' => set_value('no_contest'),
	        'edu_level' => set_value('edu_level'),
            'amount_partisipant' => set_value('amount_partisipant'),
            'expectation' => set_value('expectation'),
            'place_delegation' => set_value('place_delegation'),
            'date_delegatin' => set_value('date_delegation'),
            'konten' => 'sub_delegation/sub_delegation_form',
            'judul' => 'Pengajuan Lomba',
	    );
        $this->load->view('v_index', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'no_delegation' => $this->input->post('no_delegation',TRUE),
                'id_unit' => $this->input->post('id_unit',TRUE),
		    'choach' => $this->input->post('choach',TRUE),
		    'no_contest' => $this->input->post('no_contest',TRUE),
		    'edu_level' => $this->input->post('edu_level',TRUE),
            'amount_partisipant' => $this->input->post('amount_partisipant',TRUE),
            'expectation' => $this->input->post('expectation',TRUE),
            'place_delegation' => $this->input->post('place_delegation',TRUE),
            'date_delegation' => $this->input->post('date_delegation',TRUE),
	        );
            $this->Sub_delegation_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sub_delegation'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Sub_delegation_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sub_delegation/update_action'),
		        'no_delegation' => set_value('no_delegation', $row->no_delegation),
                'id_unit' => set_value('id_unit', $row->id_unit),
		        'choach' => set_value('choach', $row->choach),
		        'no_contest' => set_value('no_contest', $row->no_contest),
		        'edu_level' => set_value('edu_level', $row->edu_level),
                'amount_partisipant' => set_value('amount_partisipant', $row->amount_partisipant),
                'expectation' => set_value('expectation', $row->expectation),
                'place_delegation' => set_value('place_delegation', $row->place_delegation),
                'date_delegatin' => set_value('date_delegation', $row->date_delegation),
                'konten' => 'sub_delegation/sub_delegation_form',
                'judul' => 'Pengajuan Lomba',
	        );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sub_delegation'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no_delegation', TRUE));
        } else {
            $data = array(
                'id_unit' => $this->input->post('id_unit',TRUE),
		'choach' => $this->input->post('choach',TRUE),
		'no_contest' => $this->input->post('no_contest',TRUE),
		'edu_level' => $this->input->post('edu_level',TRUE),
        'amount_partisipant' => $this->input->post('amount_partisipant',TRUE),
        'expectation' => $this->input->post('expectation',TRUE),
            'place_delegation' => $this->input->post('place_delegation',TRUE),
            'date_delegation' => $this->input->post('date_delegation',TRUE),
	    );

            $this->Sub_delegation_model->update($this->input->post('no_delegation', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sub_delegation'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Sub_delegation_model->get_by_id($id);

        if ($row) {
            $this->Sub_delegation_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sub_delegation'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sub_delegation'));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('id_unit', 'Unit', 'trim|required');
	    $this->form_validation->set_rules('choach', 'Pembimbing', 'trim|required');
	    $this->form_validation->set_rules('no_contest', 'Lomba', 'trim|required');
	    $this->form_validation->set_rules('edu_level', 'Strata Pendidikan', 'trim|required');
        $this->form_validation->set_rules('amount_partisipant', 'Jumlah Peserta', 'trim|required');
        $this->form_validation->set_rules('expectation', 'Ekspektasi', 'trim|required');
        $this->form_validation->set_rules('place_delegation', 'Tempat Lomba', 'trim|required');
        $this->form_validation->set_rules('date_delegation', 'Tanngal Lomba', 'trim|required');
	    $this->form_validation->set_rules('no_delegation', 'No Delegasi', 'trim');
	    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
