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
	// 注册
	public function regist () {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$arr = array(
			'username' => $username,
			'password' => $password
		);
		$this->load->model('user_model');
		$rs = $this->user_model->get_by_username($username);
		if ($rs) {
			echo '用户名已存在';
		} else {
			$query = $this->user_model->regist($arr);
			$query2 = $this->user_model->get_by_username_password($username, $password);
			if ($query2) {
				echo json_encode($query2);
			} else {
				echo 0;
			}
		}
	}
	// 添加学生
	public function addStudents () {
		$idNumber = $this->input->post('idNumber');
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
			'phone' => $phone,
			'idNumber' => $idNumber
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
		$pageNo = $this->input->post('pageNo');
		$pageSize = $this->input->post('pageSize');
		$pageNo = ($pageNo - 1) * 10;
		$this->load->model('user_model');
		$rs = $this->user_model->get_students($sname, $sno, $sex, $college, $phone, $pageNo, $pageSize);
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
		$idNumber = $this->input->post('idNumber');
		$sno = $this->input->post('sno');
		$name = $this->input->post('name');
		$sex = $this->input->post('sex');
		$college = $this->input->post('college');
		$nativePlace = $this->input->post('nativePlace');
		$political = $this->input->post('political');
		$phone = $this->input->post('phone');
		$this->load->model('user_model');
		$rs = $this->user_model->update_student($idNumber, $sno, $name, $sex, $college, $nativePlace, $political, $phone);
		echo json_encode($rs);
	}
	// 学生信息删除
	public function deleteStudent () {
		$id = $this->input->post('id');
		$this->load->model('user_model');
		$rs = $this->user_model->delete_student($id);
		echo json_encode($rs);
	}
	// 添加宿舍楼名称
	public function addApartment () {
		$apartment = $this->input->post('apartment');
		$arr = array(
			'apartment' => $apartment
		);
		$this->load->model('user_model');
		$rs = $this->user_model->addApartment($arr);
		if ($rs) {
			echo 1;
		} else {
			echo 0;
		}
	}
	// 拿所有宿舍楼名称
	public function getApartment () {
		$this->load->model('user_model');
		$rs = $this->user_model->getApartment();
		echo json_encode($rs);
	}
	// 添加房间
	public function addRoom () {
		$apartmentId = $this->input->post('apartmentId');
		$roomNo = $this->input->post('roomNo');
		$roomType = $this->input->post('roomType');
		$this->load->model('user_model');
		$arr = array(
			'apartment_id' => $apartmentId,
			'roomNo' => $roomNo,
			'roomType' => $roomType
		);
		$rs = $this->user_model->addRoom($arr);
		echo json_encode($rs);
	}
	// 添加房间的唯一性校验
	public function get_by_apartmentId_roomNo () {
		$apartmentId = $this->input->post('apartmentId');
		$roomNo = $this->input->post('roomNo');
		$this->load->model('user_model');
		$rs = $this->user_model->get_by_apartmentId_roomNo($apartmentId, $roomNo);
		if ($rs) {
			echo 1;
		} else {
			echo 0;
		}
	}
	// 房间列表
	public function getRooms () {
		$apartment = $this->input->post('apartment');
		$roomType = $this->input->post('roomType');
		$roomNo = $this->input->post('roomNo');
		$this->load->model('user_model');
		$rs = $this->user_model->getRooms($apartment, $roomType, $roomNo);
		if ($rs) {
			echo json_encode($rs);
		} else {
			echo '啥也没有';
		}
	}
	// 通过宿舍楼id查房间号
	public function get_by_apartmentId () {
		$apartmentId = $this->input->post('apartmentId');
		$this->load->model('user_model');
		$rs = $this->user_model->get_by_apartmentId($apartmentId);
		echo json_encode($rs);
	}
	// 给学生设置寝室
	public function setRoom () {
		$studentId = $this->input->post('studentId');
		$roomId = $this->input->post('roomId');
		$this->load->model('user_model');
		$rs = $this->user_model->setRoom($studentId, $roomId);
		if ($rs) {
			echo 1;
		} else {
			echo 0;
		}
	}
	// 给学生更换寝室
	public function changeRoom () {
		$studentId = $this->input->post('studentId');
		$roomId = $this->input->post('roomId');
		$this->load->model('user_model');
		$rs = $this->user_model->changeRoom($studentId, $roomId);
		if ($rs) {
			echo 1;
		} else {
			echo 0;
		}
	}
	// 判断房间是否已满
	public function isFull () {
		$roomId = $this->input->post('roomId');
		$this->load->model('user_model');
		$rs = $this->user_model->isFull($roomId);
		echo json_encode($rs);
	}
	// 房间信息修改
	public function editRoom () {
		$apartmentId = $this->input->post('apartmentId');
		$roomNo = $this->input->post('roomNo');
		$roomType = $this->input->post('roomType');
		$roomId = $this->input->post('roomId');
		$this->load->model('user_model');
		$rs = $this->user_model->editRoom($apartmentId, $roomNo, $roomType, $roomId);
		echo json_encode($rs);
	}
	// 删除房间
	public function deleteRoom () {
		$roomId = $this->input->post('id');
		$this->load->model('user_model');
		$rs = $this->user_model->deleteRoom($roomId);
		echo json_encode($rs);
	}
	// 添加来访者信息
	public function addVisitor () {
		$apartmentId = $this->input->post('apartmentId');
		$visitorName = $this->input->post('visitorName');
		$visitorType = $this->input->post('visitorType');
		$visitorDate = $this->input->post('visitorDate');
		$matter = $this->input->post('matter');
		$this->load->model('user_model');
		$rs = $this->user_model->addVisitor($apartmentId, $visitorName, $visitorType, $visitorDate, $matter);
		if ($rs) {
			echo 1;
		} else {
			echo 0;
		}
	}
	// 来访者信息查询
	public function getVisitor () {
		$apartmentId = $this->input->post('apartmentId');
		$visitorName = $this->input->post('visitorName');
		$visitorType = $this->input->post('visitorType');
		$startTime = $this->input->post('visitorDate');
		$pageNo = $this->input->post('pageNo');
		$pageSize = $this->input->post('pageSize');
		$pageNo = ($pageNo - 1) * 10;
		if ($startTime) {
			$endTime = $startTime + 86400000;
		} else {
			$endTime = '';
		}
		$this->load->model('user_model');
		$rs = $this->user_model->getVisitor($pageNo, $pageSize, $apartmentId, $visitorName, $visitorType, $startTime, $endTime);
		$num = $this->user_model->getVisitorNum ($apartmentId, $visitorName, $visitorType, $startTime, $endTime);
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
	// 来访者信息修改
	public function editVisitor () {
		$id = $this->input->post('id');
		$apartmentId = $this->input->post('apartmentId');
		$visitorName = $this->input->post('visitorName');
		$visitorType = $this->input->post('visitorType');
		$visitorDate = $this->input->post('visitorDate');
		$matter = $this->input->post('matter');
		$this->load->model('user_model');
		$rs = $this->user_model->editVisitor($id, $apartmentId, $visitorName, $visitorType, $visitorDate);
		if ($rs) {
			echo 1;
		} else {
			echo 0;
		}
	}
	// 来访者信息删除
	public function deleteVisitor () {
		$id = $this->input->post('id');
		$this->load->model('user_model');
		$rs = $this->user_model->deleteVisitor($id);
		if ($rs) {
			echo 1;
		} else {
			echo 0;
		}
	}
	// 宿管信息添加
	public function addAdmin () {
		$apartment_id = $this->input->post('apartmentId');
		$name = $this->input->post('name');
		$sex = $this->input->post('sex');
		$job = $this->input->post('job');
		$time = $this->input->post('time');
		$idNumber = $this->input->post('idNumber');
		$this->load->model('user_model');
		$arr = array(
			'apartment_id' => $apartment_id,
			'name' => $name,
			'sex' => $sex,
			'job' => $job,
			'idNumber' => $idNumber,
			'time' => $time
		);
		$rs = $this->user_model->addAdmin($arr);
		if ($rs) {
			echo 1;
		} else {
			echo 0;
		}
	}
	// 宿管信息查询
	public function getAdmin () {
		$apartment_id = $this->input->post('apartmentId');
		$name = $this->input->post('name');
		$sex = $this->input->post('sex');
		$job = $this->input->post('job');
		$pageNo = $this->input->post('pageNo');
		$pageSize = $this->input->post('pageSize');
		$pageNo = ($pageNo - 1) * 10;
		$this->load->model('user_model');
		$rs = $this->user_model->getAdmin($apartment_id, $name, $sex, $job, $pageNo, $pageSize);
		$total = $this->user_model->getAdminNum ($apartment_id, $name, $sex, $job);
		if ($rs) {
			$arr = array(
				'data' => $rs,
				'total' => $total
			);
			echo json_encode($arr);
		} else {
			echo '啥也没有';
		}
	}
	// 宿管信息修改
	public function editAdmin () {
		$id = $this->input->post('id');
		$apartment_id = $this->input->post('apartmentId');
		$name = $this->input->post('name');
		$sex = $this->input->post('sex');
		$job = $this->input->post('job');
		$time = $this->input->post('time');
		$idNumber = $this->input->post('idNumber');
		$this->load->model('user_model');
		$rs = $this->user_model->editAdmin($id, $apartment_id, $name, $sex, $job, $time, $idNumber);
		if ($rs) {
			echo 1;
		} else {
			echo 0;
		}
	}
	// 宿管信息删除
	public function deleteAdmin () {
		$id = $this->input->post('id');
		$this->load->model('user_model');
		$rs = $this->user_model->deleteAdmin($id);
		if ($rs) {
			echo 1;
		} else {
			echo 0;
		}
	}
}
?>