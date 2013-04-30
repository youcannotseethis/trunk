<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('dump'))
{
	function dump($my_array) {
    if (is_array($my_array)) {
        echo '<table border=1 cellspacing=0 cellpadding=3 width=100% style="background-color:#fff!important;color:#000">';
        echo '<tr><td colspan=2 style="background-color:#333333;"><strong><font color=white>ARRAY</font></strong></td></tr>';
        foreach ($my_array as $k => $v) {
                echo '<tr><td valign="top" style="width:40px;background-color:#F0F0F0;">';
                echo '<strong>' . $k . "</strong></td><td>";
                dump($v);
                echo "</td></tr>";
        }
        echo "</table>";
        return;
    }
	echo '<small>'.gettype($my_array).'</small> ';
    if ($my_array === NULL)
	{
	}
	elseif (is_bool($my_array))
	{
		echo ($my_array ? 'TRUE' : 'FALSE');
	}
	elseif (is_float($my_array))
	{
		echo $my_array;
	}else
		print_r($my_array);
}
}

if ( ! function_exists('add_view'))
{
	function add_view($path,$page,$data=array()){
		error_reporting(E_ALL ^ E_NOTICE);
		if(!$data){
			$data = $page;
			$page = &get_instance();
		}
		return $page->load->view($path,$data,true);  
	}
}

if ( ! function_exists('make_view'))
{
	function make_view($page=null,array $data=array()){
		if(!$data || !$page){
			$data = $page;
			$page = &get_instance();
		}
		if(!$page->input->is_ajax_request()){
			$data['action'] = $page->router->fetch_method();
			$data['controller'] = $page->router->fetch_class();
			$nav = isset($data['noNavFlg'])?'':add_view('global/head',$page,$data);
			$disclamer = isset($data['noDiscFlg'])?'':add_view('global/foot',$page,$data);
			$data = array_merge($data,array(	'head'=>add_view('global/head_base',$page,$data).$nav,
								'foot'=>$disclamer.add_view('global/foot_base',$page,$data)
								));
			if(!(isset($data['no_body'])&&$data['no_body'])){
				$data['body'] = add_view( $data['controller'].'/'.$data['action'],$page,$data);
			}
			return add_view('global/body',$page,$data);  
		}else{
			
		}
	}
}