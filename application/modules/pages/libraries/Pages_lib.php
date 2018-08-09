<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('pages/Pages_model');
    }
    
    function __get_pages($id='', $faculty) {
		$users = $this -> _ci -> Pages_model -> __get_pages_select(1, 0, $faculty);
		
		$res = '<option value="0">Main</option>';
		foreach($users as $k => $v) :
			if ($id == $v -> pid)
				$res .= '<option value="'.$v -> pid.'" selected>'.$v -> ptitle.'</option>';
			else
				$res .= '<option value="'.$v -> pid.'">'.$v -> ptitle.'</option>';
	
			$pagesChild = $this -> _ci -> Pages_model -> __get_pages_select(2, $v -> pid, $faculty);
			foreach($pagesChild as $k1 => $v1) :
				if ($id == $v1 -> pid)
					$res .= '<option value="'.$v1 -> pid.'" selected>-- '.$v1 -> ptitle.'</option>';
				else
					$res .= '<option value="'.$v1 -> pid.'">-- '.$v1 -> ptitle.'</option>';
			endforeach;
		endforeach;

		return $res;
	}
}
