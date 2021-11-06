<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faq extends CI_Controller
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
		$data['kategori'] 	= $this->Model_dashboard->get_kategori_dasboard()->result_array();
		$data['semua_faq'] = $this->db->get('t_faq')->result_array();
		//echo "<pre>";print_r($data);exit;
		$this->load->view('admin/template/header');
		$this->load->view('admin/hal_faq', $data);
		$this->load->view('admin/template/footer');
	}

	public function tambah_faq()
	{
		$quest 	= $this->input->post('question');
		$answ 	= $this->input->post('answer');

		$data = array(
			'question'	=> $quest,
			'answer'	=> $answ
		);

		$this->db->insert('t_faq', $data);
		$this->session->set_flashdata('pesan',
			'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
			<script type ="text/JavaScript">swal("Sukses","Data berhasil ditambahkan","success");</script>'
		);
		redirect(base_url('Faq/index'));
	}

	public function edit_faq()
	{
		$id_faq = $this->input->post('id_faq');
		$quest 	= $this->input->post('question');
		$answ 	= $this->input->post('answer');

		$data = array(
			'question'	=> $quest,
			'answer'	=> $answ
		);

		$where = array('id_faq' => $id_faq);

		$this->db->update('t_faq', $data, $where);
		$this->session->set_flashdata('pesan',
			'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
			<script type ="text/JavaScript">swal("Sukses","Data berhasil diedit","success");</script>'
		);
		redirect(base_url('Faq/index'));
	}

	public function hapus_faq($id_faq)
	{
		$where = array('id_faq' => $id_faq);

		$this->db->delete('t_faq', $where);
		$this->session->set_flashdata('pesan',
			'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
			<script type ="text/JavaScript">swal("Sukses","Data berhasil dihapus","success");</script>'
		);
		redirect(base_url('Faq/index'));
	}
}