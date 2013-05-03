<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index(){
		auth_route('user');
	}
	
 	public function __construct(){
		parent::__construct();
		session_start();
		#$this->user = $_SESSION['user'];
		#$this->user_id = $this->user['id'];
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

	public function foursquare(){
		#echo 'm';
		#$this->load->view('4sq.html');
		$this->load->view('home');
	}
	public function profile(){
		auth_route('user');
		#$user_id = $this->input->post('user_id');
		$user = $_SESSION['user'];
		$this->load->model('User');
		$this->User->uid = $user['uid'];
		$user = current($this->User->get());
		#dump($user);
		#dump($_SESSION);
		$this->load->view('footer');
	}
}
?>