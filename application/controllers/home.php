<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index(){
		echo 'm';
		#$this->load->view('4sq.html');
	}
	
	public function foursquare(){
		#echo 'm';
		$this->load->view('4sq.html');
	}
}
?>