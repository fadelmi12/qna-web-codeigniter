<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$nav['judul'] = "Buat Pertanyaan";
		$this->load->view('templates/header-page', $nav);
		$this->load->view('auth/register');
		$this->load->view('templates/footer');
	}
	public function daftar()
	{

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[t_user.nama_user]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[t_user.email]');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required|is_unique[t_profile.no_hp]');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');

		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong!');
		$this->form_validation->set_message('is_unique', '{field} sudah digunakan!');
		$this->form_validation->set_message('matches', '{field} tidak sesuai!');

		if ($this->form_validation->run()) {
			$namalengkap	= $this->input->post('nama_lengkap');
			$username 		= $this->input->post('username');
			$email 			= $this->input->post('email');
			$nohp			= $this->input->post('no_hp');
			$tgl_lahir		= $this->input->post('tgl_lahir');
			$gender			= $this->input->post('gender');
			$pwd 			= $this->input->post('password');
			$password 		= password_hash($pwd, PASSWORD_DEFAULT);
			$roleid			= 2;
			$wallet			= 20;

			$data_user = array(
				'nama_user'	 	=> $username,
				'email' 		=> $email,
				'password' 		=> $password,
				'view_password' => $pwd,
				'role_id' 		=> $roleid
			);

			$data_xss	= $this->security->xss_clean($data_user);
			$regis_user		= $this->Model_login->daftar_user($data_xss, 't_user');

			if ($regis_user) {
				$id =  $this->db->insert_id();
				$data_profil = array(
					'id_user'		=> $id,
					'nama_lengkap' 	=> $namalengkap,
					'no_hp'			=> $nohp,
					'wallet'		=> $wallet,
					'gender'		=> $gender,
					'tgl_lahir' 	=> $tgl_lahir
				);

				$data_xss2 = $this->security->xss_clean($data_profil);
				$regis_profil = $this->Model_login->daftar_user($data_xss2, 't_profile');

				if ($regis_profil) {
					$data_log = array(
						'id_user' 			=> $id,
						'aktivitas' 		=> "registrasi",
						'waktu_aktivitas'	=> date("Y-m-d H:i:s")
					);
					$act = $this->Model_activity->save_activity($data_log);
					if ($act) {
						$token = 'AYu6mII2aIJru9EZqpZ2ymRMkVUOryMdyKuaEXhnvZbxf38OYU';
						$message = "Terimakasih " . $namalengkap . ", Anda telah bergabung dengan Ssiswa Rajin";
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
				// 		echo $response;
						redirect('auth/Login');
					}
				}
			}
		} else {
			$nav['judul'] = "Buat Pertanyaan";
			$this->load->view('templates/header-page', $nav);

			$this->load->view('auth/register');
			$this->load->view('templates/footer');
		}
	}
}
