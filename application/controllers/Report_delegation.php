<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_delegation extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Report_del_model');
        $this->load->model('Serial_number');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'report_delegation/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'report_delegation/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'report_delegation/index.html';
            $config['first_url'] = base_url() . 'report_delegation/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Report_del_model->total_rows($q);
        $report_delegation = $this->Report_del_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'report_delegation_data' => $report_delegation,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'report_delegation/report_delegation_list',
            'judul' => 'Data Pendamping',
        );
        $this->load->view('v_index', $data);
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('report_delegation/create_action'),
	        'no_delegation' => $this->Serial_number->make_no_delegation(),
	        'champ_status' => set_value('champ_status'),
            'place_report' => set_value('place_report'),
            'date_report' => set_value('date_report'),
            'konten' => 'report_delegation/report_delegation_form',
            'judul' => 'Data Pendamping',
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
		        'champ_status' => $this->input->post('champ_status',TRUE),
                'place_report' => $this->input->post('place_report',TRUE),
                'date_report' => $this->input->post('date_report',TRUE),
	        );
            $this->Report_del_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('report_delegation'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Report_del_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('report_delegation/update_action'),
		        'no_delegation' => set_value('no_delegation', $row->no_delegation),
		        'champ_status' => set_value('champ_status', $row->champ_status),
                'place_report' => set_value('place_report', $row->place_report),
                'date_report' => set_value('date_report', $row->date_report),
                'konten' => 'report_delegation/report_delegation_form',
                'judul' => 'Data Pendamping',
	        );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('report_delegation'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no_delegation', TRUE));
        } else {
            $data = array(
		        'champ_status' => $this->input->post('champ_status',TRUE),
                'place_report' => $this->input->post('place_report',TRUE),
                'date_report' => $this->input->post('date_report',TRUE),
	        );

            $this->Report_del_model->update($this->input->post('no_delegation', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('report_delegation'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Report_del_model->get_by_id($id);

        if ($row) {
            $this->Report_del_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('report_delegation'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('report_delegation'));
        }
    }

    public function _rules()
    {
	    $this->form_validation->set_rules('champ_status', 'champ_status', 'trim|required');
        $this->form_validation->set_rules('place_report', 'place_report', 'trim|required');
        $this->form_validation->set_rules('date_report', 'date_report', 'trim|required');
	    $this->form_validation->set_rules('no_delegation', 'no_delegation', 'trim');
	    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file report_delegation.php */