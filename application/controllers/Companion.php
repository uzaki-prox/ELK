<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Companion extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Companion_model');
        $this->load->model('Serial_number');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'companion/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'companion/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'companion/index.html';
            $config['first_url'] = base_url() . 'companion/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Companion_model->total_rows($q);
        $companion = $this->Companion_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'companion_data' => $companion,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'companion/companion_list',
            'judul' => 'Data Pendamping',
        );
        $this->load->view('v_index', $data);
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('companion/create_action'),
	        'id_companion' => $this->Serial_number->make_id_companion(),
	        'no_delegation' => set_value('no_delegation'),
            'no_contest' => set_value('no_contest'),
            'niy' => set_value('niy'),
            'descript' => set_value('descript'),
            'konten' => 'companion/companion_form',
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
                'id_companion' => $this->input->post('id_companion',TRUE),
		        'no_delegation' => $this->input->post('no_delegation',TRUE),
                'no_contest' => $this->input->post('no_contest',TRUE),
                'niy' => $this->input->post('niy',TRUE),
                'descript' => $this->input->post('descript',TRUE),
	        );
            $this->Companion_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('companion'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Companion_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('companion/update_action'),
		        'id_companion' => set_value('id_companion', $row->id_companion),
		        'no_delegation' => set_value('no_delegation', $row->no_delegation),
                'no_contest' => set_value('no_contest', $row->no_contest),
                'niy' => set_value('niy', $row->niy),
                'descript' => set_value('descript', $row->descript),
                'konten' => 'companion/companion_form',
                'judul' => 'Data Pendamping',
	        );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('companion'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_companion', TRUE));
        } else {
            $data = array(
		        'no_delegation' => $this->input->post('no_delegation',TRUE),
                'no_contest' => $this->input->post('no_contest',TRUE),
                'niy' => $this->input->post('niy',TRUE),
                'descript' => $this->input->post('descript',TRUE),
	        );

            $this->Companion_model->update($this->input->post('id_companion', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('companion'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Companion_model->get_by_id($id);

        if ($row) {
            $this->Companion_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('companion'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('companion'));
        }
    }

    public function _rules() 
    {
	    $this->form_validation->set_rules('no_delegation', 'no_delegation', 'trim|required');
        $this->form_validation->set_rules('no_contest', 'no_contest', 'trim|required');
        $this->form_validation->set_rules('niy', 'niy', 'trim|required');
        $this->form_validation->set_rules('descript', 'descript', 'trim|required');
	    $this->form_validation->set_rules('id_companion', 'id_companion', 'trim');
	    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file companion.php */