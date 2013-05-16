<?php
class Like_note extends CI_Model {
	
    function __construct(){
        // Call the Model constructor
        parent::__construct(); 
        $this->load->database();
    }
    
    function get($params=null){
		$this->db->select('*');
		$this->db->from('like_note');
		$where = ' 1=1 ';
		/*
		if(isset($this->fid)){
			$where .= ' AND filter.fid = '.$this->fid;
		}*/	
		if(isset($this->uid)){
		#	$this->db->join('user','user.uid = filter.uid', 'left');
			$where .= ' AND like_note.uid = '.$this->uid;
		}/*
		if(isset($this->state)){
			$where .= ' AND filter.state = '.$this->state;
		}
		*/
		if($params){
			$params['like_note.active']=1;
			$this->db->where($params);	
		}else
			$this->db->where($where, null, false);	
		
		if(isset($this->group_by))
			$this->db->group_by($this->group_by);
		if(isset($this->order_by))
			$this->db->order_by($this->order_by);
		$query = $this->db->get();
		#dump($this->db->last_query());
        return $query->result_array();
    }
	
	function update($arr,$id){
		$arr['dt_edited'] = date('Y-m-d H:i:s',time());
		$this->db->update('like_note', $arr, array('fid' => $id));
	}
	function insert($arr){
		$arr['dt_inserted'] = $arr['dt_edited'] = date('Y-m-d H:i:s',time());
		$this->db->insert('like_note', $arr);
		return $this->db->insert_id();
	}
	
	function countLike(){
		$query = $this->db->query('select nid, count(uid) as time from like_note where like_note.active = 1 group by nid');
		return $query->result_array();
	}
}