<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$params = array('server_key' => 'Mid-server-NHwVeuVMW19aFKRWb4aQ7oTB', 'production' => true);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('midtrans/checkout_snap');
	}

	public function token()
	{
		$topup = $this->input->post('topup');
		$code = date("Hidmy");
		$id = $this->session->userdata('id_user');
		$user = $this->Model_profile->getProfile($id)->row();

		// Required
		$transaction_details = array(
			'order_id' => rand(100, 999) . $code . $id,
			'gross_amount' => $topup + 1000, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
			'id' => 'a1',
			'price' => $topup,
			'quantity' => 1,
			'name' => "Top Up"
		);

		// Optional
		$item2_details = array(
			'id' => 'a2',
			'price' => 1000,
			'quantity' => 1,
			'name' => "Biaya Admin"
		);

		// Optional
		$item_details = array($item1_details, $item2_details);

		// Optional
		$billing_address = array(
			'first_name'    => "Andri",
			'last_name'     => "Litani",
			'address'       => "Mangga 20",
			'city'          => "Jakarta",
			'postal_code'   => "16602",
			'phone'         => "081122334455",
			'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
			'first_name'    => "Obet",
			'last_name'     => "Supriadi",
			'address'       => "Manggis 90",
			'city'          => "Jakarta",
			'postal_code'   => "16601",
			'phone'         => "08113366345",
			'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
			'first_name'    => $user->nama_lengkap,
			// 'last_name'     => "Litani",
			'email'         => $user->email,
			'phone'         => $user->no_hp,
			// 'billing_address'  => $billing_address,
			// 'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'day',
			'duration'  => 1
		);

		$transaction_data = array(
			'transaction_details' => $transaction_details,
			'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}

	public function finish()
	{
		$result = json_decode($this->input->post('result_data'), true);

		$id_user = $this->session->userdata('id_user');

		if ($result['payment_type'] == "gopay") {
			$data = array(
				'id_user'			=> $id_user,
				'id_topup' 			=> $result['order_id'],
				'status_code'		=> $result['status_code'],
				'total_topup'		=> $result['gross_amount'],
				'payment_type'		=> $result['payment_type'],
				'transaction_time'	=> $result['transaction_time']
			);
		} elseif ($result['payment_type'] == "bank_transfer") {
			$data = array(
				'id_user'			=> $id_user,
				'id_topup' 			=> $result['order_id'],
				'status_code'		=> $result['status_code'],
				'total_topup'		=> $result['gross_amount'],
				'payment_type'		=> $result['payment_type'],
				'transaction_time'	=> $result['transaction_time'],
				'pdf_url'			=> $result['pdf_url']
			);
		}


		$simpan = $this->db->insert('t_transaksi', $data);

		if ($simpan) {
			redirect(base_url('Profile/topup'));
		}
	}
}
