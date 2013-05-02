<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {
	public function index(){
		#auth_route('user');
	}
	
 	public function __construct(){
		parent::__construct();
		session_start();
		$this->data = array();
		$this->title = '';
		$this->load->helper('view_helper');
		$this->load->view('header');
    }
	public function __destruct(){
		$data = $this->data;
		$data['title'] = $this->title;
		#if(!(isset($this->no_view)&&$this->no_view))
		#	echo make_view($this,$data);
	}	
	public function set_profile(){
		auth_route('user');
		$user = $_SESSION['user'];
		dump($_SESSION['user']);
		$user_id = $this->input->get('uid');	//
		if($user_id != $user['uid']){	//not editing user's own profile
			$this->load->helper('url');
			#redirect('index.php/403');
		}else{
			$this->load->view('set_profile');
			$this->data['user'] = $user;
			$this->load->view('footer');
		}
	}
	public function save_profile(){
		
	}


}?>