<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pub extends CI_Controller {
	public function index(){

	}
	public function __construct(){
		parent::__construct();
		session_start();
		$this->data = array();
		$this->title = '';
		$this->load->view('header');
    }
	public function __destruct(){
		
	}
	public function login(){
		#$this->load->view('login');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$ref = $this->input->post('referral');
		if ($this->form_validation->run() == false){
			$this->load->view('login');#redirect('/index.php/home', 'location');
		}else{
			$this->load->model('User',false,true);
			if($this->User->login($this->input->post('name'),$this->input->post('password'))){
				$this->load->helper('url');
				#echo validation_errors();
				redirect('/index.php/home', 'location'); 
				#exit($ref?$ref:'/trunk/index.php/home');
			}
			else{
				exit('Wrong password');
			}
		}
		$this->load->view('footer');
	}
	public function logout(){
		unset($_SESSION);
		session_destroy();
		$this->load->helper('url');
		#$this->noView = true;
		redirect('/index.php/login', 'location');
	}
	public function signup(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('uname', 'Username', 'required|unique');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[password1]');
		$this->form_validation->set_rules('password1', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('first_name','First Name','required');
		$this->form_validation->set_rules('last_name','Last Name', 'required');
		if ($this->form_validation->run() == false){
			$this->load->view('signup.php');
		}else{
			$this->load->model('User');
			$user = $this->input->post();
			unset($user['password1']);
			$user_id = $this->User->insert($user);
			$this->User->login($this->input->post('name'),$this->input->post('password'));
			$this->load->helper('url');
			redirect('/index.php/home', 'location'); 
		}
		
		$this->load->view('footer');
	}
	
}
?>