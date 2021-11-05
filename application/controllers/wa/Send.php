<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Send extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $nav['judul'] = "Kirim WA";
        $this->load->view('templates/header-page', $nav);
        $this->load->view('wa/send');
        $this->load->view('templates/footer');
    }

    public function kirim()
    {

        $token = 'AYu6mII2aIJru9EZqpZ2ymRMkVUOryMdyKuaEXhnvZbxf38OYU';
        $phone = $this->input->post('no_wa');


        $message = $this->input->post('pesan');
        $url = 'http://nusagateway/api/send-message.php';
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

        curl_close($curl);
        echo $response;
    }

    public function kirim_bc()
    {
        // $no_wa = $this->input->post('no_wa');
        // $pesan = $this->input->post('pesan');
        // echo "Nomor WA : " . $no_wa;
        // echo "Pesan : " . $pesan;

        // Pastikan phone menggunakan kode negara atau
        // 62 di depannya untuk Indonesia atau
        // bisa menggunakan 0 jika nomor tujuan Indonesia

        $token = 'AYu6mII2aIJru9EZqpZ2ymRMkVUOryMdyKuaEXhnvZbxf38OYU';
        // $phone = $this->input->post('no_wa');

        $phone = ['081553572412', '087850256446'];
        $phone = $this->input->post('no_wa');
        $phone2 = explode(';', $phone);
        // echo json_encode($phone2);
        // $phone2 = explode(';', $phone);
        $message = $this->input->post('pesan');
        $url = 'http://nusagateway/api/send-message.php';
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
            echo $response;
        }
    }
}
