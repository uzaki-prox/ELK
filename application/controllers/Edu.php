<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Edu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Edu_model');
        $this->load->model('Serial_number');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'edu/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'edu/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'edu/index.html';
            $config['first_url'] = base_url() . 'edu/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Edu_model->total_rows($q);
        $edu = $this->Edu_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'edu_data' => $edu,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'edu/edu_list',
            'judul' => 'Data Pendidikan',
        );
        $this->load->view('v_index', $data);
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('edu/create_action'),
	        'id_edu' => $this->Serial_number->make_id_edu(),
	        'name_edu' => set_value('name_edu'),
            'konten' => 'edu/edu_form',
            'judul' => 'Data Pendidikan',
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
                'id_edu' => $this->input->post('id_edu',TRUE),
		        'name_edu' => $this->input->post('name_edu',TRUE),
	        );
            $this->Edu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('edu'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Edu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('edu/update_action'),
		        'id_edu' => set_value('id_edu', $row->id_edu),
		        'name_edu' => set_value('name_edu', $row->name_edu),
                'konten' => 'edu/edu_form',
                'judul' => 'Data Pendidikan',
	        );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('edu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_edu', TRUE));
        } else {
            $data = array(
		'name_edu' => $this->input->post('name_edu',TRUE),
	    );

            $this->Edu_model->update($this->input->post('id_edu', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('edu'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Edu_model->get_by_id($id);

        if ($row) {
            $this->Edu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('edu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('edu'));
        }
    }

    public function _rules() 
    {
	    $this->form_validation->set_rules('name_edu', 'name_edu', 'trim|required');
	    $this->form_validation->set_rules('id_edu', 'id_edu', 'trim');
	    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file edu.php */