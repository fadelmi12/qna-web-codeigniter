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
		$data['nav'] = "pertanyaan";
		$this->load->view('admin/template/header', $data);
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
		$data['nav'] = "pertanyaan";
		$this->load->view('admin/template/header', $data);
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
		$data['nav'] = "pertanyaan";
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/question_all', $data);
		$this->load->view('admin/template/footer');
	}
	public function detail_question($qst)
	{
		$data['kategori'] = $this->Model_admin->tampil_kategori()->result_array();
		$data['answer'] = $this->Model_admin->tampil_edit_jawaban($qst)->result_array();
		$data['question'] = $this->Model_admin->detail_question($qst)->result_array();
		$data['nav'] = "pertanyaan";
		$this->load->view('admin/template/header', $data);
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
		$data['nav'] = "pertanyaan";
		$this->load->view('admin/template/header', $data);
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
			date_default_timezone_set("Asia/Jakarta");
			$date = date("Y-m-d H:i:s");
			if ($result == "false") {
				$data_wa = array(
					'id_user' 		=> $id_user,
					'pesan'			=> $message,
					'tanggal'		=> $date,
					'status_kirim'	=> 0
				);
				$this->db->insert('t_wa', $data_wa);
			} else {
				$data_wa = array(
					'id_user' 		=> $id_user,
					'pesan'			=> $message,
					'tanggal'		=> $date,
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
		$data['nav'] = "log-login";
		$this->load->view('admin/template/header', $data);
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
		} elseif ($jawaban_benar == 0) {
			$getMoney =	$this->Model_profile->get_wallet($user)->row()->wallet;
			$addMoney = $getMoney - $harga;
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
		$data['nav'] = "message";
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/message_page', $data);
		$this->load->view('admin/template/footer', $foot);
	}

	public function pesan_blm_terbaca()
	{
		$foot['kategori'] = $this->Model_admin->tampil_kategori()->result_array();
		$data['pesan'] = $this->Model_admin->tampil_pesan_blm_trbca()->result_array();

		$data['nav'] = "wa";
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/message_belum_page', $data);
		$this->load->view('admin/template/footer', $foot);
	}

	public function ubah_status_baca()
	{
		$data = array('status_baca' => ("1"));

		$id_message = $this->input->post('id_pesan');
		$where = array('id_message' => $id_message);

		$this->db->update('t_message', $data, $where);
	}

	public function ubah_status_baca_single($id_message)
	{
		$data = array('status_baca' => ("1"));

		// $id_message = $this->input->post('id_pesan');
		$where = array('id_message' => $id_message);

		$this->db->update('t_message', $data, $where);
		redirect('AdminPage/pesan_blm_terbaca');
	}

	public function all_read()
	{
		$data = array(
			'status_baca' => 1
		);

		$this->Model_admin->update_read($data, 't_message');
		redirect('AdminPage/pesan_blm_terbaca');
	}

	public function wa()
	{
		$data['kontak'] = $this->Model_admin->kontak()->result_array();
		$data['kategori'] = $this->Model_admin->tampil_kategori()->result_array();

		$data['nav'] = "wa";
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/wa', $data);
		$this->load->view('admin/template/footer');
	}

	public function belum_terkirim()
	{
		$data['pesan'] = $this->Model_admin->pesan_belum_terkirim()->result_array();
		$data['kategori'] = $this->Model_admin->tampil_kategori()->result_array();

		$data['nav'] = "wa";
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/belum_terkirim', $data);
		$this->load->view('admin/template/footer');
	}

	public function sudah_terkirim()
	{
		$data['pesan'] = $this->Model_admin->pesan_sudah_terkirim()->result_array();
		$data['kategori'] = $this->Model_admin->tampil_kategori()->result_array();

		$data['nav'] = "wa";
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/sudah_terkirim', $data);
		$this->load->view('admin/template/footer');
	}

	public function kirim_pesan_tertunda()
	{
		$id_pesan 	= $this->input->post('id_pesan');
		$no_wa 		= $this->input->post('no_wa');
		$pesan 		= $this->input->post('pesan');
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

				'token' => $token, 'phone' => $no_wa, 'message' => $pesan

			),

		));

		$response = curl_exec($curl);
		$result =  substr($response, 17, 5);
		if ($result != "false") {

			$data_wa = array(
				'status_kirim'	=> 1
			);
			$update = $this->db->update('t_wa', $data_wa, array('id_wa' => $id_pesan));
			if ($update) {
				redirect('Adminpage/sudah_terkirim');
			}
		} else {
			$this->session->set_flashdata(
				'pesan',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
				<script type ="text/JavaScript">swal("Gagal","Pesan WA belum terkirim, cek apakah device sudah terhung ke Nusa Gateway","error");</script>'
			);
			redirect('Adminpage/belum_terkirim');
		}
		curl_close($curl);
	}

	public function tertunda_kirim_semua()
	{
		$pesan = $this->Model_admin->pesan_sudah_terkirim()->result_array();
		$token = '3mqkViZWgqz8Y7X9HVEGTDBBBHeAYiMtPZhFyYN5JICSe1Xx3B';
		foreach ($pesan as $key) {
			$curl = curl_init();
			$phone = $key['no_wa'];
			$message = $key['pesan'];
			$id_wa = $key['id_wa'];
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

			curl_close($curl);
			$result =  substr($response, 17, 5);
			if ($result != "false") {
				$data_wa = array(
					'status_kirim'	=> 1
				);
				$update = $this->db->update('t_wa', $data_wa, array('id_wa' => $id_wa));
				if ($update) {
					redirect('Adminpage/sudah_terkirim');
				}
			} else {
				$this->session->set_flashdata(
					'pesan',
					'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
					<script type ="text/JavaScript">swal("Gagal","Pesan WA belum terkirim, cek apakah device sudah terhung ke Nusa Gateway","error");</script>'
				);
				redirect('Adminpage/belum_terkirim');
			}
			curl_close($curl);
			// redirect('auth/Login');
			// echo $response;
		}
		// redirect('AdminPage/wa');
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
			// echo json_encode($response);
			// die;

			$result =  substr($response, 17, 5);
			curl_close($curl);

			$no = $phone2[$key];
			$user = $this->Model_profile->getProfile_wa($no)->result_array();
			// foreach ($user as $asu);
			$id_user = $user[0]['id_user'];
			date_default_timezone_set("Asia/Jakarta");
			$date = date("Y-m-d H:i:s");
			if ($result == "false") {
				// echo $id_user;
				// die;
				$data_wa = array(
					'id_user' 		=> $id_user,
					'pesan'			=> $message,
					'tanggal'		=> $date,
					'status_kirim'	=> 0
				);
				// echo json_encode($data_wa);
				// die;
				$this->db->insert('t_wa', $data_wa);
				$this->session->set_flashdata(
					'pesan',
					'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
					<script type ="text/JavaScript">swal("Gagal","Pesan WA belum terkirim, cek apakah device sudah terhung ke Nusa Gateway","error");</script>'
				);
			} else {
				$data_wa = array(
					'id_user' 		=> $id_user,
					'pesan'			=> $message,
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
		}

		redirect('AdminPage/wa');
	}

	public function afiliasi()
	{
		$data['afiliasi'] 	= $this->Model_admin->get_table_afiliasi()->result_array();
		$data['kategori'] 	= $this->Model_dashboard->get_kategori_dasboard()->result_array();

		$data['nav'] = "afiliasi";
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/afiliasi', $data);
		$this->load->view('admin/template/footer');
	}

	public function daftar_afiliasi($id)
	{
		$data['afiliasi'] 	= $this->Model_admin->get_afiliasi($id)->result_array();
		$data['profile']	= $this->Model_profile->getProfile($id)->row()->nama_user;
		$data['kategori'] 	= $this->Model_dashboard->get_kategori_dasboard()->result_array();

		$data['nav'] = "afiliasi";
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/afiliasi_detail', $data);
		$this->load->view('admin/template/footer');
	}
}
