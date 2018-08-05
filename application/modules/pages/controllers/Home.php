<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('Pages_model');
	}

	public function index()
	{
		$data['data'] = $this -> Pages_model -> __get_pages();
		$this->load->view('pages', $data);
	}

	public function add()
	{
		$this->load->view('pages_' . __FUNCTION__);
	}

	public function edit($id)
	{
		$data['id'] = $id;
		$data['data'] = $this -> Pages_model -> __get_pages_detail($id);
		$this->load->view('pages_' . __FUNCTION__, $data);
	}

	public function remove($id)
	{
		$data['data'] = $this -> Pages_model -> __get_pages();
		$this->load->view('pages_' . __FUNCTION__, $data);
	}
}
