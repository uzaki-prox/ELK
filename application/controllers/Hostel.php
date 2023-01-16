<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hostel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Hostel_model');
        $this->load->model('Serial_number');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'hostel/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'hostel/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'hostel/index.html';
            $config['first_url'] = base_url() . 'hostel/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Hostel_model->total_rows($q);
        $hostel = $this->Hostel_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'hostel_data' => $hostel,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'hostel/hostel_list',
            'judul' => 'Data Asrama',
        );
        $this->load->view('v_index', $data);
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('hostel/create_action'),
	        'id_hostel' => $this->Serial_number->make_id_hostel(),
	        'name_hostel' => set_value('name_hostel'),
            'responsible' => set_value('responsible'),
            'konten' => 'hostel/hostel_form',
            'judul' => 'Data Asrama',
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
                'id_hostel' => $this->input->post('id_hostel',TRUE),
		        'name_hostel' => $this->input->post('name_hostel',TRUE),
                'responsible' => $this->input->post('responsible',TRUE),
	        );
            $this->Hostel_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('hostel'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Hostel_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('hostel/update_action'),
		        'id_hostel' => set_value('id_hostel', $row->id_hostel),
		        'name_hostel' => set_value('name_hostel', $row->name_hostel),
                'responsible' => set_value('responsible', $row->responsible),
                'konten' => 'hostel/hostel_form',
                'judul' => 'Data Asrama',
	        );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hostel'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_hostel', TRUE));
        } else {
            $data = array(
		        'name_hostel' => $this->input->post('name_hostel',TRUE),
                'responsible' => $this->input->post('responsible',TRUE),
	        );

            $this->Hostel_model->update($this->input->post('id_hostel', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('hostel'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Hostel_model->get_by_id($id);

        if ($row) {
            $this->Hostel_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('hostel'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hostel'));
        }
    }

    public function _rules() 
    {
	    $this->form_validation->set_rules('name_hostel', 'name_hostel', 'trim|required');
        $this->form_validation->set_rules('responsible', 'responsible', 'trim|required');
	    $this->form_validation->set_rules('id_hostel', 'id_hostel', 'trim');
	    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file hostel.php */