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
		$data['user'] = $user;
		#dump($user);
		#dump($_SESSION);
		$this->load->view('footer',$data);
	}
	
	public function note() {
		$nid = $this->input->get('nid');
		# get note itself
		$this -> load -> model('Note');
		$this -> Note -> nid = $nid;
		$note = current($this->Note->get());
		#dump($note);
		$data['note']= $note;
		# get note's auther info
		$note_author_uid = $note['uid'];
		$this -> load -> model('User');
		$this -> User -> uid = $note_author_uid;
		$note_author = current($this->User->get());
		#dump($note_author);
		$data['note_author']=$note_author;
		# get place info
		$pid = $note['pid'];
		$this -> load -> model ('Place');
		$this -> Place -> pid = $pid;
		$place = current($this->Place->get());
		#dump($place);
		$data['place']=$place;
		# get comment
		$this -> load -> model('Reply');
		$this -> Reply -> nid = $nid;
		$reply = $this->Reply->get();
		#dump($reply);
		$data['reply']= $reply;
		$this->load->view('note',$data);
	}
}
?>