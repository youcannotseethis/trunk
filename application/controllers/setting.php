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
		$user_id = $_SESSION['user']['uid'];	
		if($user_id){
			$this->load->model('User');
			$this->User->uid = $user_id;
			$user = current($this->User->get());
			$data['user'] = $user;
			$this->load->view('set_profile', $data);
		}
		$this->load->view('footer');		
		#dump($user_id);	
	}
	public function save_profile(){
		auth_route('user');
		#dump($this->input->post());
		$user_arr = $this->input->post();
		$this->load->model('User',false,true);
		$this->User->update($user_arr, $this->input->post('uid'));
		redirect('/index.php/setting/set_profile?uid='.$user_arr['uid'],'location');
	}
	public function filters(){
		auth_route('user');
		$user_id = $this->input->post('user_id');
		$this->load->model('Filter');
		$this->Filter->uid = $user_id;
		$filters = $this->Filter->get();
		$data['filters'] = $filters;
		$this->load->view('filters', $data);
	}
	public function filter(){
		auth_route('user');
		$filter_id = $this->input->get('fid');
		$this->load->model('Filter');
		$this->Filter->fid = $filter_id;
		$data['filter'] = current($this->Filter->get());
		$this->load->view('filter',$data);
	}
	public function set_filter(){
		auth_route('user');
		$user_id = $_SESSION['user']['uid'];
		if($user_id){
			$this->load->model('User');
			$this->User->uid = $user_id;
			$data['user'] = current($this->User->get());
			
			$this->load->model('Filter');
			$this->Filter->uid = $user_id;
			$filters = $this->Filter->get();
			if($filters){
				foreach($filters as $k=>$filter){
					$tags = json_decode($filter['tags'],true);
					$filters[$k]['tags'] = $tags;
				}
			}
			$data['filters'] = $filters;
		}
		$this->load->view('set_filter', $data);	
		#dump($data);
	}
	public function save_filter(){
		auth_route('user');
	}


}?>