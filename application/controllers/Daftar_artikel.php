<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_artikel extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		if ($this->session->userdata('role_id') != 77) {
			redirect('');
		}
	}

	// CRUD kategori Artikel
	public function index()
	{
		$data['kategori'] 	= $this->Model_dashboard->get_kategori_dasboard()->result_array();
		$data['user'] = $this->Model_admin->getUser()->result_array();
		$data['Qcount'] = $this->Model_admin->QuestiontCount()->result_array();
		$data['Arcount'] = $this->Model_admin->ArtikelCount()->result_array();
		$data['kategori_tag'] = $this->Model_artikel->tampil_kategori_tag()->result_array();
		$data['nav'] = "artikel";
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/kategori_artikel', $data);
		$this->load->view('admin/template/footer');
	}

	public function tambah_kategori_artikel()
	{
		$nama_kategori 		= $this->input->post('nama_kategori');

		$data 	= array('nama_kategori' 	=> $nama_kategori);

		$this->db->insert('kategori_tag', $data);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function edit_kategori_artikel()
	{
		$id_kategori_tag 	= $this->input->post('id_kategori_tag');
		$nama_kategori 		= $this->input->post('nama_kategori');

		$data 	= array('nama_kategori' 	=> $nama_kategori);

		$where 	= array('id_kategori_tag' 	=> $id_kategori_tag);

		$this->db->update('kategori_tag', $data, $where);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function hapus_kategori_artikel()
	{
		$id_kategori_tag 	= $this->input->post('id_kategori_tag');

		$where 	= array('id_kategori_tag' 	=> $id_kategori_tag);

		$this->db->delete('kategori_tag', $where);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	//CRUD sub kategori artikel
	public function sub_artikel_tag($id_kategori_tag)
	{
		$data['kategori'] 	= $this->Model_dashboard->get_kategori_dasboard()->result_array();
		$data['user'] = $this->Model_admin->getUser()->result_array();
		$data['Qcount'] = $this->Model_admin->QuestiontCount()->result_array();
		$data['Arcount'] = $this->Model_admin->ArtikelCount()->result_array();
		$data['sub_tag'] = $this->Model_artikel->tampil_sub_kategori_tag($id_kategori_tag)->result_array();
		$data['id_kategori_tag'] = $id_kategori_tag;
		//echo print_r($data123);exit;

		$data['nav'] = "artikel";
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/sub_artikel_tag', $data);
		$this->load->view('admin/template/footer');
	}

	public function tambah_sub_kategori_artikel()
	{
		$id_kategori_tag 	= $this->input->post('id_kategori_tag');
		$namaTag 			= $this->input->post('namaTag');

		$data 	= array(
			'id_kategori_tag' 	=> $id_kategori_tag,
			'namaTag' 			=> $namaTag,
		);

		$this->db->insert('t_tag', $data);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function edit_sub_kategori_artikel()
	{
		$idTag 		= $this->input->post('idTag');
		$namaTag 	= $this->input->post('namaTag');

		$data 	= array('namaTag' 	=> $namaTag);

		$where 	= array('idTag' 	=> $idTag);

		$this->db->update('t_tag', $data, $where);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function hapus_sub_kategori_artikel()
	{
		$idTag 	= $this->input->post('idTag');

		$where 	= array('idTag' 	=> $idTag);

		$this->db->delete('t_tag', $where);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	//list artikel sesuai sub kategori
	public function list_artikel_sesuai_sub($idTag)
	{
		$data['kategori'] 	= $this->Model_dashboard->get_kategori_dasboard()->result_array();
		$data['list_artikel_tag'] = $this->Model_artikel->list_artikel_tag($idTag)->result_array();

		$data['nav'] = "artikel";
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/list_artikel_sesuai_sub', $data);
		$this->load->view('admin/template/footer');
	}

	//list artikel belum verif
	public function verifikasi_artikel()
	{
		$data['kategori'] 	= $this->Model_dashboard->get_kategori_dasboard()->result_array();
		$data['artikel_verif'] = $this->Model_artikel->artikel_belum_verif()->result_array();

		$data['nav'] = "artikel";
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/artikel_belum_verif', $data);
		$this->load->view('admin/template/footer');
	}

	//tampilkan artikel & sembunyikan artikel
	public function edit_verif_artikel($id_artikel)
	{
		$cek_status = $this->Model_artikel->cek_status_artikel($id_artikel)->result_array();
		$artikel = $this->Model_artikel->get_artikel($id_artikel)->result_array();
		$id_user = $artikel[0]['id_user'];
		$user = $this->Model_profile->getProfile($id_user)->result_array();
		foreach ($cek_status as $lihat);
		if ($lihat['status_tampil'] == '1') {
			$data = array('status_tampil' => ('0'),);
		} else if ($lihat['status_tampil'] == '0') {
			$data = array('status_tampil' => ('1'),);
		}
		$where = array('id_artikel' => $id_artikel);
		$update = $this->db->update('t_artikel', $data, $where);
		if ($update) {
			$token = '3mqkViZWgqz8Y7X9HVEGTDBBBHeAYiMtPZhFyYN5JICSe1Xx3B';
			$message = "artikel kamu sudah di verifikasi admin Siswa Rajin.";
			$nohp = $user[0]['no_hp'];
			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => 'http://nusagateway.com/api/send-message.php',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array(

					'token' => $token, 'phone' => $nohp, 'message' => $message

				),

			));

			$response = curl_exec($curl);

			curl_close($curl);
			// 			echo $response;
		}
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function hapus_artikel($id_artikel)
	{
		$where = array('id_artikel' => $id_artikel);
		$this->db->delete('t_artikel', $where);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
}
