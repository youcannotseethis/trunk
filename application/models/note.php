<?php
class Note extends CI_Model {
	
    function __construct(){
        // Call the Model constructor
        parent::__construct(); 
        $this->load->database();
    }
    
    function get($params=null){
		$this->db->select('*');
		$this->db->from('note');
		$where = ' 1=1 ';
		if(isset($this->nid)){
			$where .= ' AND note.nid = '.$this->nid;
		}	
		if($params){
			$params['note.active']=1;
			$this->db->where($params);	
		}else
			$this->db->where($where, null, false);	
		if(isset($this->group_by))
			$this->db->group_by($this->group_by);
		if(isset($this->order_by))
			$this->db->order_by($this->order_by);
		$query = $this->db->get();
		#dump($this->db->last_query());
		#dump($query->result_array());
        return $query->result_array();
    }
	
	function update($arr,$id){
		$arr['dt_edited'] = date('Y-m-d H:i:s',time());
		$this->db->update('note', $arr, array('nid' => $id));
	}
	function insert($arr){
		$arr['dt_inserted'] = $arr['dt_edited'] = date('Y-m-d H:i:s',time());
		$this->db->insert('note', $arr);
		return $this->db->insert_id();
	}
	
	function getFriendRecentNote($uid){
		$this->db->select('text_body,note.uid as note_uid,note.pid as note_pid,note.dt_inserted as note_inserted,pname,user.first_name as first_name,user.last_name as last_name');
		$this->db->from('note');
		$this->db->join('follow', 'note.uid = follow.followed_user');
		$this->db->join('place', 'place.pid = note.pid');
		$this->db->join('user','user.uid=note.uid');
		$this->db->where('follow.current_u',$uid);
		#Todo filter!!!!!
		$this->db->order_by("note.dt_inserted", "desc"); 
		$query = $this->db->get();
		return $query->result_array();
	}
	 
}