<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('auth_helper'))
{
	function auth_route($perms='',$redirect_url=false){
		$CI =& get_instance();
		$CI->load->helper('url');
		$user = $_SESSION['user'];
		if($perms && !$user){
			$redirect_url = '/index.php/login';  
		}elseif($perms){
			//we are user but do we have permission to be here?
			if(!auth($perms) && !$redirect_url)
				$redirect_url = '/403';
		}
		if($redirect_url){
			redirect($redirect_url.'?referral='.urlencode($CI->uri->uri_string().($_SERVER['QUERY_STRING']?'?'.$_SERVER['QUERY_STRING']:'')),'location');
		}
	}
}
if ( ! function_exists('set_user'))
{
	function set_user($user_id){
		$CI =& get_instance();
		$CI->load->model('User',false,true);	
		$CI->User->id = $user_id;
		$user = current($CI->User->get());
		$user['permission_array'] = explode(',',$user['permissions']);
		$_SESSION['user'] = $user;
		unset($CI->CI->User);
	}
}
if ( ! function_exists('auth'))
{
	function auth($perms = null){
		if($perms){
			$CI =& get_instance();
			$CI->load->model('User',false, true);
			$user = isset($_SESSION['user'])&&$_SESSION['user']?$_SESSION['user']:false;
			if($user && $perms='user'){
				return true;
			}
			else
				return false;
			/*(
			$user['permission_array'][] = 'user';
			$perms_needed = explode(',',$perms);
			$perms_needed[] = 'admin';//admin is always welcome
			foreach($perms_needed as $perm_needed){
				//if we have at least one of the requested permissions in the user's permission array then let us through
				if(in_array($perm_needed,$user['permission_array'])){
					#dump($_SESSION['user']['id']);
					#$u_arr = array('ll_ip_address'=> $_SERVER['REMOTE_ADDR'], 'id' => $_SESSION['user']['id']);
					#dump($u_arr);
					#$CI->User->update($u_arr, $_SERVER['user']['id']);
					return true;
				}
			}
			return false;
			*/
		}
		return false;
		
	}
}