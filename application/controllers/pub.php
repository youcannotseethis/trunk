<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pub extends CI_Controller {
	public function index(){
		#$user = $this->db->query('select * from user');
		#var_dump($user);
		$this->load->model('User');
		$this->User->id = '2';
		$user = current($this->User->get());
		print_r($user);
	}
	public function user(){
		#$user_id = $this->input->post('user_id');
		#$this->load->database();
		#$query = $this->db->query('select * from user');
		#echo '1';
		$this->load->model('User');
		$this->User->id = 1;
		#$user = current($this->User->get());
		#echo $user['uid'];
	}
}
?>