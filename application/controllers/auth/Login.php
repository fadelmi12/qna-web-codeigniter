<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		$nav['judul'] = "Buat Pertanyaan";
		$this->load->view('templates/header-page', $nav);

		$this->load->view('auth/login');
		$this->load->view('templates/footer');
	}

	public function login_user()
	{
	    $this->load->library('user_agent');
		$this->load->helper('date');
		$format = "%Y-%M-%d %H:%i";
		$data2 = array(
			'browser'		=> $this->agent->browser(),
			'device' => $this->agent->platform(),
			'ip'	=> $this->input->ip_address(),
			'email'	=> $this->input->post('email'),
			'date' => mdate($format)
		);

		$this->db->insert('log_login', $data2);
		$this->form_validation->set_rules('email', 'email', 'required', ['required' => 'Email wajib diisi!']);
		$this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password wajib diisi!']);
		if ($this->form_validation->run() == FALSE) {
			$nav['judul'] = "Buat Pertanyaan";
			$this->load->view('templates/header-page', $nav);

			$this->load->view('auth/login');
			$this->load->view('templates/footer');
		} else {
			$auth = $this->Model_login->cek_login();

			if ($auth == FALSE) {
				$this->session->set_flashdata('pesan', '<div style="justify-content:center;" class="text-center alert alert-danger alert-dismissible fade show" role="alert">Password Anda Salah!</div>');
				redirect('auth/login');
			} else {
				$this->session->set_userdata('nama_user', $auth->nama_user);
				$this->session->set_userdata('id_user', $auth->id_user);
				$this->session->set_userdata('email', $auth->email);
				$this->session->set_userdata('role_id', $auth->role_id);
				$this->session->set_userdata('foto_user', $auth->foto_user);

				switch ($auth->role_id) {
					case 77:
						redirect('AdminPage');
						break;
					case 2:
						redirect('dashboard');
						break;
					default:
						break;
				}
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('dashboard');
	}
}
