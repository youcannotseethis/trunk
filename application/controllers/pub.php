<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pub extends CI_Controller {
	public function index(){
		#$user = $this->db->query('select * from user');
		#var_dump($user);
		
	}
	public function attempt_login(){
	 ini_set ('display_errors', '1');  
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		#$ref = $this->input->post('referral');
		if ($this->form_validation->run() == false){
			exit(json_encode($this->form_validation->error_array()));
		}else{
			$this->load->model('User',false,true);
			if($this->User->login($this->input->post('name'),$this->input->post('password'))){
				#exit($ref?$ref:'/home');
			}else{
				exit(json_encode(array('name'=>'Bad credentials')));
			}
		}
	}
	
	public function logout(){
		#$this->session->sess_destroy();
		unset($_SESSION);
		session_destroy();
		$this->load->helper('url');
		$this->noView = true;
		redirect('/login', 'location');
	}
	public function login(){
		$this->load->view('login');
	}
	
}
?>