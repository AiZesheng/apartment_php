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
	// 根据学号查询学生信息
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
	// 根据学生id查询学生信息
	public function get_by_sid () {
		$id = $this->input->post('id');
		$this->load->model('user_model');
		$rs = $this->user_model->get_by_sid($id);
		if ($rs) {
			echo json_encode($rs);
		} else {
			echo 0;
		}
	}
	// 学生信息列表
	public function getStudents () {
		$sname = $this->input->post('sname');
		$sno = $this->input->post('sno');
		$sex = $this->input->post('sex');
		$college = $this->input->post('college');
		$phone = $this->input->post('phone');
		$this->load->model('user_model');
		$rs = $this->user_model->get_students($sname, $sno, $sex, $college, $phone);
		$num = $this->user_model->get_students_total($sname, $sno, $sex, $college, $phone);
		if ($rs) {
			$arr = array(
				'data' => $rs,
				'total' => $num
			);
			echo json_encode($arr);
		} else {
			echo '啥也没有';
		}
	}
	// 学生信息修改
	public function updateStudent () {
		$sno = $this->input->post('sno');
		$name = $this->input->post('name');
		$sex = $this->input->post('sex');
		$college = $this->input->post('college');
		$nativePlace = $this->input->post('nativePlace');
		$political = $this->input->post('political');
		$phone = $this->input->post('phone');
		$this->load->model('user_model');
		$rs = $this->user_model->update_student($sno, $name, $sex, $college, $nativePlace, $political, $phone);
		echo json_encode($rs);
	}
	// 学生信息删除
	public function deleteStudent () {
		$id = $this->input->post('id');
		$this->load->model('user_model');
		$rs = $this->user_model->delete_student($id);
		echo json_encode($rs);
	}
}
?>