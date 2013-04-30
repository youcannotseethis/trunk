<?php
class MY_Form_validation extends CI_Form_validation
{
    function __construct()
    {
        parent::__construct();
    }
 
    /**
     * Error Array
     *
     * Returns the error messages as an array
     *
     * @return  array
     */
    function error_array()
    {
        if (count($this->_error_array) === 0)
        {
                return FALSE;
        }
        else
            return $this->_error_array;
 
    }
}