<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('Posts_model');
		$this -> load -> library('categories/Categories_lib');
	}

	public function index()
	{
		$data['data'] = $this -> Posts_model -> __get_posts();
		$this->load->view('posts', $data);
	}

	public function add()
	{
		$data['categories'] = $this -> categories_lib -> __get_categories(0);
		$this->load->view('posts_' . __FUNCTION__, $data);
	}

	public function edit($id)
	{
		$data['data'] = $this -> Posts_model -> __get_posts_detail($id);
		$data['id'] = $id;
		$data['categories'] = $this -> categories_lib -> __get_categories($data['data'][0] -> pcid);
		$this->load->view('posts_' . __FUNCTION__, $data);
	}

	public function remove($id)
	{
		$data['data'] = $this -> Posts_model -> __get_posts();
		$this->load->view('posts_' . __FUNCTION__, $data);
	}
}
