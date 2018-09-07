<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('Testimony_model');
	}

	public function index()
	{
		$data['data'] = $this -> Testimony_model -> __get_testimony($this -> permission_lib -> sesresult['ufaculty']);
		$this->load->view('testimony', $data);
	}

	public function add()
	{
		if ($_POST) {
			$faculty = (int) $this -> input -> post('faculty');
			$status = (int) $this -> input -> post('status');
			$name = $this -> input -> post('name');
			$company = $this -> input -> post('company');
			$testimony = $this -> input -> post('testimony');

			if (!$name || !$company || !$testimony) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('testimony/add'));
			}
			else {
				if ($_FILES && !empty($_FILES['file']['name'])) {
					if (preg_match('/jpeg|jpg|png|gif|svg/i', $_FILES['file']['type'])) {
						$fname = time() . $_FILES['file']['name'];
						$fname = str_replace(' ', '-', $fname);
						$fname = str_replace('--', '-', $fname);
						$target_file = FCPATH . $this -> config -> config['upload']['testimonial']['path'] . $fname;

					    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
							$arr = array('tfaculty' => $faculty, 'tname' => $name, 'tcompany' => $company, 'ttestimony' => $testimony, 'tphoto' => $fname, 'tstatus' => $status, 'tcreatedby' => __set_modification_log([], 0, 2), 'tupdatedby' => __set_modification_log([], 0, 2));
							if ($this -> Testimony_model -> __insert_testimony($arr)) {
								__set_error_msg(array('info' => 'Testimony berhasil ditambahkan.'));
								redirect(site_url('testimony'));
							}
							else {
								__set_error_msg(array('error' => 'Gagal menambahkan testimony !!!'));
								redirect(site_url('testimony'));
							}
						}
						else {
							__set_error_msg(array('error' => 'Gagal upload file !!!'));
							redirect(site_url('testimony'));
						}
					}
					else {
						__set_error_msg(array('error' => 'Format file tidak diterima !!!'));
						redirect(site_url('testimony/add'));
					}
				}
				else {
					__set_error_msg(array('error' => 'Photo harus di isi !!!'));
					redirect(site_url('testimony/add'));
				}
			}
		}
		else {
			$this->load->view('testimony_' . __FUNCTION__, []);
		}
	}

	public function edit($id)
	{
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$status = (int) $this -> input -> post('status');
			$name = $this -> input -> post('name');
			$company = $this -> input -> post('company');
			$testimony = $this -> input -> post('testimony');
			
			if ($id) {
				if (!$name || !$company || !$testimony) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('testimony/edit/' . $id));
				}
				else {
					if ($_FILES && !empty($_FILES['file']['name'])) {
						if (preg_match('/jpeg|jpg|png|gif|svg/i', $_FILES['file']['type'])) {
							$fname = time() . $_FILES['file']['name'];
							$fname = str_replace(' ', '-', $fname);
							$fname = str_replace('--', '-', $fname);
							$target_file = FCPATH . $this -> config -> config['upload']['testimonial']['path'] . $fname;

						    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
								$arr = array('tname' => $name, 'tphoto' => $fname, 'tcompany' => $company, 'ttestimony' => $testimony, 'tstatus' => $status, 'tupdatedby' => __set_modification_log([], 0, 2));
								if ($this -> Testimony_model -> __update_testimony($id, $arr)) {	
									__set_error_msg(array('info' => 'Testimony berhasil diubah.'));
									redirect(site_url('testimony'));
								}
								else {
									__set_error_msg(array('error' => 'Gagal mengubah testimony !!!'));
									redirect(site_url('testimony'));
								}
							}
							else {
								__set_error_msg(array('error' => 'Gagal upload photo !!!'));
								redirect(site_url('testimony/edit/' . $id));
							}
						}
						else {
							__set_error_msg(array('error' => 'Format file tidak diterima !!!'));
							redirect(site_url('testimony/edit/' . $id));
						}
					}
					else {
						$arr = array('tname' => $name, 'tcompany' => $company, 'ttestimony' => $testimony, 'tstatus' => $status, 'tupdatedby' => __set_modification_log([], 0, 2));
						if ($this -> Testimony_model -> __update_testimony($id, $arr)) {	
							__set_error_msg(array('info' => 'Testimony berhasil diubah.'));
							redirect(site_url('testimony'));
						}
						else {
							__set_error_msg(array('error' => 'Gagal mengubah testimony !!!'));
							redirect(site_url('testimony'));
						}
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('testimony'));
			}
		}
		else {
			$data['id'] = $id;
			$data['data'] = $this -> Testimony_model -> __get_testimony_detail($id);
			$this->load->view('testimony_' . __FUNCTION__, $data);
		}
	}

	public function remove($id)
	{
		if (!$id) {
			__set_error_msg(array('error' => 'Kesalahan input data !!!'));
			redirect(site_url('testimony'));
		}

		if ($this -> Testimony_model -> __update_testimony($id, array('tstatus' => 2, 'tupdatedby' => __set_modification_log([], 0, 2)))) {
			__set_error_msg(array('info' => 'Testimony berhasil di hapus.'));
			redirect(site_url('testimony'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus testimony !!!'));
			redirect(site_url('testimony'));
		}
	}
}
