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
		#$this->load->helper('view_helper');
    }
	public function __destruct(){
		if(!$this->noView){
			$data = $this->data;
			$data['title'] = $this->title;
			#echo make_view($this,$data);
		}
	}
	public function attempt_login(){
	
	 	ini_set ('display_errors', '1');  
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$ref = $this->input->post('referral');
		if ($this->form_validation->run() == false){
			exit(json_encode($this->form_validation->error_array()));
		}else{
			$this->load->model('User',false,true);
			if($this->User->login($this->input->post('name'),$this->input->post('password'))){
				$this->load->helper('url');
				redirect('/index.php/home', 'location'); 
				#exit($ref?$ref:'/trunk/index.php/home');
			}else{
				exit(json_encode(array('name'=>'Bad credentials')));
			}
		}
	}
	public function login(){
		$this->load->view('login');
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
		$this->load->view('signup.php');
		$this->load->view('footer');
	}
	public function attemp_signup(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('uname', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[password1]');
		$this->form_validation->set_rules('password1', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		if ($this->form_validation->run() == false){
			exit(json_encode($this->form_validation->error_array()));
		}else{
			$this->load->model('User');
			$user = $this->input->post();
			unset($user['password1']);
			$user_id = $this->User->insert($user);
			$this->User->login($this->input->post('name'),$this->input->post('password'));
			$this->load->helper('url');
			redirect('/index.php/home', 'location'); 
		}
	}

	if ($this->form_validation->run() == false){
			exit(json_encode($this->form_validation->error_array()));
		}else{
			$this->load->model('User',false,true);
			if($this->User->login($this->input->post('name'),$this->input->post('password'))){
				$this->load->helper('url');
				redirect('/index.php/home', 'location'); 
				#exit($ref?$ref:'/trunk/index.php/home');
			}else{
				exit(json_encode(array('name'=>'Bad credentials')));
			}
		}
}
?>