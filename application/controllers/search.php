<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller{

    public function __construct(){
        parent::__construct();
        session_start();
        #$this->user = $_SESSION['user'];
        #$this->user_id = $this->user['id'];
        $this->data  = array();
        $this->title = '';
        $this->load->helper('view_helper');
        $this->load->view('header');
    }
    public function __destruct(){
        $data          = $this->data;
        $data['title'] = $this->title;
        #if(!(isset($this->no_view)&&$this->no_view))
        #    echo make_view($this,$data);
    }
    public function index(){
        auth_route('user');
        $this->load->view('search', $data);
        $this->load->view('footer');
    }
    public function u(){
    	$q = $this->input->get('q');
    	$this->load->model('User');
    	$this->User->searchQ();
    }