<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permission_lib {
	private $_ci;
	public $login = false;
	public $sesresult = array();
	
	function __construct() {
		$this -> _ci =& get_instance();
		if ($this -> _ci -> cache -> memcached -> get('__login')) {
			if ($this -> _ci -> cache -> memcached -> get('__login')['uid']) {
				$this -> login = true;
				$this -> sesresult = $this -> _ci -> cache -> memcached -> get('__login');
			}
		}

		self::__check_login();
		self::__check_remember();
	}
	
	function __check_remember() {

	}
	
	function __check_login() {
		if ($this -> _ci -> uri -> segment(1) !== 'switchfaculty') {
			if ($this -> _ci -> uri -> segment(1) !== 'login') {
				if (!$this -> login) redirect(site_url('login'));
			}
			else {
				if ($this -> _ci -> uri -> segment(2) !== 'logout') {
					if ($this -> login) redirect(site_url(''));
				}
			}
		}
	}
}
