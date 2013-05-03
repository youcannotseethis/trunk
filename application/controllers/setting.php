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
		$this->load->model('User');
		$this->User->uid = $user['uid'];
		$user = current($this->User->get());
		#dump($_SESSION['user']);
		$user_id = $this->input->get('uid');	//
		if($user_id != $user['uid']){	//not editing user's own profile
			$this->load->helper('url');
			#redirect('index.php/403');
		}else{
			$data['user'] = $user;			
			$this->load->view('set_profile',$data);
			$this->load->view('footer');
		}
	}
	public function save_profile(){
		auth_route('user');
		dump($this->input->post());
		$user_arr = $this->input->post();
		$this->load->model('User',false,true);
		$this->User->update($user_arr, $this->input->post('uid'));
		redirect('/index.php/setting/set_profile?uid='.$user_arr['uid'],'location');
		
	}


}?>