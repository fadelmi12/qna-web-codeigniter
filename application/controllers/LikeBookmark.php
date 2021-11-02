<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LikeBookmark extends CI_Controller
{	
	public function like()
	{	
		$id_pertanyaan	= $this->input->post('id_pertanyaan');
		$id_user 		= $this->session->userdata('id_user');

		$where = array(
			'id_user'		=> $id_user,
			'id_pertanyaan' => $id_pertanyaan,
		);
		
		$result = $this->db->get_where('t_like', $where);
		if ($result->num_rows() > 0) {
			$result->num_rows();
			$like =  $result->row();

			$like2 = $this->db->get_where('t_like', $where)->result_array();

			if ($like2[0]['status_like'] == 0) {
				$data = array(
					'status_like' => 1
				);
			} else {
				$data = array(
					'status_like' => 0
				);
			}

			$this->db->update('t_like', $data, $where);
			
		}else{

			$data2 = array(
				'id_user'		=> $id_user,
				'id_pertanyaan' => $id_pertanyaan,
				'status_like'	=> ('1'),
			);

			$this->db->insert('t_like', $data2);
		}

		$suu = array(
			'id_pertanyaan' => $id_pertanyaan,
			'status_like'	=> '1'
		);
		$a = $this->db->get_where('t_like', $suu)->result_array();
		echo json_encode($a);
	}
	public function love()
	{	
		$id_jawaban	= $this->input->post('id_jawaban');
		$id_user 		= $this->session->userdata('id_user');

		$where = array(
			'id_user'		=> $id_user,
			'id_jawaban' => $id_jawaban,
		);
		
		$result = $this->db->get_where('t_love', $where);
		if ($result->num_rows() > 0) {
			$result->num_rows();
			$like =  $result->row();

			$like2 = $this->db->get_where('t_love', $where)->result_array();

			if ($like2[0]['status_love'] == 0) {
				$data = array(
					'status_love' => 1
				);
			} else {
				$data = array(
					'status_love' => 0
				);
			}

			$this->db->update('t_love', $data, $where);
			
		}else{

			$data2 = array(
				'id_user'		=> $id_user,
				'id_jawaban' => $id_jawaban,
				'status_love'	=> ('1'),
			);

			$this->db->insert('t_love', $data2);
		}

		$suu = array(
			'id_jawaban' => $id_jawaban,
			'status_love'	=> '1'
		);
		$a = $this->db->get_where('t_love', $suu)->result_array();
		echo json_encode($a);
	}

	public function bookmark()
	{
		$id_pertanyaan	= $this->input->post('id_pertanyaan');
		$id_user 		= $this->session->userdata('id_user');
		
		$where2 = array(
			'id_user'		=> $id_user,
			'id_pertanyaan' => $id_pertanyaan,
		);

		$result = $this->db->get_where('t_bookmark', $where2);
		if ($result->num_rows() > 0) {
			$result->num_rows();
			$bookmark =  $result->row();

			$bookmark2 = $this->db->get_where('t_bookmark', $where2)->result_array();

			if ($bookmark2[0]['status_bookmark'] == 0) {
				$data3 = array(
					'status_bookmark' => 1
				);
			} else {
				$data3 = array(
					'status_bookmark' => 0
				);
			}

			$update = $this->db->update('t_bookmark', $data3, $where2);
			
		}else{
			$data2 = array(
				'id_user'		=> $id_user,
				'id_pertanyaan' => $id_pertanyaan,
				'status_bookmark'	=> ('1'),
			);

			$book_prt = $this->db->insert('t_bookmark', $data2);
			echo json_encode($book_prt);
		}
		
	}
}