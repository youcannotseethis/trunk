<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pub extends CI_Controller {
	public function index(){
		#$user = $this->db->query('select * from user');
		#var_dump($user);
		
	}

	public function logout(){
		#$this->session->sess_destroy();
		unset($_SESSION);
		session_destroy();
		$this->load->helper('url');
		$this->noView = true;
		redirect('/login', 'location');
		
	}
}
?>