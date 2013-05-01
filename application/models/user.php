<?php
class User extends CI_Model {
	
    function __construct(){
        // Call the Model constructor
        parent::__construct(); 
        $this->load->database();
    }
    
    function get($params=null){
		$this->db->select('*');
		$this->db->from('user');
		$where = ' 1=1 ';
		/*
		if(isset($this->searchQ)){
			$q = $this->db->escape('%'.$this->searchQ.'%');
			$where .= " AND ((LOWER(user.name) LIKE $q) OR (LOWER(user.email) LIKE $q)
						OR (LOWER(user.id) LIKE $q))";
		}
		*/
		if(isset($this->uid)){
			$where .= ' AND user.uid = '.$this->uid;
		}		
		if(isset($this->uname)){
			$where .= ' AND user.uname = '.$this->uname;
		}
		if(isset($this->password)){
			$where .= ' AND user.password = '.$this->password;
		}
		if($params){
			$params['user.active']=1;
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
		$this->db->update('user', $arr, array('uid' => $id));
	}
	function insert($arr){
		$arr['dt_inserted'] = $arr['dt_edited'] = date('Y-m-d H:i:s',time());
		$arr['password'] = $arr['password'];//$this->prep_password($arr['password']);
		$this->db->insert('user', $arr);
		return $this->db->insert_id();
	}
	function prep_password($password){
		 return sha1($password.$this->config->item('encryption_key'));
	}
	 
	function login($username, $password){
		 $this->db->where('uname', $username);
		 $this->db->where('password', $password);#$this->prep_password($password));
		 $query = $this->db->get('user', 1);
		 if ( $query->num_rows() == 1) {
			$user = current($query->result_array());
			#$user['permission_array'] = explode(',',$user['permissions']);
			$_SESSION['user']=$user;
			/*$u_arr = array('ll_ip_address'=> $_SERVER['REMOTE_ADDR'], 'dt_last_login' => MYSQL_NOW);
			$this->update($u_arr, $user['id']);
			*/
			return true;
		 }
	 
		 return false;
	} 
	 
}