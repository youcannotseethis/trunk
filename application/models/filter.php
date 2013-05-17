<?php
class Filter extends CI_Model {
	
    function __construct(){
        // Call the Model constructor
        parent::__construct(); 
        $this->load->database();
    }
    
    function get($params=null){
		$this->db->select('*');
		$this->db->from('filter');
		$where = ' 1=1 ';
		if(isset($this->time_slot_no_repeat)){
			$where .= ' AND filter.s_from < '.$this->time_slot_no_repeat.' AND filter.s_to > '.$this->time_slot_no_repeat.' ';
		}
		if(isset($this->time_slot_repeat)){
		}
		if(isset($this->fid)){
			$where .= ' AND filter.fid = '.$this->fid;
		}	
		if(isset($this->uid)){
			$this->db->join('user','user.uid = filter.uid', 'left');
			$where .= ' AND filter.uid = '.$this->uid;
		}
		if(isset($this->state)){
			$where .= ' AND filter.state = '.$this->state;
		}
		if($params){
			$params['filter.active']=1;
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
		$this->db->update('filter', $arr, array('fid' => $id));
	}
	function insert($arr){
		$arr['dt_edited'] = date('Y-m-d H:i:s', time());
		$arr['dt_inserted'] = date('Y-m-d H:i:s', time());
		$this->db->insert('filter', $arr);
		return $this->db->insert_id();
	}
}