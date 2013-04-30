<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class MY_Exceptions extends CI_Exceptions  {
	
    function MY_Exceptions ()
    {
        parent::__construct();
    }
	
	function log_exception($severity, $message, $filepath, $line)
	{	
		
		$severity = ( ! isset($this->levels[$severity])) ? $severity : $this->levels[$severity];
		if($severity=='Notice')
			return;
		$msg = 'Severity: '.$severity.'  --> '.$message. ' '.$filepath.' '.$line;
		log_message('error', 'Severity: '.$severity.'  --> '.$message. ' '.$filepath.' '.$line, TRUE);

	}
	
	function show_404($page = '', $log_error = FALSE)
	{
		$heading = "404 Page Not Found";
		$message = "The page you requested was not found.";

		echo $this->show_error($heading, $message, 'error_404', 404);
		exit;
	}
}