<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	// 登录
	public function get_by_username_password ($username, $password) {
		$sql = "select * from t_user where username='$username' and password='$password'";
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
		$sql = "select t_students.id,name,sno,college,phone,nativePlace,political,sex,t_students_rooms.room_id,t_rooms.roomNo,t_rooms.apartment_id,t_apartment.apartment from t_students left join t_students_rooms on t_students.id = t_students_rooms.student_id left join t_rooms on t_rooms.id=t_students_rooms.room_id left join t_apartment on t_apartment.id=t_rooms.apartment_id where ('$sname'='' or name='$sname') and ('$sno'='' or sno='$sno') and ('$sex'='' or sex='$sex') and ('$college'='' or college='$college') and ('$phone'='' or phone='$phone') order by sno limit $pageNo,$pageSize";
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
	public function update_student ($sno, $sname, $sex, $college, $nativePlace, $political, $phone) {
		$sql = "update t_students set name='$sname',sex='$sex',college='$college',nativePlace='$nativePlace',political='$political',phone='$phone' where sno='$sno'";
		$rs = $this->db->query($sql);
		return $rs;
	}
	// 学生信息删除
	public function delete_student ($id) {
		$sql = "delete from t_students where id='$id'";
		$rs = $this->db->query($sql);
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
	// 拿所有房间
	public function getRooms () {
		$sql = "select * from t_rooms,t_apartment where t_rooms.apartment_id=t_apartment.id";
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
}
