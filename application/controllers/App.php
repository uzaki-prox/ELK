<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	
	public function index()
	{
		if ($this->session->userdata('role') == "") {
            redirect('app/login');
        } 
		$data = array(
			'konten' => 'home',
            'judul' => 'Dashboard',
		);
		$this->load->view('v_index', $data);
	}

	public function login()
	{

		if ($this->input->post() == NULL) {
			$this->load->view('login');
		} else {
			$niy = $this->input->post('niy');
			$password = md5($this->input->post('password'));
			$cek_user = $this->db->query("SELECT * FROM user WHERE niy='$niy' AND password='$password' ");
			if ($cek_user->num_rows() == 1) {
				foreach ($cek_user->result() as $row) {
					$sess_data['niy'] = $row->niy;
					$sess_data['name'] = $row->name;
					$sess_data['gender']= $row->gender;
					$sess_data['role'] = $row->role;
					$sess_data['unit'] = $row->unit;
					$this->session->set_userdata($sess_data);
				}
				redirect('app');
			} else {
				?>
				<script type="text/javascript">
					alert('NIY dan Password Salah !');
					window.location="<?php echo base_url('app/login'); ?>";
				</script>
				<?php
			}

		}
	}

	function logout()
	{
		$this->session->unset_userdata('niy');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('unit');
		session_destroy();
		redirect('app/login');
	}


}
