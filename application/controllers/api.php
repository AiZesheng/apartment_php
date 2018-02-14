<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT,DELETE');

class Api extends CI_Controller {
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
}

?>