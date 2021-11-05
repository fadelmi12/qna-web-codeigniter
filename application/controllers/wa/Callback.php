<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Callback extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://siswarajin.com/wa/Callback',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
        "ischat":true,
        "message":"tes callback",
        "phone":"62812345xxxx",
        "category":"private",
        "chatid":"62812345xxxx@c.us",
        "id":"false_62812345xxxx@c.us_82A2809584FFB4AD6BDDC88131D905A8",
        "pushname":"Nama Kontak",
        "instance":16,
        "time":1589054616,
        "type":"chat",
        "lat":null,
        "lng":null,
        "caption":null,
        "isForwarded":false,
        "quotemsgbody":null,
        "profilepic":null,
        "groupname":null
    }',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo json_encode($response);
    }
}
