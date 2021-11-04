<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{

		$data['article'] 	= $this->Model_artikel->get_article_dashboard()->result_array();
		$data['tag'] 	= $this->Model_artikel->get_tag_dashboard()->result_array();
		$data['kategori_tag'] 	= $this->Model_artikel->get_tag_kategori()->result_array();
		$data['tag_artikel'] 	= $this->Model_artikel->get_tag_article_dashboard()->result_array();
		$nav['judul'] = "Upload Artikel";
		$this->load->view('templates/header-page', $nav);

		$this->load->view('artikel/index', $data);
		$this->load->view('templates/footer');
	}
	public function tag($namaTag)
	{
		$where = array(
			'namaTag' => $namaTag
		);
		$cek = $this->Model_artikel->get_tag($where);
		$id = $cek->row();

		$data['article'] 	= $this->Model_artikel->get_article($id->idTag)->result_array();
		$data['tag'] 	= $this->Model_artikel->get_tag_dashboard()->result_array();
		$data['kategori_tag'] 	= $this->Model_artikel->get_tag_kategori()->result_array();
		$data['tag_artikel'] 	= $this->Model_artikel->get_tag_article_dashboard()->result_array();
		$nav['judul'] = "Upload Artikel";
		$this->load->view('templates/header-page', $nav);

		$this->load->view('artikel/index', $data);
		$this->load->view('templates/footer');
	}

	public function detail($slug)
	{
		if ($this->session->userdata('id_user') != null) {
			$data['user_wallet'] = json_encode($this->Model_profile->get_wallet($this->session->userdata('id_user'))->row()->wallet);
		} else {
		}
		$data['artikel_save'] = $this->Model_artikel->artikel_save($slug)->result_array();
		// echo "<pre>"; print_r($data12);exit;
		$data['article'] = $this->Model_artikel->detail_artikel($slug)->row();
		$data['tagg'] = $this->Model_artikel->detail_artikel($slug)->result();
		$data['article_all'] 	= $this->Model_artikel->get_article_dashboard()->result();
		$nav['judul'] = "Upload Artikel";
		$this->load->view('templates/header-page', $nav);

		$this->load->view('artikel/detail', $data);
		$this->load->view('templates/footer');
	}

	public function download_artikel($url, $slug)
	{
		$user = $this->session->userdata('id_user');
		$harga = $this->Model_artikel->detail_artikel($slug)->row();
		$seller_id = $harga->id_user;
		$profile = $this->Model_profile->get_wallet($user)->row()->wallet;
		$user_article = $this->Model_profile->get_wallet($harga->id_user)->row()->wallet;

		$harga_artikel = $harga->harga_artikel;
		$time =	date('Y-m-d H:i:s');
		$updateBuyer = $profile - $harga_artikel;
		$updateSeller = $user_article + $harga_artikel;
		$linkinto = base_url() . 'Artikel/detail' . $slug;



		if ($user != null) {

			$datawallet = array(
				array(
					'id_user' => $user,
					'wallet' => $updateBuyer
				),
				array(
					'id_user' => $seller_id,
					'wallet' => $updateSeller
				)
			);
			$this->db->update_batch('t_profile', $datawallet, 'id_user');
			$idprofil = $this->Model_profile->get_wallet($user)->row()->id_profile;
			$log_money_buyer = array(
				'id_profile' => $idprofil,
				'status_log' => 0,
				'jumlah' => $harga_artikel,
				'ket_log' => 'Mendownload',
				'tgl_log' => $time
			);
			$this->db->insert('log_money', $log_money_buyer);

			$idprofil2 = $this->Model_profile->get_wallet($seller_id)->row()->id_profile;
			$log_money_seller = array(
				'id_profile' => $idprofil2,
				'status_log' => 1,
				'jumlah' => $harga_artikel,
				'ket_log' => 'Artikel Di Download',
				'tgl_log' => $time
			);
			$this->db->insert('log_money', $log_money_seller);

			$this->load->helper('download');
			force_download('assets/pdf/' . $url, NULL);

			redirect('Artikel/detail/' . $slug);
		} else {
			echo "<script>
				alert('Artikel Gagal Disimpan');
				window.location.href = '" . $linkinto . "';// your redirect path here
				</script>";
		}
	}

	public function save()
	{
		$id_artikel = $this->input->post('id_artikel');
		$id_user 	= $this->session->userdata('id_user');

		$where2 = array(
			'id_user'		=> $id_user,
			'id_artikel' 	=> $id_artikel,
		);

		$result = $this->db->get_where('t_artikelbookmark', $where2);
		if ($result->num_rows() > 0) {
			$result->num_rows();
			$save =  $result->row();

			$save2 = $this->db->get_where('t_artikelbookmark', $where2)->result_array();

			if ($save2[0]['status_save'] == 0) {
				$data3 = array(
					'status_save' => 1
				);
			} else {
				$data3 = array(
					'status_save' => 0
				);
			}

			$this->db->update('t_artikelbookmark', $data3, $where2);
		} else {
			$data2 = array(
				'id_user'		=> $id_user,
				'id_artikel' 	=> $id_artikel,
				'status_save'	=> ('1'),
			);

			$this->db->insert('t_artikelbookmark', $data2);
		}
	}
	public function upload()
	{
		// $data['article'] 	= $this->Model_artikel->get_article_dashboard()->result_array();
		$data['tag'] 	= $this->Model_artikel->get_tag_dashboard()->result_array();
		// print_r($data);
		$nav['judul'] = "Upload Artikel";
		$this->load->view('templates/header-page', $nav);
		$this->load->view('artikel/upload_artikel', $data);
		$this->load->view('templates/footer');
	}
	public function save_artikel()
	{
		$user = $this->session->userdata('id_user');
		$judul = $this->input->post('judul');

		$title = trim(strtolower($this->input->post('judul')));
		$out = explode(" ", $title);
		$slug = implode("-", $out);

		$deskripsi = $this->input->post('deskripsi');
		$jumlah_hal = $this->input->post('jumlah_hal');
		$year = $this->input->post('year');
		$penulis = $this->input->post('penulis');
		$tag = $this->input->post('tag[]');
		// echo print_r($tag); exit;
		$harga_artikel = $this->input->post('harga');
		$profile = $this->Model_profile->get_wallet($user)->row();
		$wallet = $profile->wallet;
		// echo $wallet; exit;
		if ($harga_artikel > $wallet) {
			$linkinto = base_url() . 'Artikel/upload';
			echo "<script>
				alert('Uang gak cukup');
				window.location.href = '" . $linkinto . "';// your redirect path here
				</script>";
		} else {
			$harga = $wallet - $harga_artikel;
		}
		date_default_timezone_set('Asia/Jakarta');
		$time = date('Y-m-d H:i:s');
		$upload_file = $_FILES['upload_file']['name'];
		// echo $upload_file;
		if ($upload_file != null) {
			$config['upload_path'] = './assets/pdf/';
			$config['allowed_types'] = 'pdf';

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('upload_file')) {
				$upload_file = $this->upload->data('file_name');
			}
		} else {
			$linkinto = base_url() . 'Artikel/upload';
			echo "<script>
				alert('Artikel Gagal Upload');
				window.location.href = '" . $linkinto . "';// your redirect path here
				</script>";
		}
		$artikel = array(
			'judul_artikel' 	=> $judul,
			'id_user'        	=> $user,
			'tahun_rilis'       => $year,
			'deskripsi_artikel' => $deskripsi,
			'jumlah_halaman' 	=> $jumlah_hal,
			'author' 			=> $penulis,
			'slug' 				=> $slug,
			'file_pdf' 			=> $upload_file,
			'tanggal_upload' 	=> $time,
			'harga_artikel'		=> $harga_artikel
		);
		$data_xss	= $this->security->xss_clean($artikel);
		$upload_artikel		= $this->Model_artikel->upload_artikel($data_xss, 't_artikel');
		$id_artikel =  $this->db->insert_id();
		// echo "<pre>" ; print_r($tag);
		// echo $id_artikel; exit;


		foreach ($tag as $tg) {
			$data1 = array(
				'id_artikel' => $id_artikel,
				'idTag' => $tg
			);
			// echo "<pre>" ; print_r($data1);
			$this->db->insert('t_artikeltag', $data1);
		}
		$datawallet = array(
			'wallet'				=> $harga
		);
		$wherewallet = array(
			'id_user' => $user
		);
		$datawallet_xss = $this->security->xss_clean($datawallet);
		$simpanwallet = $this->Model_profile->edit_wallet($datawallet_xss, $wherewallet);

		$linkinto = base_url() . 'Artikel/';
		echo "<script>
			alert('Berhasil Upload');
			window.location.href = '" . $linkinto . "';// your redirect path here
			</script>";
	}
}
