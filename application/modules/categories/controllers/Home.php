<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('Categories_model');
	}

	public function index()
	{
		$data['data'] = $this -> Categories_model -> __get_categories();
		$this->load->view('categories', $data);
	}

	public function add()
	{
		$this->load->view('categories_' . __FUNCTION__);
	}

	public function edit($id)
	{
		$data['id'] = $id;
		$data['data'] = $this -> Categories_model -> __get_categories_detail($id);
		$this->load->view('categories_' . __FUNCTION__, $data);
	}

	public function remove($id)
	{
		$data['data'] = $this -> Categories_model -> __get_categories();
		$this->load->view('categories_' . __FUNCTION__, $data);
	}
}
