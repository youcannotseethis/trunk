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
    	$this->load->view('search');
        $this->load->view('footer');
    }
    public function user(){
    	$q = $this->input->get('q');
    	$this->load->model('User');
    	$this->User->searchQ = $q;
    	$data['users'] = $this->User->get();
    	$this->load->view('search_user',$data);
    	$this->load->view('footer');
    	
    }
    public function note(){
    	$q = $this->input->get('q');
    	$this->load->model('Note');
    	$this->Note->searchQ = $q;
    	$data['notes'] = $this->Note->get();
    	$this->load->view('search_note',$data);
    	$this->load->view('footer');
    }