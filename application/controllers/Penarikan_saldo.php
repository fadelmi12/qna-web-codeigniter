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
		// var_dump($data['penarikan_sukses']);
		// die;


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
		$update = $this->db->update('t_penarikan', $data, $where);
		if ($update) {
			$coin = $this->Model_admin->user_penarikan($id_penarikan)->row()->jumlah_coin;
			if ($coin == 550) {
				$uang = "Rp 50.000";
			} elseif ($coin == 1100) {
				$uang = "Rp 100.000";
			} else {
				$uang = "Rp 500.000";
			}
			$id_user = $this->Model_admin->user_penarikan($id_penarikan)->row()->id_user;
			$nama_user = $this->Model_profile->getProfile($id_user)->row()->nama_lengkap;
			$no_hp = $this->Model_profile->getProfile($id_user)->row()->no_hp;
			$pesan 		= "Hai " . $nama_user . ". Penarikan saldo Anda sebesar " . $uang . " telah berhasil diproses";
			$token = '3mqkViZWgqz8Y7X9HVEGTDBBBHeAYiMtPZhFyYN5JICSe1Xx3B';
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

					'token' => $token, 'phone' => $no_hp, 'message' => $pesan

				),

			));

			$response = curl_exec($curl);
			$result =  substr($response, 17, 5);
			date_default_timezone_set("Asia/Jakarta");
			$date = date("Y-m-d H:i:s");
			if ($result == "false") {
				$id_user = $id_user;
				$data_wa = array(
					'id_user' 		=> $id_user,
					'pesan'			=> $pesan,
					'tanggal'		=> $date,
					'status_kirim'	=> 0
				);
				$this->db->insert('t_wa', $data_wa);
				$this->session->set_flashdata(
					'pesan',
					'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
					<script type ="text/JavaScript">swal("Gagal","Pesan WA belum terkirim, cek apakah device sudah terhung ke Nusa Gateway","error");</script>'
				);
			} else {
				$id_user = $id_user;
				$data_wa = array(
					'id_user' 		=> $id_user,
					'pesan'			=> $pesan,
					'tanggal'		=> $date,
					'status_kirim'	=> 1
				);
				$this->db->insert('t_wa', $data_wa);
				$this->session->set_flashdata(
					'pesan',
					'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
					<script type ="text/JavaScript">swal("Sukses","Pesan WA terkirim","success");</script>'
				);
			}
			curl_close($curl);
		}
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function rek_not_found($id_penarikan)
	{
		$where = array('id_penarikan' => $id_penarikan);
		$data = array('status_terkirim' => ('2'));
		$update = $this->db->update('t_penarikan', $data, $where);
		if ($update) {
			$coin = $this->Model_admin->user_penarikan($id_penarikan)->row()->jumlah_coin;
			if ($coin == 550) {
				$uang = "Rp 50.000";
			} elseif ($coin == 1100) {
				$uang = "Rp 100.000";
			} else {
				$uang = "Rp 500.000";
			}
			$id_user = $this->Model_admin->user_penarikan($id_penarikan)->row()->id_user;
			$nama_user = $this->Model_profile->getProfile($id_user)->row()->nama_lengkap;
			$no_hp = $this->Model_profile->getProfile($id_user)->row()->no_hp;
			$pesan 		= "Hai " . $nama_user . ". Penarikan saldo Anda sebesar " . $uang . " tidak dapat diproses karena rekening tidak ditemukan. Silakan ke ubah rekening di menu keuangan";
			$token = '3mqkViZWgqz8Y7X9HVEGTDBBBHeAYiMtPZhFyYN5JICSe1Xx3B';
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

					'token' => $token, 'phone' => $no_hp, 'message' => $pesan

				),

			));

			$response = curl_exec($curl);
			$result =  substr($response, 17, 5);
			date_default_timezone_set("Asia/Jakarta");
			$date = date("Y-m-d H:i:s");
			if ($result == "false") {
				$id_user = $id_user;
				$data_wa = array(
					'id_user' 		=> $id_user,
					'pesan'			=> $pesan,
					'tanggal'		=> $date,
					'status_kirim'	=> 0
				);
				$this->db->insert('t_wa', $data_wa);
				$this->session->set_flashdata(
					'pesan',
					'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
					<script type ="text/JavaScript">swal("Gagal","Pesan WA belum terkirim, cek apakah device sudah terhung ke Nusa Gateway","error");</script>'
				);
			} else {
				$id_user = $id_user;
				$data_wa = array(
					'id_user' 		=> $id_user,
					'pesan'			=> $pesan,
					'tanggal'		=> $date,
					'status_kirim'	=> 1
				);
				$this->db->insert('t_wa', $data_wa);
				$this->session->set_flashdata(
					'pesan',
					'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
					<script type ="text/JavaScript">swal("Sukses","Pesan WA terkirim","success");</script>'
				);
			}
			curl_close($curl);
		}
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function tolak_penarikan($id_penarikan)
	{
		$where = array('id_penarikan' => $id_penarikan);
		$data = array('status_terkirim' => ('3'));
		$update = $this->db->update('t_penarikan', $data, $where);
		if ($update) {
			$coin = $this->Model_admin->user_penarikan($id_penarikan)->row()->jumlah_coin;
			if ($coin == 550) {
				$uang = "Rp 50.000";
			} elseif ($coin == 1100) {
				$uang = "Rp 100.000";
			} else {
				$uang = "Rp 500.000";
			}
			$id_user = $this->Model_admin->user_penarikan($id_penarikan)->row()->id_user;
			$nama_user = $this->Model_profile->getProfile($id_user)->row()->nama_lengkap;
			$no_hp = $this->Model_profile->getProfile($id_user)->row()->no_hp;
			$pesan 		= "Hai " . $nama_user . ". Mohon maaf, penarikan saldo Anda sebesar " . $uang . " tidak bisa diproses karena Anda terindikasi curang.";
			$token = '3mqkViZWgqz8Y7X9HVEGTDBBBHeAYiMtPZhFyYN5JICSe1Xx3B';
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

					'token' => $token, 'phone' => $no_hp, 'message' => $pesan

				),

			));

			$response = curl_exec($curl);
			$result =  substr($response, 17, 5);
			date_default_timezone_set("Asia/Jakarta");
			$date = date("Y-m-d H:i:s");
			if ($result == "false") {
				$id_user = $id_user;
				$data_wa = array(
					'id_user' 		=> $id_user,
					'pesan'			=> $pesan,
					'tanggal'		=> $date,
					'status_kirim'	=> 0
				);
				$this->db->insert('t_wa', $data_wa);
				$this->session->set_flashdata(
					'pesan',
					'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
					<script type ="text/JavaScript">swal("Gagal","Pesan WA belum terkirim, cek apakah device sudah terhung ke Nusa Gateway","error");</script>'
				);
			} else {
				$id_user = $id_user;
				$data_wa = array(
					'id_user' 		=> $id_user,
					'pesan'			=> $pesan,
					'tanggal'		=> $date,
					'status_kirim'	=> 1
				);
				$this->db->insert('t_wa', $data_wa);
				$this->session->set_flashdata(
					'pesan',
					'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
					<script type ="text/JavaScript">swal("Sukses","Pesan WA terkirim","success");</script>'
				);
			}
			curl_close($curl);
		}
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function batal_penarikan($id_penarikan)
	{
		$where = array('id_penarikan' => $id_penarikan);
		$data = array('status_terkirim' => ('0'));
		$update = $this->db->update('t_penarikan', $data, $where);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function hapus_penarikan($id_penarikan)
	{
		$where = array('id_penarikan' => $id_penarikan);
		$delete = $this->db->delete('t_penarikan', $where);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	// CRUD Bank
	public function daftar_bank()
	{
		$data['nama_bank'] = $this->db->get('t_bank')->result_array();
		$data['kategori'] 	= $this->Model_dashboard->get_kategori_dasboard()->result_array();
		$data['nav'] = "penarikan";

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/daftar_bank', $data);
		$this->load->view('admin/template/footer');
	}

	public function tambah_bank()
	{
		$nama_bank = $this->input->post("nama_bank");
		$kode_bank = $this->input->post("kode_bank");

		$data = array(
			'nama_bank' => $nama_bank,
			'kode_bank' => $kode_bank,
		);
		//echo "<pre>"; print_r($data); exit;
		$this->db->insert('t_bank', $data);

		redirect('Penarikan_saldo/daftar_bank');
	}

	public function edit_bank()
	{
		$id_bank	= $this->input->post("id_bank");
		$nama_bank 	= $this->input->post("nama_bank");
		$kode_bank 	= $this->input->post("kode_bank");

		$data = array(
			'nama_bank' => $nama_bank,
			'kode_bank' => $kode_bank,
		);

		$where = array('id_bank' => $id_bank);

		$this->db->update('t_bank', $data, $where);

		redirect('Penarikan_saldo/daftar_bank');
	}

	public function delete_bank()
	{
		$id_bank	= $this->input->post("id_bank");

		$where = array('id_bank' => $id_bank);

		$this->db->delete('t_bank', $where);

		redirect('Penarikan_saldo/daftar_bank');
	}
}
