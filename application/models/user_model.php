<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	// 登录
	public function get_by_username_password ($username, $password) {
		$sql = "select * from t_user where username='$username' and password='$password'";
		$rs = $this->db->query($sql);
		return $rs->result();
	}
	// 注册
	public function regist ($arr) {
		$rs = $this->db->insert('t_user', $arr);
		return $rs;
	}
	// 注册用户名唯一性校验
	public function get_by_username ($username) {
		$sql = "select * from t_user where username='$username'";
		$rs = $this->db->query($sql);
		return $rs->result();
	}
	// 添加学生
	public function add_students ($arr) {
		$rs = $this->db->insert('t_students', $arr);
		return $rs;
	}
	// 根据学号查询学生
	public function get_by_sno ($sno) {
		$sql = "select * from t_students where sno='$sno'";
		$rs = $this->db->query($sql);
		return $rs->result();
	}
	// 根据学生id查询学生
	public function get_by_sid ($id) {
		$sql = "select * from t_students where id='$id'";
		$rs = $this->db->query($sql);
		return $rs->result();
	}
	// 学生信息列表
	public function get_students ($sname, $sno, $sex, $college, $phone, $pageNo, $pageSize) {
		$sql = "select idNumber,t_students.id,name,sno,college,phone,nativePlace,political,sex,t_students_rooms.room_id,t_rooms.roomNo,t_rooms.apartment_id,t_apartment.apartment from t_students left join t_students_rooms on t_students.id = t_students_rooms.student_id left join t_rooms on t_rooms.id=t_students_rooms.room_id left join t_apartment on t_apartment.id=t_rooms.apartment_id where ('$sname'='' or name='$sname') and ('$sno'='' or sno='$sno') and ('$sex'='' or sex='$sex') and ('$college'='' or college='$college') and ('$phone'='' or phone='$phone') order by sno limit $pageNo,$pageSize";
		$rs = $this->db->query($sql);
		return $rs->result();
	}
	// 学生信息列表总数
	public function get_students_total ($sname, $sno, $sex, $college, $phone) {
		$sql = "select * from t_students where ('$sname'='' or name='$sname') and ('$sno'='' or sno='$sno') and ('$sex'='' or sex='$sex') and ('$college'='' or college='$college') and ('$phone'='' or phone='$phone')";
		$rs = $this->db->query($sql);
		return $rs->num_rows();
	}
	// 学生信息修改
	public function update_student ($idNumber, $sno, $sname, $sex, $college, $nativePlace, $political, $phone) {
		$sql = "update t_students set name='$sname',sex='$sex',college='$college',nativePlace='$nativePlace',political='$political',phone='$phone',idNumber='$idNumber' where sno='$sno'";
		$rs = $this->db->query($sql);
		return $rs;
	}
	// 学生信息删除
	public function delete_student ($id) {
		$sql = "delete from t_students where id='$id'";
		$rs = $this->db->query($sql);
		$sql2 = "delete from t_students_rooms where student_id='$id'";
		$rs2 = $this->db->query($sql2);
		return $rs;
	}
	// 添加宿舍楼名称
	public function addApartment ($arr) {
		$rs = $this->db->insert('t_apartment', $arr);
		return $rs;
	}
	// 拿所有宿舍楼名称
	public function getApartment () {
		$sql = "select * from t_apartment";
		$rs = $this->db->query($sql);
		return $rs->result();
	}
	// 添加房间
	public function addRoom ($arr) {
		$rs = $this->db->insert('t_rooms', $arr);
		return $rs;
	}
	// 添加房间的唯一性校验
	public function get_by_apartmentId_roomNo ($apartmentId, $roomNo) {
		$sql = "select * from t_rooms where apartment_id='$apartmentId' and roomNo='$roomNo'";
		$rs = $this->db->query($sql);
		return $rs->result();
	}
	// 房间列表
	public function getRooms ($apartment, $roomType, $roomNo) {
		$sql = "select t_rooms.apartment_id,t_apartment.apartment,t_rooms.roomNo,t_rooms.roomType,t_students.name,t_rooms.id from t_rooms left join t_apartment on t_rooms.apartment_id = t_apartment.id left join t_students_rooms on t_rooms.id=t_students_rooms.room_id left join t_students on t_students_rooms.student_id=t_students.id where ('$apartment'='' or t_apartment.id='$apartment') and ('$roomType'='' or t_rooms.roomType='$roomType') and ('$roomNo'='' or t_rooms.roomNo='$roomNo') order by t_apartment.apartment,t_rooms.roomNo";
		$rs = $this->db->query($sql);
		return $rs->result();
	}
	// 通过宿舍楼id查房间号
	public function get_by_apartmentId ($apartmentId) {
		$sql = "select * from t_rooms where apartment_id='$apartmentId'";
		$rs = $this->db->query($sql);
		return $rs->result();
	}
	// 给学生设置寝室
	public function setRoom ($studentId, $roomId) {
		$sql = "insert into t_students_rooms(student_id, room_id) values($studentId, $roomId)";
		$rs = $this->db->query($sql);
		return $rs;
	}
	// 给学生更换寝室
	public function changeRoom ($studentId, $roomId) {
		$sql = "update t_students_rooms set room_id='$roomId' where student_id='$studentId'";
		$rs = $this->db->query($sql);
		return $rs;
	}
	// 判断房间是否已满
	public function isFull ($roomId) {
		$sql = "select * from t_rooms,t_students_rooms where t_rooms.id=t_students_rooms.room_id and t_rooms.id='$roomId'";
		$rs = $this->db->query($sql);
		return $rs->result();
	}
	// 房间信息修改
	public function editRoom ($apartmentId, $roomNo, $roomType, $roomId) {
		$sql = "update t_rooms set apartment_id='$apartmentId',roomNo='$roomNo',roomType='$roomType' where id='$roomId'";
		$rs = $this->db->query($sql);
		return $rs;
	}
	// 删除房间
	public function deleteRoom ($roomId) {
		$sql = "delete from t_rooms where id='$roomId'";
		$rs = $this->db->query($sql);
		return $rs;
	}
	// 添加来访者信息
	public function addVisitor ($apartmentId, $visitorName, $visitorType, $visitorDate, $matter) {
		$sql = "insert into t_visitor(apartment_id, visitorName, visitorType, visitorTime, matter) values('$apartmentId', '$visitorName', '$visitorType', '$visitorDate', '$matter')";
		$rs = $this->db->query($sql);
		return $rs;
	}
	// 来访者信息查询
	public function getVisitor ($pageNo, $pageSize, $apartmentId, $visitorName, $visitorType, $startTime, $endTime) {
		$sql = "select t_visitor.id,t_visitor.apartment_id,t_apartment.apartment,visitorName,visitorType,matter,visitorTime from t_visitor left join t_apartment on t_visitor.apartment_id=t_apartment.id where ('$apartmentId'='' or apartment_id='$apartmentId') and ('$visitorName'='' or visitorName='$visitorName') and ('$visitorType'='' or visitorType='$visitorType') and ('$startTime'='' or (visitorTime > '$startTime' and visitorTime < '$endTime')) order by apartment_id,visitorTime desc limit $pageNo, $pageSize";
		$rs = $this->db->query($sql);
		return $rs->result();
	}
	// 来访信息列表总数
	public function getVisitorNum ($apartmentId, $visitorName, $visitorType, $startTime, $endTime) {
		$sql = "select t_visitor.id,t_apartment.apartment,visitorName,visitorType,matter,visitorTime from t_visitor left join t_apartment on t_visitor.apartment_id=t_apartment.id where ('$apartmentId'='' or apartment_id='$apartmentId') and ('$visitorName'='' or visitorName='$visitorName') and ('$visitorType'='' or visitorType='$visitorType') and ('$startTime'='' or (visitorTime > '$startTime' and visitorTime < '$endTime'))";
		$rs = $this->db->query($sql);
		return $rs->num_rows();
	}
	// 来访者信息修改
	public function editVisitor ($id, $apartmentId, $visitorName, $visitorType, $visitorDate) {
		$sql = "update t_visitor set apartment_id='$apartmentId',visitorName='$visitorName',visitorType='$visitorType',visitorTime='$visitorDate' where id='$id'";
		$rs = $this->db->query($sql);
		return $rs;
	}
	// 来访者信息删除
	public function deleteVisitor ($id) {
		$sql = "delete from t_visitor where id='$id'";
		$rs = $this->db->query($sql);
		return $rs;
	}
	// 宿管信息添加
	public function addAdmin ($arr) {
		$rs = $this->db->insert('t_admin', $arr);
		return $rs;
	}
	// 宿管信息查询
	public function getAdmin ($apartment_id, $name, $sex, $job, $pageNo, $pageSize) {
		$sql = "select t_admin.id,t_apartment.apartment,t_admin.apartment_id,name,sex,job,time,idNumber from t_admin left join t_apartment on t_admin.apartment_id=t_apartment.id where('$apartment_id'='' or apartment_id='$apartment_id') and ('$name'='' or name='$name') and ('$sex'='' or sex='$sex') and ('$job'='' or job='$job') order by t_admin.apartment_id limit $pageNo, $pageSize";
		$rs = $this->db->query($sql);
		return $rs->result();
	}
	// 宿管信息总数
	public function getAdminNum ($apartment_id, $name, $sex, $job) {
		$sql = "select t_admin.id,t_apartment.apartment,t_admin.apartment_id,name,sex,job,time,idNumber from t_admin left join t_apartment on t_admin.apartment_id=t_apartment.id where('$apartment_id'='' or apartment_id='$apartment_id') and ('$name'='' or name='$name') and ('$sex'='' or sex='$sex') and ('$job'='' or job='$job')";
		$rs = $this->db->query($sql);
		return $rs->num_rows();
	}
	// 宿管信息修改
	public function editAdmin ($id, $apartment_id, $name, $sex, $job, $time, $idNumber) {
		$sql = "update t_admin set apartment_id='$apartment_id',name='$name',sex='$sex',job='$job',time='$time',idNumber='$idNumber' where id='$id'";
		$rs = $this->db->query($sql);
		return $rs;
	}
	// 宿管信息删除
	public function deleteAdmin ($id) {
		$sql = "delete from t_admin where id='$id'";
		$rs = $this->db->query($sql);
		return $rs;
	}
}
