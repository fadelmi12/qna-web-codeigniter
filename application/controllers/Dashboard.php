<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		if ($this->session->userdata('id_user') != null) {
			$user = $this->session->userdata('id_user');
			$duit = $this->Model_profile->get_wallet($user)->row()->wallet;
			$data['money'] = json_encode($duit);
		} else {
		}
		$data['question'] 	= $this->Model_dashboard->get_question_dashboard(null, null)->result_array();
		$data['article'] 	= $this->Model_dashboard->get_article_dashboard()->result_array();
		$data['kategori'] 	= $this->Model_dashboard->get_kategori_dasboard()->result_array();
		$data['like']		= $this->Model_dashboard->get_like_dasboard()->result_array();
		$data['activity']	= $this->Model_dashboard->get_activity_dasboard()->result_array();
		// $data['suka'] = json_encode($data['like']);
		// $data['pertanyaan'] = json_encode($data['question']);

		$this->load->view('templates/header');
		$this->load->view('dashboard', $data);
		$this->load->view('templates/footer');
	}

	public function ChangeByFilter()
	{
		$filterPrice = $this->input->post('price');
		$filterTime = $this->input->post('timeF');
		if ($filterPrice != null && $filterTime == null) {
			$data['question'] 	= $this->Model_dashboard->get_question_dashboard($filterPrice, null)->result_array();
		} elseif ($filterTime != null && $filterPrice == null) {
			$data['question'] 	= $this->Model_dashboard->get_question_dashboard(null, $filterTime)->result_array();
		} elseif ($filterTime != null && $filterPrice != null) {
			$data['question'] 	= $this->Model_dashboard->get_question_dashboard($filterPrice, $filterTime)->result_array();
		}
		$data['article'] 	= $this->Model_dashboard->get_article_dashboard()->result_array();
		$data['kategori'] 	= $this->Model_dashboard->get_kategori_dasboard()->result_array();
		$data['like']		= $this->Model_dashboard->get_like_dasboard()->result_array();
		$data['activity']	= $this->Model_dashboard->get_activity_dasboard()->result_array();
		// $this->load->view('templates/header');
		$this->load->view('atraksi/filterDashboard', $data);
		// $this->load->view('templates/footer');
	}

	public function save_pertanyaan()
	{
		$user = $this->session->userdata('id_user');
		$pertanyaan = $this->input->post('pertanyaan');
		$hargaquest = $this->input->post('harga');
		$profile = $this->Model_profile->get_wallet($user)->row();
		$detail_user = $this->Model_profile->getProfile($user)->result_array();
		$wallet = $profile->wallet;
		$harga = $wallet - $hargaquest;
		$pertanyaan = $this->input->post('pertanyaan');
		$kategori = $this->input->post('kategori');
		$time = date('Y-m-d H:i:s');
		$gambar_tanya = $_FILES['gambar_tanya']['name'];

		if ($gambar_tanya != null) {
			$config['upload_path'] = './assets/img/gambar_tanya/';
			$config['allowed_types'] = 'jpg|png|jpeg|gif';

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('gambar_tanya')) {
				$gambar_tanya = $this->upload->data('file_name');
			}
		}

		$data = array(
			'pertanyaan'        => $pertanyaan,
			'id_kategori'       => $kategori,
			'id_user'           => $user,
			'waktu_question'    => $time,
			'gambar_tanya'      => $gambar_tanya,
			'status_hidden'		=> 1,
			'harga'				=> $hargaquest
		);

		$data_xss = $this->security->xss_clean($data);
		$datawallet = array(
			'wallet'				=> $harga
		);
		$wherewallet = array(
			'id_user' => $user
		);
		$datawallet_xss = $this->security->xss_clean($datawallet);
		$simpanwallet = $this->Model_profile->edit_wallet($datawallet_xss, $wherewallet);

		$simpan = $this->Model_dashboard->tambah_pertanyaan('t_pertanyaan', $data_xss);
		if ($simpan && $simpanwallet) {
			$data_log = array(
				'id_user' 			=> $user,
				'aktivitas' 		=> "up_pertanyaan",
				'waktu_aktivitas'	=> date("Y-m-d H:i:s")
			);
			$act = $this->Model_activity->save_activity($data_log);

			$data['datadiri'] = $this->Model_profile->getProfile($this->session->userdata('id_user'))->row();
			$idprofil = $data['datadiri']->id_profile;
			$log_money = array(
				'id_profile' => $idprofil,
				'status_log' => 0,
				'jumlah' => $hargaquest,
				'ket_log' => 'Membuat Pertanyaan',
				'tgl_log' => $time
			);
			$this->db->insert('log_money', $log_money);

			$token = '3mqkViZWgqz8Y7X9HVEGTDBBBHeAYiMtPZhFyYN5JICSe1Xx3B';
			$message = "Pertanyaan kamu sudah terupload, tunggu admin buat verifikasi pertanyaan kamu..";
			$nohp = $detail_user[0]['no_hp'];
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
			redirect('Dashboard');
		}
	}
}
