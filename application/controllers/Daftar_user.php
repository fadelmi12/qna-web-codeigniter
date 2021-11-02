<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_user extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		if ($this->session->userdata('role_id') != 77) {
			redirect('');
		}
	}
	public function index()
	{
		$data['daftar_user'] = $this->Model_admin->daftar_user()->result_array();
		$data['kategori'] 	= $this->Model_dashboard->get_kategori_dasboard()->result_array();

		$this->load->view('admin/template/header');
		$this->load->view('admin/daftar_user', $data);
		$this->load->view('admin/template/footer');
	}

	public function view_edit($id_user)
	{
		$data['data_user'] = $this->Model_admin->data_user($id_user)->result_array();
		$data['kategori'] 	= $this->Model_dashboard->get_kategori_dasboard()->result_array();
		// echo "<pre>"; print_r($data); exit;

		$this->load->view('admin/template/header');
		$this->load->view('admin/view_edit_user', $data);
		$this->load->view('admin/template/footer');
	}

	public function get_kota()
	{
		$id = $this->input->post('id');
		$where = array('provinsi_id' => $id);
		$data = $this->Model_profile->get_kota($where)->result_array();
		echo json_encode($data);
	}

	public function edit_profil($id_user)
	{
		$where = array('id_user' => $id_user);

		$nama_user 		= $this->input->post('nama_user');
		$email 			= $this->input->post('email');
		$password 		= $this->input->post('password');

		$data = array(
			'nama_user' 	=> $nama_user,
			'email' 		=> $email,
			'password' 		=> $password,
		);

		$this->db->update('t_user', $data, $where);

		$nama_lengkap 	= $this->input->post('nama_lengkap');
		$tgl_lahir 		= $this->input->post('tgl_lahir');
		$gender 		= $this->input->post('gender');
		$no_hp 			= $this->input->post('no_hp');
		$kota 			= $this->input->post('kota');
		$provinsi 		= $this->input->post('provinsi');
		$wallet 		= $this->input->post('wallet');
		$e_wallet 		= preg_replace('/[Rp. ]+/', '', $wallet);
		
		$data2 = array(
			'nama_lengkap' 	=> $nama_lengkap,
			'tgl_lahir' 	=> $tgl_lahir,
			'gender' 		=> $gender,
			'no_hp' 		=> $no_hp,
			'kota' 			=> $kota,
			'provinsi' 		=> $provinsi,
			'wallet' 		=> $e_wallet,
		);

		// echo "<pre>"; print_r($data2);exit;

		$this->db->update('t_profile', $data2, $where);
		redirect('Daftar_user/view_edit/'.$id_user);
	}


}
