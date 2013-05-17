<?php
class User_location_record extends CI_Model {
	
    function __construct(){
        // Call the Model constructor
        parent::__construct(); 
        $this->load->database();
    }
    
    function get($params=null){
		$this->db->select('*');
		$this->db->from('user_location_record');
		$where = ' 1=1 ';

		
		if(isset($this->uid)){
			$where .= ' AND user_location_record.uid = '.$this->uid;
		}		

		if(isset($this->loc_record_id)){
			$where .= ' AND user_location_record.loc_record_id = '.$this->loc_record_id;
		}
		if($params){
			$params['user_location_record.active']=1;
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
		/*if(isset($arr['password'])){
			$arr['password'] =  $this->prep_password($arr['password']);
		}
		*/
		$this->db->update('user_location_record', $arr, array('loc_record_id' => $id));
	}
	function insert($arr){
		$arr['dt_inserted'] = $arr['dt_edited'] = date('Y-m-d H:i:s',time());
		$this->db->insert('user_location_record', $arr);
		return $this->db->insert_id();
	}
}