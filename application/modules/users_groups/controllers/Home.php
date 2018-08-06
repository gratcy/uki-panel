<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('Users_groups_model');
	}

	public function index()
	{
		$data['data'] = $this -> Users_groups_model -> __get_users_groups();
		$this->load->view('users_groups', $data);
	}

	public function add()
	{
		if ($_POST) {
			$status = (int) $this -> input -> post('status');
			$name = $this -> input -> post('name');
			$desc = $this -> input -> post('desc');

			if (!$name || !$desc) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('users_groups/add'));
			}
			else {
				$arr = array('gname' => $name, 'gdesc' => $desc, 'gstatus' => $status, 'gcreatedby' => __set_modification_log([], 0, 2), 'gupdatedby' => __set_modification_log([], 0, 2));
				if ($this -> Users_groups_model -> __insert_users_groups($arr)) {
					__set_error_msg(array('info' => 'Group berhasil ditambahkan.'));
					redirect(site_url('users_groups'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan group !!!'));
					redirect(site_url('users_groups'));
				}
			}
		}
		else {
			$this->load->view('users_groups_' . __FUNCTION__);
		}
	}

	public function edit($id)
	{
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$status = (int) $this -> input -> post('status');
			$name = $this -> input -> post('name');
			$desc = $this -> input -> post('desc');
			
			if ($id) {
				if (!$name || !$desc) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('users_groups/edit/' . $id));
				}
				else {
					$arr = array('gname' => $name, 'gdesc' => $desc, 'gstatus' => $status, 'gupdatedby' => __set_modification_log([], 0, 2));
					if ($this -> Users_groups_model -> __update_users_groups($id, $arr)) {
						__set_error_msg(array('info' => 'Group berhasil diubah.'));
						redirect(site_url('users_groups'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah group !!!'));
						redirect(site_url('users_groups'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('users_groups'));
			}
		}
		else {
			$data['id'] = $id;
			$data['data'] = $this -> Users_groups_model -> __get_users_groups_detail($id);
			$this->load->view('users_groups_' . __FUNCTION__, $data);
		}
	}

	public function remove($id)
	{
		if (!$id) {
			__set_error_msg(array('error' => 'Kesalahan input data !!!'));
			redirect(site_url('users_groups'));
		}

		if ($this -> Users_groups_model -> __update_users_groups($id, array('gstatus' => 2, 'gupdatedby' => __set_modification_log([], 0, 2)))) {
			__set_error_msg(array('info' => 'User Group berhasil di hapus.'));
			redirect(site_url('users_groups'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus user group !!!'));
			redirect(site_url('users_groups'));
		}
	}
}
