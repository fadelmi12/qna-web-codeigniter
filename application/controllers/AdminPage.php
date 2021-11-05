<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminPage extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		if ($this->session->userdata('role_id') != 77) {
			redirect('');
		}
	}
	public function index()
	{
		$data['user'] = $this->Model_admin->getUser()->result_array();
		$data['Qcount'] = $this->Model_admin->QuestiontCount()->result_array();
		$data['Arcount'] = $this->Model_admin->ArtikelCount()->result_array();
		$data['kategori'] = $this->Model_admin->tampil_kategori()->result_array();
		$data['verifcount'] = $this->Model_admin->tampil_question(null, 1)->num_rows();
		// $data['pertanyaan']=$this->Model_admin->tampil_pe()->result_array();
		$this->load->view('admin/template/header');
		$this->load->view('admin/index', $data);
		$this->load->view('admin/template/footer', $data);
		// echo json_encode($data);
	}
	public function TambahKategori()
	{
		$kategori = $this->input->post('kategori');
		$gambar_icon     = $_FILES['gambar_icon']['name'];
		if ($gambar_icon = '') {
		} else {
			$config['upload_path']   = './assets/img/clients/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar_icon')) {
				echo "Proses Gambar Gagal";
			} else {
				$gambar_icon = $this->upload->data('file_name');
			}
		}


		$data = array(
			'nama_kategori' => $kategori,
			'gambar' => $gambar_icon


		);
		$this->Model_admin->tambah_kategori($data, 't_kategori');
		redirect('AdminPage');
	}
	public function EditKategori()
	{
		$id_kategori = $this->input->post('id_kategori');
		$kategori	= $this->input->post('kategori');



		$data = array(
			'nama_kategori' => $kategori

		);

		$where = array(
			'id_kategori' => $id_kategori
		);

		$this->Model_admin->update_data($where, $data, 't_kategori');
		redirect('AdminPage');
	}
	public function hapus_kategori($id)
	{
		$where = array('id_kategori' => $id);
		$this->Model_admin->hapus_data($where, 't_kategori');
		redirect('AdminPage');
	}
	public function Pertanyaan($nama)
	{
		// $data['user'] = $this->Model_admin->getUser()->result_array();
		// $data['Qcount'] = $this->Model_admin->QuestiontCount()->result_array();
		// $data['Arcount'] = $this->Model_admin->ArtikelCount()->result_array();
		$data['question'] = $this->Model_admin->tampil_question($nama)->result_array();
		$this->load->view('admin/template/header');
		$this->load->view('admin/question', $data);
		$this->load->view('admin/template/footer');
	}
	public function Question($nama)
	{
		$data['kategori'] = $this->Model_admin->tampil_kategori()->result_array();
		// $data['user'] = $this->Model_admin->getUser()->result_array();
		// $data['Qcount'] = $this->Model_admin->QuestiontCount()->result_array();
		// $data['Arcount'] = $this->Model_admin->ArtikelCount()->result_array();
		// $data['question'] = $this->Model_admin->tampil_question($nama)->result_array();
		$data['question'] = $this->Model_admin->tampil_question($nama, null)->result_array();
		$this->load->view('admin/template/header');
		$this->load->view('admin/question_all', $data);
		$this->load->view('admin/template/footer');
	}
	public function detail_question($qst)
	{
		$data['kategori'] = $this->Model_admin->tampil_kategori()->result_array();
		$data['answer'] = $this->Model_admin->tampil_edit_jawaban($qst)->result_array();
		$data['question'] = $this->Model_admin->detail_question($qst)->result_array();
		$this->load->view('admin/template/header');
		$this->load->view('admin/detail_question', $data);
		$this->load->view('admin/template/footer');
	}
	public function update_qst()
	{
		$idpage = $this->input->post('id_pertanyaan');
		$status_hidden	= $this->input->post('status_hidden');
		$status_jawab	= $this->input->post('status_jawab');



		$data = array(
			'status_hidden' => $status_hidden,
			'status_jawab' => $status_jawab

		);

		$where = array(
			'id_pertanyaan' => $idpage
		);

		$this->Model_admin->update_hidden_quest($where, $data, 't_pertanyaan');
		redirect('AdminPage/detail_question/' . $idpage);
	}
	public function update_hidden()
	{
		$idpage = $this->input->post('id_pertanyaan');
		$id_jawaban        	= $this->input->post('id_jawaban');
		$status_sembunyi	= $this->input->post('status_sembunyi');

		$data = array(
			'status_sembunyi' => $status_sembunyi

		);

		$where = array(
			'id_jawaban' => $id_jawaban
		);

		$this->Model_admin->update_hidden_ans($where, $data, 't_jawaban');
		redirect('AdminPage/detail_question/' . $idpage);
	}
	public function hapus_question()
	{
		$id_pertanyaan = $this->input->post('id_pertanyaan');
		// echo json_encode($id);
		// die;
		$where = array('id_pertanyaan' => $id_pertanyaan);
		$this->Model_admin->hapus_quest($where, 't_pertanyaan');
	}
	public function Verifikasi_Pertanyaan()
	{
		$data['kategori'] = $this->Model_admin->tampil_kategori()->result_array();
		// $data['user'] = $this->Model_admin->getUser()->result_array();
		// $data['Qcount'] = $this->Model_admin->QuestiontCount()->result_array();
		// $data['Arcount'] = $this->Model_admin->ArtikelCount()->result_array();
		// $data['question'] = $this->Model_admin->tampil_question($nama)->result_array();
		$data['question'] = $this->Model_admin->tampil_question(null, 1)->result_array();
		$this->load->view('admin/template/header');
		$this->load->view('admin/verifikasi_pertanyaan', $data);
		$this->load->view('admin/template/footer');
	}
	public function verif_quest()
	{
		$idpage = $this->input->post('id_pertanyaan');
		$id_user = $this->input->post('id_user');
		$user = $this->Model_profile->getProfile($id_user)->result_array();

		$data = array(
			'status_hidden' => 0

		);

		$where = array(
			'id_pertanyaan' => $idpage
		);

		$verif = $this->Model_admin->update_hidden_quest($where, $data, 't_pertanyaan');
		if ($verif) {
			$data_log = array(
				'id_user' 			=> $id_user,
				'aktivitas' 		=> "up_pertanyaan",
				'waktu_aktivitas'	=> date("Y-m-d H:i:s")
			);
			$token = '3mqkViZWgqz8Y7X9HVEGTDBBBHeAYiMtPZhFyYN5JICSe1Xx3B';
			$phone = $user[0]['no_hp'];
			$message = "Pertanyaan kamu, sudah konfrimasi oleh admin Siswa Rajin nihh.. Tunggu user lain untuk menjawab pertanyaan kamu yaaa.. ";
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

					'token' => $token, 'phone' => $phone, 'message' => $message

				),

			));

			$response = curl_exec($curl);
			$result =  substr($response, 17, 5);
			if ($result == "false") {
				$data_wa = array(
					'id_user' 		=> $id,
					'pesan'			=> $message,
					'status_kirim'	=> 0
				);
				$this->db->insert('t_wa', $data_wa);
			} else {
				$data_wa = array(
					'id_user' 		=> $id,
					'pesan'			=> $message,
					'status_kirim'	=> 1
				);
				$this->db->insert('t_wa', $data_wa);
			}
			curl_close($curl);
			redirect('auth/Login');
			curl_close($curl);
		}
		$this->Model_activity->save_activity($data_log);
	}

	public function log_login()
	{
		$data['kategori'] = $this->Model_admin->tampil_kategori()->result_array();
		$data['log'] = $this->Model_admin->log_login()->result_array();
		$this->load->view('admin/template/header');
		$this->load->view('admin/log_login', $data);
		$this->load->view('admin/template/footer');
	}

	public function update_jawab()
	{
		$idpage = $this->input->post('id_pertanyaan');
		$id_jawaban        	= $this->input->post('id_jawaban');
		$jawaban_benar      = $this->input->post('jawaban_benar');
		$user =	$this->input->post('id_user');
		$harga = $this->input->post('price');

		$data = array(
			'jawaban_benar' => $jawaban_benar


		);

		$where = array(
			'id_jawaban' => $id_jawaban
		);


		$this->Model_admin->update_hidden_ans($where, $data, 't_jawaban');
		if ($jawaban_benar == 1) {
			$getMoney =	$this->Model_profile->get_wallet($user)->row()->wallet;
			$addMoney = $getMoney + $harga;
			$datawallet = array(
				'wallet'		=> $addMoney
			);
			$wherewallet = array(
				'id_user' => $user
			);
			$this->Model_profile->edit_wallet($datawallet, $wherewallet);
		}
		redirect('AdminPage/detail_question/' . $idpage);
	}

	public function MessageBox()
	{

		$foot['kategori'] = $this->Model_admin->tampil_kategori()->result_array();
		$data['pesan'] = $this->Model_admin->tampil_pesan()->result_array();
		$this->load->view('admin/template/header');
		$this->load->view('admin/message_page', $data);
		$this->load->view('admin/template/footer', $foot);
	}
	public function all_read()
	{
		$data = array(
			'status_baca' => 1
		);

		$this->Model_admin->update_read($data, 't_message');
		redirect('AdminPage/MessageBox');
	}

	public function wa()
	{
		$data['kontak'] = $this->Model_admin->kontak()->result_array();
		$data['kategori'] = $this->Model_admin->tampil_kategori()->result_array();

		$this->load->view('admin/template/header');
		$this->load->view('admin/wa', $data);
		$this->load->view('admin/template/footer');
	}

	public function kirim_wa()
	{
		$token = '3mqkViZWgqz8Y7X9HVEGTDBBBHeAYiMtPZhFyYN5JICSe1Xx3B';
		$phone = ['081553572412', '087850256446'];
		$phone = $this->input->post('no_wa');
		$phone2 = explode(';', $phone);
		$message = $this->input->post('pesan');
		foreach ($phone2 as $key => $val) {
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

					'token' => $token, 'phone' => $phone2[$key], 'message' => $message

				),

			));

			$response = curl_exec($curl);

			curl_close($curl);
			$result =  substr($response, 17, 5);
			if ($result == "false") {
				$data_wa = array(
					'id_user' 		=> $id,
					'pesan'			=> $message,
					'status_kirim'	=> 0
				);
				$this->db->insert('t_wa', $data_wa);
			} else {
				$data_wa = array(
					'id_user' 		=> $id,
					'pesan'			=> $message,
					'status_kirim'	=> 1
				);
				$this->db->insert('t_wa', $data_wa);
			}
			curl_close($curl);
			redirect('auth/Login');
			echo $response;
		}
		redirect('AdminPage/wa');
	}
}
