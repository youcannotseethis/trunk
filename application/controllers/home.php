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
        #    echo make_view($this,$data);
    }
    
    public function foursquare(){
        #echo 'm';
        #$this->load->view('4sq.html');
        #this->load->view('home');
        $this->load->view('4sq');
        $this->load->view('footer');
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
    public function notes(){	//view my notes
    	auth_route('user');
    	
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
        $this->Note->order_by = 'note_dt_inserted desc';
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
        
        if($uid != $_SESSION['user']['uid']){
        	$this->load->model('follow');
        	$this->follow->current_u = $_SESSION['user']['uid'];
        	$this->follow->followed_user = $uid;
        	$data['relation'] = $this->follow->get();
        }
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
        $user = $_SESSION['user'];
        $filters = array();
        if($user){
            $this->load->model('Filter');
            $this->Filter->uid = $user['uid'];
            $filters = $this->Filter->get();
        }
        if($filters){
            foreach($filters as $k=>$filter){
                $tags = json_decode($filter['tags'],true);
                #$filters[$k]['tags'] = $tags;
            }
        }
        $data['filters'] = $filters;
        $data['user'] = $user;
        #dump($filters);
        $this->load->view('filters', $data);
    }
		
  public function filter(){
        auth_route('user');
        $filter_id = $this->input->get('fid');
        $filter = array();
        $tags = '{}';
        if($filter_id){
            $this->load->model('Filter');
            $this->Filter->fid = $filter_id;
            $filter = current($this->Filter->get());
            $tags = $filter['tags'];
        }
        $data['tags'] = json_decode($tags, true);
        $data['filter'] = $filter;
		$this->load->view('filter',$data);
        $this->load->view('footer');		
    }
    
    public function save_filter(){
        auth_route('user');
        $this->load->model('Filter');
        $post = $this->input->post();
        $user_id = $post['uid'];
	    $filter_id = $post['fid'];
		foreach($post as $k=>$v){
			if($k == 'tags'){   				     		
				$filter['tags'] = json_encode($post['tags'],JSON_FORCE_OBJECT);
			}else{
				$filter[$k] = $v;
			 }
			/*array('state'=>$post['state'],'tags'=>$tags, 'uid'=>$user_id,'s_from'=>$post['s_from'],
						's_to'=>$post['s_to'],'repeat_flag'=>$post['repeat_flag'],'sunday'=>$post['sunday'],
						'monday'=>$post['monday'],'tuesday'=>$post['tuesday'],'wednesday'=>$post['wednesday'],
						'thursday'=>$post['thursday'],'friday'=>$post['friday'],'saturday'=>$post['saturday']);
			*/
		}
        dump($post);
        #dump($filter_id);
        #dump($filter);
        $this->load->library('form_validation');
        $this->load->helper(array('form','url'));
        $this->form_validation->set_rules('state', 'State','required');
        $this->form_validation->set_rules('tags','Tags','required');
        $this->form_validation->set_rules('s_from','Start Time', 'required');
        $this->form_validation->set_rules('s_to','End Time', 'required');
        $this->form_validation->set_rules('repeat_flag','Repeat Flag','required');
		if ($this->form_validation->run() == false){
			$this->load->view('save_filter');#
		}elseif($filter_id){
			$this->Filter->update($filter, $filter_id);
			redirect('/index.php/filter?fid='.$filter_id, 'location');
		}else{
			$filter_id = $this->Filter->insert($filter);
			#exit($fid);
			redirect('/index.php/filter?fid='.$filter_id,'location');
		}
		$this->load->view('footer');
		
    }
    
	public function places(){
		#auth_route('user');
		$this->title = 'Places';
		$this->load->model('Place');
		$places = $this->Place->get();
		$data['places'] = $places;
		$this->load->view('places', $data);
	}
    public function place(){
        auth_route('user');
        $pid = $this->input->get('pid');
        $this->load ->model('Place');
        $this->Place->pid = $pid;
        $place = current($this->Place->get());
        $data['place']=$place;
        if($place){
            $this->load->model('Note');
            $this->Note->pid = $pid;
            $this->Note->order_by = 'note_dt_inserted desc';
            $note = $this->Note->get();
			
			// start handle sort by like count
			$this->load->model('Like_note');
			$likeCount = $this->Like_note->countLike();
			$likeCountArray = [];
			foreach($likeCount as $sinleLikeCount){
				$likeCountArray[$sinleLikeCount['nid']]=intval($sinleLikeCount['time']);
			}
			#dump($likeCountArray);
			
			foreach($note as $k=>$singleNote){
				if(array_key_exists($singleNote['nid'],$likeCountArray)) {
					$note[$k]['time']=$likeCountArray[$singleNote['nid']];
				} else {
					$note[$k]['time']=0;
				}
				#dump($singleNote);
			}
			
			function my_sort($a, $b)
			{
				if ( !(isset($a['time']) && isset($b['time'])) ) return 0;
				if ($b['time'] < $a['time']) {
				    return -1;
				} else if  ($b['time'] > $a['time']) {
				    return 1;
				} else {
				    return $b['note_dt_inserted'] - $a['note_dt_inserted'];
				}
				  /*
			    return $b['time'] - $a['time'];*/
			}
			
			usort($note, "my_sort");
			#dump($note);
			
			#dump($note);
			// end of handle sort by like count
            $data['note']=$note;
			
			$this->load->model('Silent');
			$this->Silent->uid= $_SESSION['user']['uid'];
			$muteNote = $this->Silent->get();
			$muteNid = [];
			foreach($muteNote as $singleMuteNote){
				array_push($muteNid,$singleMuteNote['nid']);
			}
			$data['muteNid']=$muteNid;
			
			$this->load->model('Like_note');
			$this->Like_note->uid= $_SESSION['user']['uid'];
			$likeNote = $this->Like_note->get();
			#dump($likeNote);
			$likeNid = [];
			foreach($likeNote as $singleLikeNote){
				#dump($singleLikeNote);
				array_push($likeNid,$singleLikeNote['nid']);
			}
			#dump($likeNid);
			$data['likeNid']=$likeNid;
			
			
			
        } 
        $this->load->view('place',$data);
        $this->load->view('footer');
    }
    
    public function add_note(){
        #dump($this->input->post());
        $this->load->model('Note');
		// begin handle the private flag
		$public = intval($this->input->post('public'));
		if ($public!=1) $public = 0;
		$public = 1- $public;
		// end of handle the private flag
        $data = array(
           'uid' => $this->input->post('uid') , 
           'pid' => $this->input->post('pid') , 
           'text_body' => $this->input->post('text_body') , 
           'keyword' => $this->input->post('keyword') , 
           'public' => $public,
           's_from' => $this->input->post('s_from') , 
           's_to' => $this->input->post('s_to'), 
           'repeat_flag' => $this->input->post('repeat_flag'), 
           'sunday' => $this->input->post('sunday'), 
           'monday'=> $this->input->post('monday'), 
           'tuesday' => $this->input->post('tuesday'),
           'wednesday'=> $this->input->post('wednesday'), 
           'thursday'=> $this->input->post('thursday'), 
           'friday'=> $this->input->post('friday'), 
           'saturday'=> $this->input->post('saturday')
        );
        $note_id = $this->Note->insert($data); 
        $newURL ='/index.php/home/place?pid='.$this->input->post('pid');
        $this->load->helper('url');
        redirect($newURL,'location');
    }
    public function follow(){
    	$this->load->model('follow');
    	$c_uid = $this->input->post('c_uid');
    	$f_uid = $this->input->post('f_uid');
    	$action = $this->input->post('action');
    	if($action == 'follow'){
    		$follow_id = $this->follow->insert(array('current_u'=>$c_uid, 'followed_user'=>$f_uid));
    	}elseif($action == 'unfollow'){
    		$this->follow->current_u = $c_uid;
    		$this->follow->followed_user = $f_uid;
    		$follow = current($this->follow->get());
    		$this->db->delete('follow',$follow['follow_id']);
    	}
    	exit('reload');
    }
    public function muteNote(){
        $this->load->model('silent');
        $data = array(
           'uid' => $this->input->post('uid') , 
           'nid' => $this->input->post('nid')    
        );
		$this->db ->insert('silent',$data);
        $a = 'reload';
        exit($a);
    }
        
    public function likeNote(){
        $this->load->model('Like_note');
        $data = array(
           'uid' => $this->input->post('uid') , 
           'nid' => $this->input->post('nid')    
        );
		$this->Like_note ->insert($data);
        $a = 'reload';
        exit($a);
    }
	
	public function fakeloc(){
		auth_route('user');
		$this->load->model('User');
		$this->User->uid = $_SESSION['user']['uid'];
		$userinfo = current($this->User->get());
		$data['userinfo']=$userinfo;
		$this->load->view('fakeloc',$data);
		$this->load->view('footer');
	}
	
	public function update_last_loc(){
		// update last_latitude_longitude
		$this->load->model('User');
		$arr = array(
            'last_latitude' => $this->input->post('latitude'), 
            'last_longitude' => $this->input->post('longitude')  
		);
		$this->User->update($arr,$this->input->post('uid'));
		// insert to user localtion record
		// TO DO
		//
		$newURL = '/index.php/home/fakeloc';
        $this->load->helper('url');
        redirect($newURL,'location');
	}
	
	public function explore(){
		auth_route('user');
		$this->load->model('User');
		$this->User->uid= $_SESSION['user']['uid'];
		$userinfo = current($this->User->get());
		
		$latitude = $userinfo['last_latitude'];
		$longitude = $userinfo['last_longitude'];
		$radius = 1.25;
		
		$this->load->model('Place');
		$place = $this->Place->getNearby($latitude,$longitude,$radius);
		#dump($place);		
		
		$totalNote=[];
		$likeCountArray = [];
		$muteNid = [];
		#dump(1);
		foreach($place as $singlePlace) {
		//  begin of copy from function place
			
            $this->load->model('Note','note1',true);
			#dump($singlePlace['pid']);
            $this->note1->pid = $singlePlace['pid'];
            $this->note1->order_by = 'note_dt_inserted desc';
            $note = $this->note1->get();
			#dump($note);
			#dump(count($note));
		    #dump(2);
		    // start handle sort by like count
			/*
		    $this->load->model('Like_note');
		    $likeCount = $this->Like_note->countLike();
		   # $likeCountArray = [];
		    foreach($likeCount as $sinleLikeCount){
			    $likeCountArray[$sinleLikeCount['nid']]=intval($sinleLikeCount['time']);
		    }*/
		    #dump($likeCountArray);
		
			/*
		    foreach($note as $k=>$singleNote){
			    if(array_key_exists($singleNote['nid'],$likeCountArray)) {
				    $note[$k]['time']=$likeCountArray[$singleNote['nid']];
			    } else {
				    $note[$k]['time']=0;
			    }
			}*/
			#dump($singleNote);
		    
			/*
		    function my_sort($a, $b){
			if ( !(isset($a['time']) && isset($b['time'])) ) return 0;
			if ($b['time'] < $a['time']) {
			    return -1;
			} else if  ($b['time'] > $a['time']) {
			    return 1;
			} else {
			    return $b['note_dt_inserted'] - $a['note_dt_inserted'];
			}
		    }
		
		    usort($note, "my_sort");*/
		#dump($note);
		
		#dump($note);
		// end of handle sort by like count
		if(count($note)>0)$totalNote = array_merge((array)$totalNote,(array)$note);
		#$totalNote = array_merge((array)$totalNote,(array)$note);
			#unset($note);
            #$data['note']=$note;
			/*
		    $this->load->model('Silent');
		    $this->Silent->uid= $_SESSION['user']['uid'];
		    $muteNote = $this->Silent->get();
		    
		    foreach($muteNote as $singleMuteNote){
			    array_push($muteNid,$singleMuteNote['nid']);
		    }
		    #$data['muteNid']=$muteNid;
		
		    $this->load->model('Like_note');
		    $this->Like_note->uid= $_SESSION['user']['uid'];
		    $likeNote = $this->Like_note->get();
		    #dump($likeNote);
		    $likeNid = [];
		    foreach($likeNote as $singleLikeNote){
			#dump($singleLikeNote);
			    array_push($likeNid,$singleLikeNote['nid']);
		    }
		    #dump($likeNid);
		    #$data['likeNid']=$likeNid;
		
			*/
		// end of copy from function place
	    }
		
		#dump($totalNote);
		
		$note1 = $totalNote;
	
		if($userinfo['current_state']){
			$this->load->model('Filter');
			$this->Filter->state = $userinfo['current_state'];
			$this->Filter->uid = $userinfo['uid'];
			$filters = $this->Filter->get();
			if($filters){			//get all related tags and put them into array $tags
				$tags_temp = array();
				$tags = array();
				foreach($filters as $filter){
					$tags_temp = json_decode($filter['tags'],true);
					if($tags_temp){
						foreach($tags_temp as $tag){
							array_push($tags, $tag);
						}
					}
				}
				#exit(json_encode($tags_temp));
			}
			if($tags){
				foreach($tags as $tag){		//get notes whose text_body or keyword like tags of filters
					$this->load->model('Note','note2',true);
					$this->note2->searchQ = $tag;
					$notes_temp[] = $this->note2->get();
				}
				$note2 = array();
				foreach($notes_temp as $notes){
					foreach($notes as $n){
						array_push($note2, $n);
					}
				}
				array_unique($note2);
				#exit(json_encode($note2));
				if($note2){
					$note = array_merge($note1, $note2);
					$data['note']=$note;
					#dump($note1);
					#dump($note2);
				}		
			}
			
		}else $data['note'] = $note1;
		/*foreach($note1 as $k=>$note){
			if($note['s_from']<
		}*/
	    $this->load->model('Silent');
	    $this->Silent->uid= $_SESSION['user']['uid'];
	    $muteNote = $this->Silent->get();
	    
	    foreach($muteNote as $singleMuteNote){
		    array_push($muteNid,$singleMuteNote['nid']);
	    }
	    $data['muteNid']=$muteNid;
		
		$data['userinfo']=$userinfo;
		$this->load->view('explore',$data);
		$this->load->view('footer');
	}
}
?>