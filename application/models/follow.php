<?php
class Follow extends CI_Model {
	
    function __construct(){
        // Call the Model constructor
        parent::__construct(); 
        $this->load->database();
    }
    
    function get($params=null){
		$this->db->select('*');
		$this->db->from('follow');
		if(isset($this->current_u)){
			$joinClause = "user.uid=follow.followed_user";
		}
		if(isset($this->followed_user)){
			$joinClause = "user.uid=follow.current_u";
		}
		$this->db->join('user',$joinClause);
		$where = ' 1=1 ';
		if(isset($this->current_u)){
			$where .= ' AND follow.current_u = '.$this->current_u;
		}		
		if(isset($this->followed_user)){
			$where .= ' AND follow.followed_user = '.$this->followed_user;
		}
		if($params){
			$this->db->where($params);	
		}else
			$this->db->where($where, null, false);	
		if(isset($this->group_by))
			$this->db->group_by($this->group_by);
		if(isset($this->order_by))
			$this->db->order_by($this->order_by);
		$query = $this->db->get();
        return $query->result_array();
    }
	
	function insert($arr){
		$arr['dt_inserted'] = $arr['dt_edited'] = date('Y-m-d H:i:s',time());
		$arr['password'] = $arr['password'];//$this->prep_password($arr['password']);
		$this->db->insert('user', $arr);
		return $this->db->insert_id();
	}
	 
}