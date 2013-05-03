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
		#auth_route('user');
		$user_id = $this->input->post('uid');	
		if($user_id){
			$this->load->model('User');
			$this->User->uid = $user_id;
			$user = current($this->User->get());
			$data['user'] = $user;
			$this->load->view('set_profile', $data);
		}
		$this->load->view('footer');		
		dump($user_id);	
	}
	public function save_profile(){
		#auth_route('user');
		#dump($this->input->post());
		$user_arr = $this->input->post();
		$this->load->model('User',false,true);
		$this->User->update($user_arr, $this->input->post('uid'));
		redirect('/index.php/setting/set_profile?uid='.$user_arr['uid'],'location');
	}
	public function set_filter(){
		auth_route('user');
		$user_id = $this->inpute->post('uid');
		if($user_id){
			$this->load->model('User');
			$this->User->uid = $user_id;
			$data['user'] = current($this->User->get());
			
			$this->load->model('Filter');
			$this->Filter->uid = $user_id;
			$data['filters'] = $this->Filter->get();
			
			$this->load->view('set_filter', $data);	
		}
		
	}
	public function save_filter(){
	
	}


}?>