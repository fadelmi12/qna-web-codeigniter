<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pertanyaan extends CI_Controller
{

	public function index()
	{
		if ($this->session->userdata('id_user') != null) {
			$user = $this->session->userdata('id_user');
			$duit = $this->Model_profile->get_wallet($user)->row()->wallet;
			$data['money'] = json_encode($duit);
		} else {
		}
		$data['question'] = $this->Model_pertanyaan->getAllQuestions()->result_array();
		$data['title'] = "Semua Kategori";

		$data['kategori'] = $this->Model_dashboard->get_kategori_dasboard()->result_array();
		$data['like']	= $this->Model_dashboard->get_like_dasboard()->result_array();
		$nav['judul'] = "Buat Pertanyaan";
		$this->load->view('templates/header-page', $nav);
		$this->load->view('question/index', $data);
		$this->load->view('templates/footer');
	}

	public function detail($id)
	{
		if ($this->session->userdata('id_user') != null) {
			$user = $this->session->userdata('id_user');
			$duit = $this->Model_profile->get_wallet($user)->row()->wallet;
			$data['money'] = json_encode($duit);
		} else {
		}
		$data['question'] = $this->Model_pertanyaan->detail_tanya($id)->result_array();
		$ktg = $this->Model_pertanyaan->detail_tanya($id)->row()->nama_kategori;
		$data['lainya'] = $this->Model_pertanyaan->get_question($ktg)->result_array();
		$data['love'] = $this->Model_pertanyaan->get_love()->result_array();
		$data['jawaban'] = $this->Model_pertanyaan->jawab($id)->result_array();
		$data['kategori'] = $this->Model_dashboard->get_kategori_dasboard()->result_array();
		$data['report'] = $this->Model_pertanyaan->get_report()->result_array();
		$user = $this->session->userdata('id_user');
		$id_prt = $this->uri->segment(3);
		$data['bookmark'] = $this->Model_pertanyaan->sudah_bookmark($user, $id_prt)->result_array();
		// echo "<pre>"; print_r($data); exit;
		$nav['judul'] = "Buat Pertanyaan";
		$this->load->view('templates/header-page', $nav);
		$this->load->view('question/detail', $data);
		$this->load->view('templates/footer');
	}
	public function hapus_pertanyaan()
	{
		$prt = $this->input->post('id_pertanyaan');
		$user = $this->input->post('id_user');
		$getPrice = $this->Model_pertanyaan->detail_tanya($prt)->row()->harga;
		$getMoney =	$this->Model_profile->get_wallet($user)->row()->wallet;
		$addMoney = $getMoney + $getPrice;
		$idprofil = $this->Model_profile->get_wallet($user)->row()->id_profile;
		date_default_timezone_set('Asia/Jakarta');
		$time =	date('Y-m-d H:i:s');
		$log_money = array(
			'id_profile' => $idprofil,
			'status_log' => 1,
			'jumlah' => $getPrice,
			'ket_log' => 'Batalkan Pertanyaan',
			'tgl_log' => $time
		);
		$this->db->insert('log_money', $log_money);
		$where = array(
			'id_pertanyaan' => $prt
		);
		$datawallet = array(
			'wallet'	=> $addMoney
		);
		$wherewallet = array(
			'id_user' => $user
		);

		$datawallet_xss = $this->security->xss_clean($datawallet);
		$this->Model_profile->edit_wallet($datawallet_xss, $wherewallet);
		$this->Model_pertanyaan->hapus_quest($where, 't_pertanyaan');
		// <script></script>
		redirect(base_url('profile/daftar_pertanyaan'));
	}

	public function kategori($nama)
	{
		if ($this->session->userdata('id_user') != null) {
			$user = $this->session->userdata('id_user');
			$duit = $this->Model_profile->get_wallet($user)->row()->wallet;
			$data['money'] = json_encode($duit);
		} else {
		}
		$data['kategori_quest'] = json_encode($nama);

		$total_data = $this->Model_pertanyaan->get_question($nama)->num_rows();
		$data['total_data'] = ceil($total_data / 5);
		$data['jenis'] = $nama;
		$data['title'] = json_encode($nama);
		$data['kategori'] = $this->Model_dashboard->get_kategori_dasboard()->result_array();
		$data['like']		= $this->Model_dashboard->get_like_dasboard()->result_array();
		$nav['judul'] = "Buat Pertanyaan";
		$this->load->view('templates/header-page', $nav);
		$this->load->view('question/index', $data);
		$this->load->view('templates/footer');
	}
	public function cek_jawab()
	{
		$id = $this->input->post('id_jawaban');
		$prt = $this->input->post('id_pertanyaan');
		$user = $this->input->post('id_user');
		$getPrice = $this->Model_pertanyaan->detail_tanya($prt)->row()->harga;
		$getMoney =	$this->Model_profile->get_wallet($user)->row()->wallet;
		$addMoney = $getMoney + $getPrice;
		$time = date('Y-m-d H:i:s');
		$data = array(
			'jawaban_benar' => '1'
		);
		$data1 = array(
			'status_jawab' => '1'
		);
		$where = array(
			'id_jawaban' => $id
		);
		$datawallet = array(
			'wallet'	=> $addMoney
		);
		$wherewallet = array(
			'id_user' => $user
		);
		$datawallet_xss = $this->security->xss_clean($datawallet);
		$this->Model_profile->edit_wallet($datawallet_xss, $wherewallet);
		$this->Model_pertanyaan->update_status_jawab($where, $data);
		$this->Model_pertanyaan->set_status_jawab($prt, $data1);

		// $idprofil = $this->Model_profile->get_wallet($user)->row()->id_profile;
		$log_money = array(
			'id_user' => $user,
			'status_log' => 1,
			'jumlah' => $getPrice,
			'ket_log' => 'Menjawab Betul Pertanyaan',
			'tgl_log' => $time
		);
		$this->db->insert('log_money', $log_money);

		// <script></script>

		$user_jwb 	= $this->Model_profile->getProfile($user)->result_array();
		$nohp		= $user_jwb[0]['no_hp'];
		$token 		= '3mqkViZWgqz8Y7X9HVEGTDBBBHeAYiMtPZhFyYN5JICSe1Xx3B';
		$message 	= "Selamat... Jawaban Anda telah diverifikasi sebagai jawaban benar. Anda mendapat tambahan " . $getPrice . " Coin.";
		$curl 		= curl_init();
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
		$result =  substr($response, 17, 5);
		if ($result == "false") {
			$data_wa = array(
				'id_user' 		=> $user,
				'pesan'			=> $message,
				'tanggal'		=> date('Y-m-d H:i:s'),
				'status_kirim'	=> 0
			);
			$this->db->insert('t_wa', $data_wa);
		} else {
			$data_wa = array(
				'id_user' 		=> $user,
				'pesan'			=> $message,
				'tanggal'		=> date('Y-m-d H:i:s'),
				'status_kirim'	=> 1
			);
			$this->db->insert('t_wa', $data_wa);
		}
		curl_close($curl);
		redirect(base_url('pertanyaan/detail/' . $prt));
	}

	public function tambah_jawaban($id_pertanyaan)
	{
		$jawaban = $this->input->post('jawaban');
		$user = $this->session->userdata('id_user');
		date_default_timezone_set('Asia/Jakarta');
		$time = date('Y-m-d H:i:s');
		$gambar_jawab = $_FILES['gambar_jawab']['name'];

		if ($gambar_jawab != null) {
			$config['upload_path'] = './assets/img/gambar_jawab/';
			$config['allowed_types'] = 'jpg|png|jpeg|gif';

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('gambar_jawab')) {
				$gambar_jawab = $this->upload->data('file_name');
			}
		}
		if ($gambar_jawab != null) {
			$data = array(
				'id_pertanyaan' => $id_pertanyaan,
				'jawaban'        => $jawaban,
				'id_user'           => $user,
				'waktu_jawab'    => $time,
				'gambar_jawab' => $gambar_jawab
			);
		} else {
			$data = array(
				'id_pertanyaan' => $id_pertanyaan,
				'jawaban'        => $jawaban,
				'id_user'          => $user,
				'waktu_jawab'    => $time
			);
		}

		$data_xss = $this->security->xss_clean($data);

		$this->Model_pertanyaan->tambah_jawaban('t_jawaban', $data_xss);

		$user_qty 		= $this->Model_pertanyaan->get_user_qty($id_pertanyaan)->result_array();
		$id_user_qty 	= $user_qty[0]['id_user'];
		$nohp			= $user_qty[0]['no_hp'];
		$token 			= '3mqkViZWgqz8Y7X9HVEGTDBBBHeAYiMtPZhFyYN5JICSe1Xx3B';
		$user_jwb		= $this->Model_profile->getProfile($user)->row()->nama_user;
		$message 		= "Pertanyaan Anda telah dijawab oleh " . $user_jwb . ", Segera verifikasi jawaban jika jawaban tersebut benar. Terima kasih.";
		$curl 			= curl_init();
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
		$result =  substr($response, 17, 5);
		if ($result == "false") {
			$data_wa = array(
				'id_user' 		=> $id_user_qty,
				'pesan'			=> $message,
				'tanggal'		=> date('Y-m-d H:i:s'),
				'status_kirim'	=> 0
			);
			$this->db->insert('t_wa', $data_wa);
		} else {
			$data_wa = array(
				'id_user' 		=> $id_user_qty,
				'pesan'			=> $message,
				'tanggal'		=> date('Y-m-d H:i:s'),
				'status_kirim'	=> 1
			);
			$this->db->insert('t_wa', $data_wa);
		}
		curl_close($curl);

		$this->session->set_flashdata(
			'pesan',
			'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
			<script type ="text/JavaScript">swal("Sukses","Anda telah menjawab pertanyaan, tunggu ' . $user_qty[0]['nama_user'] . ' untuk memverifikasi jawaban Anda. Koin akan didapatkan jika jawaban terverifikasi sebagai jawaban benar","success");</script>'
		);
		redirect('Pertanyaan/detail/' . $id_pertanyaan);
	}
	public function edit_pertanyaan($id_pertanyaan)
	{
		$pertanyaan = $this->input->post('pertanyaan');
		$id_kategori = $this->input->post('kategori');
		$user = $this->session->userdata('id_user');
		// $time = date('Y-m-d H:i:s');
		// $gambar_jawab = $_FILES['gambar_jawab']['name'];

		// if ($gambar_jawab != null) {
		// 	$config['upload_path'] = './assets/img/gambar_jawab/';
		// 	$config['allowed_types'] = 'jpg|png|jpeg|gif';

		// 	$this->load->library('upload', $config);
		// 	if ($this->upload->do_upload('gambar_jawab')) {
		// 		$gambar_jawab = $this->upload->data('file_name');
		// 	}
		// }

		$data = array(
			'pertanyaan' 		=> $pertanyaan,
			'id_kategori'       => $id_kategori
		);
		$where = array(
			'id_pertanyaan'		=> $id_pertanyaan
		);

		$data_xss = $this->security->xss_clean($data);

		$this->Model_pertanyaan->update_pertanyaan('t_pertanyaan', $where, $data_xss);
		redirect('Pertanyaan/detail/' . $id_pertanyaan);
		// if ($simpan) {
		// 	echo json_encode($data_xss);
		// 	// redirect('Dashboard');
		// } else {
		// 	echo "GAGAL";
		// 	echo json_encode($data_xss);
		// }
	}
	public function report_pertanyaan()
	{
		$id_pertanyaan = $this->input->post('id_pertanyaan');
		$pesan = $this->input->post('pesan');
		$id_user = $this->session->userdata('id_user');

		$data = array(
			'id_pertanyaan' => $id_pertanyaan,
			'id_user'		=> $id_user,
			'status_baca'	=> '0',
			'pesan'			=> $pesan
		);

		$data_xss = $this->security->xss_clean($data);

		$this->Model_pertanyaan->insert_report('t_message', $data_xss);
		redirect('Pertanyaan/detail/' . $id_pertanyaan);
	}
	public function search()
	{
		if ($this->session->userdata('id_user') != null) {
			$user = $this->session->userdata('id_user');
			$duit = $this->Model_profile->get_wallet($user)->row()->wallet;
			$data['money'] = json_encode($duit);
		} else {
		}

		$keyword = $this->input->post('keyword');
		$data['katakunci'] = $keyword;
		$data['question'] = $this->Model_pertanyaan->get_keyword($keyword)->result_array();
		$data['title'] = "Semua Kategori";
		$data['like']		= $this->Model_dashboard->get_like_dasboard()->result_array();
		$data['suka'] = json_encode($data['like']);
		$data['kategori'] = $this->Model_dashboard->get_kategori_dasboard()->result_array();


		$total_data = $this->Model_pertanyaan->get_keyword($keyword)->num_rows();
		$data['total_data'] = ceil($total_data / 5);
		$data['title'] = json_encode($keyword);
		// var_dump($data);
		if (empty($data['question'])) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Data tidak Ditemukan

				</div>');
			$nav['judul'] = "Buat Pertanyaan";
			$this->load->view('templates/header-page', $nav);

			$this->load->view('question/browse_question', $data);
			$this->load->view('templates/footer');
		} else {
			$this->session->set_flashdata('pesan', '');
			$nav['judul'] = "Buat Pertanyaan";
			$this->load->view('templates/header-page', $nav);

			$this->load->view('question/browse_question', $data);
			$this->load->view('templates/footer');
		}
	}
	public function load_data_search()
	{
		$data['like']		= $this->Model_dashboard->get_like_dasboard()->result_array();
		$offset = ceil($this->input->post('offset') * 6);
		$nama = $this->input->post('nama');
		$data['question'] = $this->Model_pertanyaan->get_keyword_search($nama, 6, $offset)->result_array();
		$total_data = $this->Model_pertanyaan->get_keyword($nama)->num_rows();
		$data['total_data'] = $total_data;
		$data['offset'] = ceil($this->input->post('offset') * 6);
		$this->load->view('question/question_search', $data);
	}
	public function load_data()
	{
		$data['like']		= $this->Model_dashboard->get_like_dasboard()->result_array();
		$offset = ceil($this->input->post('offset') * 5);
		$nama = $this->input->post('nama');
		$data['question'] = $this->Model_pertanyaan->get_question_more($nama, 6, $offset);
		$total_data = $this->Model_pertanyaan->get_question($nama)->num_rows();
		$data['total_data'] = $total_data;
		$data['offset'] = ceil($this->input->post('offset') * 5);
		$this->load->view('question/question_kategori', $data);
	}
}
