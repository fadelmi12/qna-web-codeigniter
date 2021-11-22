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
			$status_user	= 1;
			$wallet			= 20;

			$data_user = array(
				'nama_user'	 	=> $username,
				'email' 		=> $email,
				'password' 		=> $password,
				'view_password' => $pwd,
				'role_id' 		=> $roleid,
				'status_user'	=> $status_user,
				'kode_afiliasi'	=> md5($username)
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
						$token = '3mqkViZWgqz8Y7X9HVEGTDBBBHeAYiMtPZhFyYN5JICSe1Xx3B';
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
						$result =  substr($response, 17, 5);
						if ($result == "false") {
							$data_wa = array(
								'id_user' 		=> $id,
								'pesan'			=> $message,
								'tanggal'		=> date('Y-M-d H:i:s'),
								'status_kirim'	=> 0
							);
							$this->db->insert('t_wa', $data_wa);
						} else {
							$data_wa = array(
								'id_user' 		=> $id,
								'pesan'			=> $message,
								'tanggal'		=> date('Y-M-d H:i:s'),
								'status_kirim'	=> 1
							);
							$this->db->insert('t_wa', $data_wa);
						}
						curl_close($curl);
						redirect('auth/Login');

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
	public function afiliasi($otp)
	{
		$nav['judul']		= "Buat Pertanyaan";
		$data['afiliasi']	= $this->Model_profile->get_table_where('t_user', array('kode_afiliasi' => $otp))->result_array();
		$data['user']		= $this->Model_profile->get_no_wa()->result_array();
		$this->load->view('templates/header-page', $nav);
		$this->load->view('auth/register_afiliasi', $data);
		$this->load->view('templates/footer');
	}
	public function kirim_otp()
	{
		$this->form_validation->set_rules('no_wa', 'No Whatsapp', 'required|is_unique[t_profile.no_hp]');
		$no_wa		= $this->input->post('no_wa');
		$kode_otp	= rand(100000, 999999);
		$now 		= date('Y-m-d H:i:s');
		$datetime 	= new DateTime($now);
		$datetime->modify('+5 minute');
		$kadaluarsa = $datetime->format('Y-m-d H:i:s');
		$data_otp = array(
			'no_wa'			=> $no_wa,
			'kode_otp'		=> $kode_otp,
			'kadaluarsa'	=> $kadaluarsa
		);
		$get_otp = $this->Model_profile->get_table_where('t_otp', array('no_wa' => $no_wa))->row();
		if (isset($get_otp)) {
			$this->db->update('t_otp', $data_otp, array('no_wa' => $no_wa));
			$token = '3mqkViZWgqz8Y7X9HVEGTDBBBHeAYiMtPZhFyYN5JICSe1Xx3B';
			$message = "Kode OTP kamu : " . $kode_otp;
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
					'token' => $token, 'phone' => $no_wa, 'message' => $message
				),
			));
			$response = curl_exec($curl);
			curl_close($curl);
		} else {
			$this->db->insert('t_otp', $data_otp);
			$token = '3mqkViZWgqz8Y7X9HVEGTDBBBHeAYiMtPZhFyYN5JICSe1Xx3B';
			$message = "Kode OTP kamu : " . $kode_otp;
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
					'token' => $token, 'phone' => $no_wa, 'message' => $message
				),
			));
			$response = curl_exec($curl);
			curl_close($curl);
		}
	}
	public function daftar_afiliasi($afiliasi)
	{
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[t_user.nama_user]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[t_user.email]');
		$this->form_validation->set_rules('no_hp', 'No Whatsapp', 'required|is_unique[t_profile.no_hp]');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('kode_otp', 'Kode OTP', 'required');
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
			$kode_otp		= $this->input->post('kode_otp');
			$now			= date('Y-m-d H:i:s');
			$get_otp	= $this->Model_profile->get_table_where('t_otp', array('no_wa' => $nohp))->row();
			if ($get_otp->kode_otp == $kode_otp) {
				if ($get_otp->kadaluarsa >= $now) {
					$data_user = array(
						'nama_user'	 	=> $username,
						'email' 		=> $email,
						'password' 		=> $password,
						'view_password' => $pwd,
						'role_id' 		=> $roleid,
						'status_user'	=> 1,
						'kode_afiliasi'	=> md5($username)
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
							$kode_afiliasi 	= $this->input->post('afiliasi');
							$afil_user		= $this->Model_profile->getAfiliate($kode_afiliasi)->result_array();
							$id_user_afil	= $afil_user[0]['id_user'];
							$koin			= $afil_user[0]['wallet'];
							$koin_new		= $koin + 15;
							$data_koin		= array(
								'wallet'	=> $koin_new
							);
							$add_coin		= $this->db->update('t_profile', $data_koin, array('id_user' => $id_user_afil));
							if ($add_coin) {
								// $id_profile = $afil_user[0]['id_profile'];
								$log_money 	= array(
									'id_user'	=> $id_user_afil,
									'status_log' 	=> 0,
									'jumlah' 		=> 15,
									'ket_log' 		=> 'Mendapat Koin afiliasi',
									'tgl_log' 		=> date("Y-m-d H:i:s")
								);
								$this->db->insert('log_money', $log_money);

								$data_afil = array(
									'id_user_afil' 	=> $id_user_afil,
									'id_user_new'	=> $id,
									'koin'			=> 15,
									'tgl_afiliasi'	=> date("Y-m-d H:i:s")
								);
								$this->db->insert('t_afiliasi', $data_afil);
							}
							$data_log = array(
								'id_user' 			=> $id,
								'aktivitas' 		=> "registrasi",
								'waktu_aktivitas'	=> date("Y-m-d H:i:s")
							);
							$act = $this->Model_activity->save_activity($data_log);
							if ($act) {
								$token = '3mqkViZWgqz8Y7X9HVEGTDBBBHeAYiMtPZhFyYN5JICSe1Xx3B';
								$message = "Terimakasih " . $namalengkap . ", Anda telah bergabung dengan Siswa Rajin";
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
								$result =  substr($response, 17, 5);
								if ($result == "false") {
									$data_wa = array(
										'id_user' 		=> $id,
										'pesan'			=> $message,
										'tanggal'		=> date('Y-m-d H:i:s'),
										'status_kirim'	=> 0
									);
									$this->db->insert('t_wa', $data_wa);
								} else {
									$data_wa = array(
										'id_user' 		=> $id,
										'pesan'			=> $message,
										'tanggal'		=> date('Y-m-d H:i:s'),
										'status_kirim'	=> 1
									);
									$this->db->insert('t_wa', $data_wa);
								}
								curl_close($curl);
								redirect('auth/Login');
							}
						}
					}
				} else {
					echo "<script>
				alert('Kode OTP sudah kadaluarsa!');
				</script>";
				}
			} else {
				echo "<script>
				alert('Kode OTP tidak sesuai!');
			</script>";
			}
		} else {
			$nav['judul'] = "Buat Pertanyaan";
			$this->load->view('templates/header-page', $nav);

			$this->load->view('auth/register_afiliasi');
			$this->load->view('templates/footer');
		}
	}
}
