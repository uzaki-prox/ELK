<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'users/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'users/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'users/index.html';
            $config['first_url'] = base_url() . 'users/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Users_model->total_rows($q);
        $users = $this->Users_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'users_data' => $users,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'users/users_list',
            'judul' => 'Data User',
        );
        $this->load->view('v_index', $data);
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('users/create_action'),
	        'niy' => set_value('niy'),
	        'name' => set_value('name'),
	        'gender' => set_value('gender'),
            'unit' => set_value('unit'),
	        'password' => set_value('password'),
	        'role' => set_value('role'),
            'konten' => 'users/users_form',
            'judul' => 'Data User',
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
                'niy' => $this->input->post('niy',TRUE),
		        'name' => $this->input->post('name',TRUE),
		        'gender' => $this->input->post('gender',TRUE),
                'unit' => $this->input->post('unit',TRUE),
		        'password' => md5($this->input->post('password',TRUE)),
		        'role' => $this->input->post('role',TRUE),
	        );
            $this->Users_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('users'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('users/update_action'),
		        'niy' => set_value('niy', $row->niy),
		        'name' => set_value('name', $row->name),
		        'gender' => set_value('gender', $row->gender),
                'unit' => set_value('unit', $row->unit),
		        'password' => set_value('password', $row->password),
		        'role' => set_value('role', $row->role),
                'konten' => 'users/users_form',
                'judul' => 'Data User',
	        );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('niy', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'gender' => $this->input->post('gender',TRUE),
        'unit' => $this->input->post('unit',TRUE),
		'password' => $this->input->post('password',TRUE),
		'role' => $this->input->post('role',TRUE),
	    );

            $this->Users_model->update($this->input->post('niy', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('users'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $this->Users_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function _rules() 
    {
	    $this->form_validation->set_rules('name', 'name', 'trim|required');
	    $this->form_validation->set_rules('gender', 'gender', 'trim|required');
	    $this->form_validation->set_rules('password', 'password', 'trim|required');
	    $this->form_validation->set_rules('role', 'role', 'trim|required');
        $this->form_validation->set_rules('unit', 'unit', 'trim|required');
	    $this->form_validation->set_rules('niy', 'niy', 'trim');
	    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Users.php */