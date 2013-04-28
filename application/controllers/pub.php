<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pub extends CI_Controller {
	public function index(){
		$this->view();
	}
	public function user(){
		$user_id = $this->input->post('user_id');
		$this->load->mode('user', false, true);
		$this->user->id = $user_id;
		
	}
}
?>