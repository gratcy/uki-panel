<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('Slideshow_model');
	}

	public function index()
	{
		$data['data'] = $this -> Slideshow_model -> __get_slideshow($this -> permission_lib -> sesresult['ufaculty']);
		$this->load->view('slideshow', $data);
	}

	public function add()
	{
		if ($_POST) {
			$url = $this -> input -> post('url');
			$title = $this -> input -> post('title');
			$desc = $this -> input -> post('desc');
			$status = (int) $this -> input -> post('status');

			if (!$title || !$desc) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('slideshow/add'));
			}
			else if (!empty($url) && !filter_var($url, FILTER_VALIDATE_URL)) {
				__set_error_msg(array('error' => 'Link URL salah !!!'));
				redirect(site_url('slideshow/add'));
			}
			else {
				if (empty($_FILES['file']['name'])) {
					__set_error_msg(array('error' => 'Gambar slideshow harus di upload !!!'));
					redirect(site_url('slideshow/add'));
				}
				else {
					if (preg_match('/jpeg|jpg|png|gif|svg/i', $_FILES['file']['type'])) {
						$fname = time() . $_FILES['file']['name'];
						$fname = str_replace(' ', '-', $fname);
						$fname = str_replace('--', '-', $fname);
						$target_file = FCPATH . $this -> config -> config['upload']['slideshow']['path'] . $fname;

					    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
							$arr = array('sfaculty' => $this -> permission_lib -> sesresult['ufaculty'], 'surl' => $url, 'stitle' => $title, 'sdesc' => $desc, 'sstatus' => $status, 'sfile' => $fname, 'screatedby' => __set_modification_log([], 0, 2), 'supdatedby' => __set_modification_log([], 0, 2));
							
							if ($this -> Slideshow_model -> __insert_slideshow($arr)) {
								__set_error_msg(array('info' => 'slideshow berhasil ditambahkan.'));
								redirect(site_url('slideshow'));
							}
							else {
								__set_error_msg(array('error' => 'Gagal menambahkan slideshow !!!'));
								redirect(site_url('slideshow'));
							}
					    } else {
							__set_error_msg(array('error' => 'Gagal upload slideshow !!!'));
							redirect(site_url('slideshow'));
					    }
				    } else {
						__set_error_msg(array('error' => 'Format file tidak diterima !!!'));
						redirect(site_url('slideshow'));
				    }
				}
			}
		}
		else {
			$this->load->view('slideshow_' . __FUNCTION__, array());
		}
	}

	public function edit($id)
	{
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$url = $this -> input -> post('url');
			$title = $this -> input -> post('title');
			$desc = $this -> input -> post('desc');
			$oldfile = $this -> input -> post('oldfile');
			$status = (int) $this -> input -> post('status');
			
			if ($id) {
				if (!$title || !$desc) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('slideshow/edit/' . $id));
				}
				else if (!empty($url) && !filter_var($url, FILTER_VALIDATE_URL)) {
					__set_error_msg(array('error' => 'Link URL salah !!!'));
					redirect(site_url('slideshow/edit/' . $id));
				}
				else {
					$slideshow = false;
					$fname = '';

					if ($_FILES && !empty($_FILES['file']['name'])) {
						if (preg_match('/jpeg|jpg|png|gif|svg/i', $_FILES['file']['type'])) {
							$fname = time() . $_FILES['file']['name'];
							$fname = str_replace(' ', '-', $fname);
							$fname = str_replace('--', '-', $fname);
							$target_file = FCPATH . $this -> config -> config['upload']['slideshow']['path'] . $fname;

							if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
								$slideshow = true;
							} else {
								__set_error_msg(array('error' => 'Gagal upload slideshow !!!'));
								redirect(site_url('slideshow'));
							}
						}
					}
					
					$arr = array('stitle' => $title, 'surl' => $url, 'sdesc' => $desc, 'sstatus' => $status, 'supdatedby' => __set_modification_log([], 0, 2));
					
					if ($slideshow === true && !empty($fname)) {
						$arr['sfile'] = $fname;
						
						$oldfile = FCPATH . $this -> config -> config['upload']['slideshow']['path'] . $oldfile;
						
						if (file_exists($oldfile)) {
							unlink($oldfile);
						}

						if ($this -> Slideshow_model -> __update_slideshow($id, $arr)) {	
							__set_error_msg(array('info' => 'slideshow berhasil diubah.'));
							redirect(site_url('slideshow'));
						}
						else {
							__set_error_msg(array('error' => 'Gagal mengubah slideshow !!!'));
							redirect(site_url('slideshow'));
						}
					}
					else {
						if ($this -> Slideshow_model -> __update_slideshow($id, $arr)) {	
							__set_error_msg(array('info' => 'slideshow berhasil diubah.'));
							redirect(site_url('slideshow'));
						}
						else {
							__set_error_msg(array('error' => 'Gagal mengubah slideshow !!!'));
							redirect(site_url('slideshow'));
						}
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('slideshow'));
			}
		}
		else {
			$data['id'] = $id;
			$data['data'] = $this -> Slideshow_model -> __get_slideshow_detail($id);
			$this->load->view('slideshow_' . __FUNCTION__, $data);
		}
	}

	public function remove($id)
	{
		if (!$id) {
			__set_error_msg(array('error' => 'Kesalahan input data !!!'));
			redirect(site_url('slideshow'));
		}

		if ($this -> Slideshow_model -> __update_slideshow($id, array('sstatus' => 2, 'supdatedby' => __set_modification_log([], 0, 2)))) {
			__set_error_msg(array('info' => 'slideshow berhasil di hapus.'));
			redirect(site_url('slideshow'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus slideshow !!!'));
			redirect(site_url('slideshow'));
		}
	}
}
