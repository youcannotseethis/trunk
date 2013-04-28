<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pub extends CI_Controller {
	public function index(){
		$user = $this->db->query('select * from user');
		dump($user);
	}
	public function user(){
		$user_id = $this->input->post('user_id');
		$user = $this->db->query('select * from user');
		$this->load->model('User', false, true);
		$this->User->id = '2';
		#$user = current($this->User->get());
		dump($user);
	}
}
?>