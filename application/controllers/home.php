<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index(){
		echo 'm';
		#$this->load->view('4sq.html');
	}
	
 	public function __construct(){
		parent::__construct();
		#session_start();
		#$this->user = $_SESSION['user'];
		#$this->user_id = $this->user['id'];
		$this->data = array();
		$this->title = '';
    }
	public function __destruct(){
		$data = $this->data;
		$data['title'] = $this->title;
		#if(!(isset($this->no_view)&&$this->no_view))
		#	echo make_view($this,$data);
	}	
	public function user(){
		#$user_id = $this->input->post('user_id');
		$this->load->model('User');
		$this->User->id = '2';
		$user = current($this->User->get());
		$this->
		dump($user);
	}
	public function foursquare(){
		#echo 'm';
		$this->load->view('4sq.html');
	}
}
?>