<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cost extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Cost_model');
        $this->load->model('Serial_number');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'cost/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'cost/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'cost/index.html';
            $config['first_url'] = base_url() . 'cost/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Cost_model->total_rows($q);
        $cost = $this->Cost_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'cost_data' => $cost,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'cost/cost_list',
            'judul' => 'Data Biaya',
        );
        $this->load->view('v_index', $data);
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('cost/create_action'),
	        'no_bill' => $this->Serial_number->make_no_bill(),
	        'no_delegation' => set_value('no_delegation'),
            'choach' => set_value('choach'),
            'detail' => set_value('detail'),
            'amount' => set_value('amount'),
            'descript' => set_value('descript'),
            'konten' => 'cost/cost_form',
            'judul' => 'Data Biaya',
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
                'no_bill' => $this->input->post('no_bill',TRUE),
		        'no_delegation' => $this->input->post('no_delegation',TRUE),
                'choach' => $this->input->post('choach',TRUE),
                'detail' => $this->input->post('detail',TRUE),
                'amount' => $this->input->post('amount',TRUE),
                'descript' => $this->input->post('descript',TRUE),
	        );
            $this->Cost_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('cost'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Cost_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('cost/update_action'),
		        'no_bill' => set_value('no_bill', $row->no_bill),
		        'no_delegation' => set_value('no_delegation', $row->no_delegation),
                'choach' => set_value('choach', $row->choach),
                'detail' => set_value('detail', $row->detail),
                'amount' => set_value('amount', $row->amount),
                'descript' => set_value('descript', $row->descript),
                'konten' => 'cost/cost_form',
                'judul' => 'Data Biaya',
	        );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cost'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no_bill', TRUE));
        } else {
            $data = array(
		        'no_delegation' => $this->input->post('no_delegation',TRUE),
                'choach' => $this->input->post('choach',TRUE),
                'detail' => $this->input->post('detail',TRUE),
                'amount' => $this->input->post('amount',TRUE),
                'descript' => $this->input->post('descript',TRUE),
	        );

            $this->Cost_model->update($this->input->post('no_bill', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('cost'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Cost_model->get_by_id($id);

        if ($row) {
            $this->Cost_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('cost'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cost'));
        }
    }

    public function _rules() 
    {
	    $this->form_validation->set_rules('no_delegation', 'no_delegation', 'trim|required');
        $this->form_validation->set_rules('choach', 'choach', 'trim|required');
        $this->form_validation->set_rules('detail', 'detail', 'trim|required');
        $this->form_validation->set_rules('amount', 'amount', 'trim|required');
        $this->form_validation->set_rules('descript', 'descript', 'trim|required');
	    $this->form_validation->set_rules('no_bill', 'no_bill', 'trim');
	    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file cost.php */