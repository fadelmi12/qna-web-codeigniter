<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$params = array('server_key' => 'Mid-server-NHwVeuVMW19aFKRWb4aQ7oTB', 'production' => true);
		$this->load->library('veritrans');
		$this->veritrans->config($params);
		$this->load->helper('url');
	}

	public function index()
	{
		echo 'test notification handler';
		$json_result = file_get_contents('php://input');
		$result = json_decode($json_result, true);

		$id = $result['order_id'];
		$data = array(
			'status_code' => $result['status_code']
		);

		echo json_encode($result);

		if ($result['status_code'] == 200) {
			$id_user = substr($result['order_id'], 13, 100);
			$wallet = $this->Model_profile->getProfile($id_user)->row()->wallet;
			$wallet_new = ($result['gross_amount'] - 1000) / 100;
			$time = date('Y-m-d H:i:s');


			$update = $this->db->update('t_transaksi', $data, array('id_topup' => $id));

			if ($update) {
				$dt = array(
					'wallet' => $wallet + $wallet_new
				);

				$this->db->update('t_profile', $dt, array('id_user' => $id_user));
				$idprofil = $this->Model_profile->getProfile($id_user)->row()->id_profile;
				$log_money = array(
					'id_profile' => $idprofil,
					'status_log' => 1,
					'jumlah' => $wallet_new,
					'ket_log' => 'Top Up Coin',
					'tgl_log' => $time
				);
				$this->db->insert('log_money', $log_money);
			}
		}

		//notification handler sample

		/*
		$transaction = $notif->transaction_status;
		$type = $notif->payment_type;
		$order_id = $notif->order_id;
		$fraud = $notif->fraud_status;

		if ($transaction == 'capture') {
		  // For credit card transaction, we need to check whether transaction is challenge by FDS or not
		  if ($type == 'credit_card'){
		    if($fraud == 'challenge'){
		      // TODO set payment status in merchant's database to 'Challenge by FDS'
		      // TODO merchant should decide whether this transaction is authorized or not in MAP
		      echo "Transaction order_id: " . $order_id ." is challenged by FDS";
		      } 
		      else {
		      // TODO set payment status in merchant's database to 'Success'
		      echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
		      }
		    }
		  }
		else if ($transaction == 'settlement'){
		  // TODO set payment status in merchant's database to 'Settlement'
		  echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
		  } 
		  else if($transaction == 'pending'){
		  // TODO set payment status in merchant's database to 'Pending'
		  echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
		  } 
		  else if ($transaction == 'deny') {
		  // TODO set payment status in merchant's database to 'Denied'
		  echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
		}*/
	}
}
