<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT,DELETE');

class Api extends CI_Controller {
	// 登录
	public function login () {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->load->model('user_model');
		$query = $this->user_model->get_by_username_password($username, $password);
		if ($query) {
			echo json_encode($query);
		} else {
			echo 0;
		}
	}
	// 添加学生
	public function addStudents () {
		$sno = $this->input->post('sno');
		$name = $this->input->post('name');
		$sex = $this->input->post('sex');
		$college = $this->input->post('college');
		$nativePlace = $this->input->post('nativePlace');
		$political = $this->input->post('political');
		$phone = $this->input->post('phone');
		$arr = array(
			'sno' => $sno,
			'name' => $name,
			'sex' => $sex,
			'college' => $college,
			'nativePlace' => $nativePlace,
			'political' => $political,
			'phone' => $phone
		);
		$this->load->model('user_model');
		$rs = $this->user_model->add_students($arr);
		if ($rs) {
			echo 1;
		} else {
			echo 0;
		}
	}
	public function get_by_sno () {
		$sno = $this->input->post('sno');
		$this->load->model('user_model');
		$rs = $this->user_model->get_by_sno($sno);
		if ($rs) {
			echo 1;
		} else {
			echo 0;
		}
	}
}
?>