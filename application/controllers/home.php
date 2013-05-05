<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
    public function index(){
        auth_route('user');
        $user = $_SESSION['user'];
        $this->load->model('Note');
        $note         = $this->Note->getFriendRecentNote($user['uid']);
        $data['note'] = $note;
        $this->load->view('home', $data);
        $this->load->view('footer');
    }
    
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
        $user            = current($this->User->get());
        $data['user']    = $user;
        #dump($user);
        #dump($_SESSION);
        $this->load->view('footer', $data);
    }
    
    public function note(){
        $nid = $this->input->get('nid');
        # get note itself
        $this->load->model('Note');
        $this->Note->nid = $nid;
        $note            = current($this->Note->get());
        $data['note']    = $note;
        # get note's auther info
        $note_author_uid = $note['uid'];
        $this->load->model('User');
        $this->User->uid     = $note_author_uid;
        $note_author         = current($this->User->get());
        $data['note_author'] = $note_author;
        $pid                 = $note['pid'];
        $this->load->model('Place');
        $this->Place->pid = $pid;
        $place            = current($this->Place->get());
        $data['place']    = $place;
        $this->load->model('Reply');
        $this->Reply->nid = $nid;
        $reply            = $this->Reply->get();
        $data['reply']    = $reply;
        $this->load->view('note', $data);
        $this->load->view('footer');
    }
    
    public function user(){
        $uid = $this->input->get('uid');
        # get this user's info
        $this->load->model('User');
        $this->User->uid = $uid;
        $user            = current($this->User->get());
        $data['user']    = $user;
        #dump($user);
        # get this user's recent note
        $this->load->model('Note');
        $this->Note->uid = $uid;
        $note            = $this->Note->get();
        $data['note']    = $note;
        # get this user's following
        $this->load->model('follow', 'f1');
        $this->f1->current_u = $uid;
        $following           = $this->f1->get();
        $data['following']   = $following;
        #get this user's followed
        $this->load->model('follow', 'f2');
        $this->f2->followed_user = $uid;
        $followed                = $this->f2->get();
        $data['followed']        = $followed;
        # load user view
        if (empty($user)) {
            show_404('page');
        } else {
            $this->load->view('user', $data);
        }
        $this->load->view('footer');
    }
    
    public function filters(){
        auth_route('user');
        $user    = $_SESSION['user'];
        $filters = array();
        if ($user) {
            $this->load->model('Filter');
            $this->Filter->uid = $user['uid'];
            $filters           = $this->Filter->get();
        }
        if ($filters) {
            foreach ($filters as $k => $filter) {
                $tags = json_decode($filter['tags'], true);
                #$filters[$k]['tags'] = $tags;
            }
        }
        $data['filters'] = $filters;
        $data['user']    = $user;
        #dump($filters);
        $this->load->view('filters', $data);
    }
    
    public function filter(){
        auth_route('user');
        $filter_id = $this->input->get('fid');
        if ($filter_id) {
            $this->load->model('Filter');
            $this->Filter->fid = $filter_id;
            $data['filter']    = current($this->Filter->get());
            $this->load->view('filter', $data);
            $this->load->view('footer');
        }
    }
}
?>