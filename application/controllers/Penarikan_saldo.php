<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penarikan_saldo extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		if ($this->session->userdata('role_id') != 77) {
			redirect('');
		}
	}
	//penarikan sukses
	public function index()
	{
		$data['kategori'] 	= $this->Model_dashboard->get_kategori_dasboard()->result_array();
		$data['penarikan_sukses']	= $this->Model_admin->penarikan_sukses()->result_array();

		$data['nav'] = "penarikan";
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/penarikan_sukses', $data);
		$this->load->view('admin/template/footer');
	}

	//penarikan belum sukses
	public function belum_sukses()
	{
		$data['kategori'] 	= $this->Model_dashboard->get_kategori_dasboard()->result_array();
		$data['penarikan_batal']	= $this->Model_admin->penarikan_batal()->result_array();

		$data['nav'] = "penarikan";
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/penarikan_belum_sukses', $data);
		$this->load->view('admin/template/footer');
	}

	public function ubah_status_terkirim($id_penarikan)
	{
		$where = array('id_penarikan' => $id_penarikan);
		$data = array('status_terkirim' => ('1'));
		$this->db->update('t_penarikan', $data, $where);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
}
