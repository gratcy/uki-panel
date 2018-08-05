<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('categories/Categories_model');
    }
    
    function __get_categories($id='') {
		$users = $this -> _ci -> Categories_model -> __get_categories_select();
		$res = '<option value=""></option>';
		foreach($users as $k => $v)
			if ($id == $v -> cid)
				$res .= '<option value="'.$v -> cid.'" selected>'.$v -> cname.'</option>';
			else
				$res .= '<option value="'.$v -> cid.'">'.$v -> cname.'</option>';
		return $res;
	}
}
