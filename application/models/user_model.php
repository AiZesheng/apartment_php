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
	public function get_students ($sname, $sno, $sex, $college, $phone) {
		$sql = "select * from t_students where ('$sname'='' or name='$sname') and ('$sno'='' or sno='$sno') and ('$sex'='' or sex='$sex') and ('$college'='' or college='$college') and ('$phone'='' or phone='$phone') order by sno";
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
}
