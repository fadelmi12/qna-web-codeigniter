<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	public function __construct()
	{
		date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
		if ($this->session->userdata('id_user') == null) {
			redirect('');
		}
	}
	public function index()
	{
		if ($this->session->userdata('id_user') != null) {
			$user = $this->session->userdata('id_user');
			$duit = $this->Model_profile->get_wallet($user)->row()->wallet;
			$data['money'] = json_encode($duit);
		} else {
		}
		$nav['judul'] = "Buat Pertanyaan";
		$nav['sidebar'] = "dashboard";
		$id = $this->session->userdata('id_user');
		$this->load->view('templates/header-page', $nav);
		$data['datadiri'] = $this->Model_profile->getProfile($id)->row();
		$data['Qcount'] = $this->Model_profile->QuestCount($id)->result_array();
		$data['Arcount'] = $this->Model_profile->ArCount($id)->result_array();
		$data['riwayat_jawab'] = $this->Model_profile->riwayat_jawab($id)->result_array();
		$this->load->view('profil/index', $data);
		$this->load->view('templates/footer');
	}

	public function daftar_pertanyaan()
	{
		if ($this->session->userdata('id_user') != null) {
			$user = $this->session->userdata('id_user');
			$duit = $this->Model_profile->get_wallet($user)->row()->wallet;
			$data['money'] = json_encode($duit);
		} else {
		}
		$nav['judul'] = "Buat Pertanyaan";
		$nav['sidebar'] = "daftar_pertanyaan";
		$this->load->view('templates/header-page', $nav);
		$id = $this->session->userdata('id_user');
		$data['datadiri'] = $this->Model_profile->getProfile($id)->row();
		$data['Question'] = $this->Model_profile->QuestCount($id)->result_array();
		$this->load->view('profil/daftar_pertanyaan', $data);
		$this->load->view('templates/footer');
	}
	public function daftar_artikel()
	{
		if ($this->session->userdata('id_user') != null) {
			$user = $this->session->userdata('id_user');
			$duit = $this->Model_profile->get_wallet($user)->row()->wallet;
			$data['money'] = json_encode($duit);
		} else {
		}
		$nav['judul'] = "Upload Artikel";
		$nav['sidebar'] = "daftar_artikel";
		$this->load->view('templates/header-page', $nav);
		$id = $this->session->userdata('id_user');
		$data['datadiri'] = $this->Model_profile->getProfile($id)->row();
		$data['artikel'] = $this->Model_profile->ArCount($id)->result_array();
		$this->load->view('profil/daftar_artikel', $data);
		$this->load->view('templates/footer');
	}
	public function riwayat_jawab()
	{
		if ($this->session->userdata('id_user') != null) {
			$user = $this->session->userdata('id_user');
			$duit = $this->Model_profile->get_wallet($user)->row()->wallet;
			$data['money'] = json_encode($duit);
		} else {
		}
		$nav['judul'] = "Buat Pertanyaan";
		$nav['sidebar'] = "riwayat_jawab";
		$this->load->view('templates/header-page', $nav);
		$id = $this->session->userdata('id_user');
		$data['datadiri'] = $this->Model_profile->getProfile($id)->row();
		$data['riwayat_jawab'] = $this->Model_profile->riwayat_jawab($id)->result_array();
		// echo json_encode($data);
		// die;
		$this->load->view('profil/riwayat_jawab', $data);
		$this->load->view('templates/footer');
	}
	public function pertanyaan_tersimpan()
	{
		if ($this->session->userdata('id_user') != null) {
			$user = $this->session->userdata('id_user');
			$duit = $this->Model_profile->get_wallet($user)->row()->wallet;
			$data['money'] = json_encode($duit);
		} else {
		}
		$nav['judul'] = "Buat Pertanyaan";
		$nav['sidebar'] = "pertanyaan_tersimpan";
		$this->load->view('templates/header-page', $nav);
		$id = $this->session->userdata('id_user');
		$data['datadiri'] = $this->Model_profile->getProfile($id)->row();
		$data['bookmark'] = $this->Model_profile->bookmark_profile($id)->result_array();
		$this->load->view('profil/pertanyaan_tersimpan', $data);
		$this->load->view('templates/footer');
	}
	public function artikel_tersimpan()
	{
		if ($this->session->userdata('id_user') != null) {
			$user = $this->session->userdata('id_user');
			$duit = $this->Model_profile->get_wallet($user)->row()->wallet;
			$data['money'] = json_encode($duit);
		} else {
		}
		$nav['judul'] = "Upload Artikel";
		$nav['sidebar'] = "artikel_tersimpan";
		$this->load->view('templates/header-page', $nav);
		$id = $this->session->userdata('id_user');
		$data['datadiri'] = $this->Model_profile->getProfile($id)->row();
		$data['save_art'] = $this->Model_profile->artikel_saving($id)->result_array();
		$this->load->view('profil/artikel_tersimpan', $data);
		$this->load->view('templates/footer');
	}
	public function keuangan()
	{
		if ($this->session->userdata('id_user') != null) {
			$user = $this->session->userdata('id_user');
			$duit = $this->Model_profile->get_wallet($user)->row()->wallet;
			$data['money'] = json_encode($duit);
		} else {
		}
		$nav['judul'] = "Buat Pertanyaan";
		$nav['sidebar'] = "keuangan";
		$this->load->view('templates/header-page', $nav);
		$id = $this->session->userdata('id_user');
		$data['datadiri'] = $this->Model_profile->getProfile($id)->row();
		$this->load->view('profil/keuangan', $data);
		$this->load->view('templates/footer');
	}

	public function pengaturan()
	{
		if ($this->session->userdata('id_user') != null) {
			$user = $this->session->userdata('id_user');
			$duit = $this->Model_profile->get_wallet($user)->row()->wallet;
			$data['money'] = json_encode($duit);
		} else {
		}
		$nav['judul'] = "Buat Pertanyaan";
		$nav['sidebar'] = "pengaturan";
		$this->load->view('templates/header-page', $nav);
		$id = $this->session->userdata('id_user');
		$data['datadiri'] = $this->Model_profile->getProfile($id)->row();
		$this->load->view('profil/setting', $data);
		$this->load->view('templates/footer');
	}

	public function topup()
	{
		if ($this->session->userdata('id_user') != null) {
			$user = $this->session->userdata('id_user');
			$duit = $this->Model_profile->get_wallet($user)->row()->wallet;
			$data['money'] = json_encode($duit);
		} else {
		}
		$nav['judul'] = "Buat Pertanyaan";
		$nav['sidebar'] = "pengaturan";
		$this->load->view('templates/header-page', $nav);
		$id = $this->session->userdata('id_user');
		$data['datadiri'] = $this->Model_profile->getProfile($id)->row();
		$data['transaksi'] = $this->Model_profile->getTransaksi($id)->result_array();
		$this->load->view('profil/top-up', $data);
		$this->load->view('templates/footer');
	}
	public function penarikan()
	{
		if ($this->session->userdata('id_user') != null) {
			$user = $this->session->userdata('id_user');
			$duit = $this->Model_profile->get_wallet($user)->row()->wallet;
			$data['money'] = json_encode($duit);
		} else {
		}
		$profil = $this->Model_profile->get_wallet($this->session->userdata('id_user'))->row()->id_profile;
		$data['riwayat_tarik'] = $this->Model_profile->get_riwayat($profil)->result();
		$nav['judul'] = "Buat Pertanyaan";
		$nav['sidebar'] = "pengaturan";
		$this->load->view('templates/header-page', $nav);
		$id = $this->session->userdata('id_user');
		$data['datadiri'] = $this->Model_profile->getProfile($id)->row();
		$data['transaksi'] = $this->Model_profile->getTransaksi($id)->result_array();
		$this->load->view('profil/penarikan', $data);
		$this->load->view('templates/footer');
	}
	public function tarik_uang()
	{
		if ($this->session->userdata('id_user') != null) {
			$user = $this->session->userdata('id_user');
			$duit = $this->Model_profile->get_wallet($user)->row()->wallet;
			$data['money'] = json_encode($duit);
		} else {
		}
		if ($this->Model_profile->get_wallet($this->session->userdata('id_user'))->row()->no_rek == null && $this->Model_profile->get_wallet($this->session->userdata('id_user'))->row()->nama_bank == null) {

			echo '<script language="javascript"> 
			alert("Mohon Lengkapi dulu Bank dan No rekening");
			window.history.back();
			</script>';
		} else {


			$profil = $this->Model_profile->get_wallet($user)->row()->id_profile;
			$coin =	$this->input->post('tarik_coin');
			$sisa_coin = $duit - $coin;
			$datawallet = array(
				'wallet'				=> $sisa_coin
			);
			$wherewallet = array(
				'id_user' => $user
			);
			$jumlah_uang = $coin * 100 - 5000;
			$datawallet_xss = $this->security->xss_clean($datawallet);
			$this->Model_profile->edit_wallet($datawallet_xss, $wherewallet);
			$date = date('ymdHis');
			$data_penarikan = array(
				'id_profile' => $profil,
				'jumlah_coin' => $coin,
				'jumlah_uang' => $jumlah_uang,
				'tgl_penarikan' => $date,
				'status_terkirim' => 0

			);
			$this->Model_profile->riwayat_penarikan('t_penarikan', $data_penarikan);
			redirect('Profile/penarikan');
		}
	}





	public function edit()
	{
		if ($this->session->userdata('id_user') != null) {
			$user = $this->session->userdata('id_user');
			$duit = $this->Model_profile->get_wallet($user)->row()->wallet;
			$data['money'] = json_encode($duit);
		} else {
		}
		$nav['judul'] = "Buat Pertanyaan";
		$nav['sidebar'] = "edit_profil";
		$id = $this->session->userdata('id_user');
		$data['datadiri'] = $this->Model_profile->getProfile($id)->row();
		$id_prov = $this->Model_profile->getProfile($id)->row()->provinsi;
		$data['provinsi'] = $this->Model_profile->get_prov()->result_array();
		$where = array('provinsi_id' => $id_prov);
		$data['kota'] = $this->Model_profile->get_kota($where)->result_array();
		$this->load->view('templates/header-page', $nav);
		$this->load->view('profil/edit_profil', $data);
		$this->load->view('templates/footer');
	}

	public function save_editprofile()
	{
		$id = $this->session->userdata('id_user');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$no_hp = $this->input->post('no_hp');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$alamat = $this->input->post('alamat');
		$provinsi = $this->input->post('provinsi');
		$kota = $this->input->post('kota');
		$jenis_kelamin = $this->input->post('jenis_kelamin');

		$data_user = array(
			'nama_user' => $username,
			'email' => $email,
		);

		$data_xss = $this->security->xss_clean($data_user);

		$where = array('id_user' => $id);

		$update = $this->Model_profile->update_profil('t_user', $data_xss, $where);
		if ($update) {
			$data_profil = array(
				'nama_lengkap' => $nama_lengkap,
				'no_hp' => $no_hp,
				'tgl_lahir' => $tgl_lahir,
				'alamat' => $alamat,
				'provinsi' => $provinsi,
				'kota' => $kota,
				'gender' => $jenis_kelamin
			);

			$data_xss = $this->security->xss_clean($data_profil);
			$update_profil = $this->Model_profile->update_profil('t_profile', $data_xss, $where);

			if ($update_profil) {
				redirect(base_url('profile'));
			}
		}
	}

	public function save_foto_profil()
	{
		$id = $this->session->userdata('id_user');
		// $foto_profil = $_FILES['foto_profil']['name'];

		$date = date('ymdHis');
		$nmfile = "user" . $id . $date;
		$config['upload_path']		= './assets/img/foto_user/';
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['file_name'] = $nmfile;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto_profil')) {
			$this->session->set_flashdata('pesan1');
			redirect('Profile/edit');
		} else {
			$file = $this->upload->data();
		}

		$data = array(
			'foto_user'              => $file['file_name']
			// 'foto_user'      => $foto_profil
		);

		$data_xss = $this->security->xss_clean($data);

		$foto_lama = $this->Model_profile->getProfile($id)->row()->foto_user;
		// redirect()
		unlink(base_url() . '/assets/img/foto_user' . $foto_lama);

		$save = $this->Model_profile->update_profil('t_user', $data_xss, array('id_user' => $id));
		if ($save) {
			redirect('Profile');
		} else {
			echo "Gagal";
		}
	}

	public function get_kota()
	{
		$id = $this->input->post('id');
		$where = array('provinsi_id' => $id);
		$data = $this->Model_profile->get_kota($where)->result_array();
		echo json_encode($data);
	}

	public function edit_rekening()
	{
		$this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required');
		$this->form_validation->set_rules('no_rek', 'No Rekening', 'required');
		$this->form_validation->set_rules('nama_rek', 'Nama Rekening', 'required');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong!');

		if ($this->form_validation->run()) {
			$id 		= $this->session->userdata('id_user');
			$nama_bank 	= $this->input->post('nama_bank');
			$no_rek		= $this->input->post('no_rek');
			$nama_rek	= $this->input->post('nama_rek');

			$data = array(
				'nama_bank' => $nama_bank,
				'no_rek'	=> $no_rek,
				'nama_rek'	=> $nama_rek
			);

			$data_xss = $this->security->xss_clean($data);

			$where = array('id_user' => $id);

			$edit_rek = $this->Model_profile->update_profil('t_profile', $data_xss, $where);
			if ($edit_rek) {
				redirect('Profile/keuangan');
			}
		}
	}
}
