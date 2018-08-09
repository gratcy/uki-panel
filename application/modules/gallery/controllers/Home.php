<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('Gallery_model');
		$this -> load -> library('categories_gallery/Categories_gallery_lib');
	}

	public function index()
	{
		$data['data'] = $this -> Gallery_model -> __get_gallery(1, 0);
		$this->load->view('gallery', $data);
	}

	public function add()
	{
		if ($_POST) {
			$category = (int) $this -> input -> post('category');
			$faculty = (int) $this -> input -> post('faculty');
			$status = (int) $this -> input -> post('status');
			$title = $this -> input -> post('title');
			$content = $this -> input -> post('content');

			if (!$category || !$title || !$content) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('gallery/add'));
			}
			else {
				if ($_FILES && !empty($_FILES['file']['name'])) {
					if (preg_match('/jpeg|jpg|png|gif|svg/i', $_FILES['file']['type'])) {
						$fname = time() . $_FILES['file']['name'];
						$fname = str_replace(' ', '-', $fname);
						$fname = str_replace('--', '-', $fname);
						$target_file = FCPATH . $this -> config -> config['upload']['gallery']['path'] . $fname;

					    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
							$arr = array('gcid' => $category, 'gfaculty' => $faculty, 'gdate' => date('Y-m-d H:i:s'), 'gtitle' => $title, 'gcontent' => $content, 'gfile' => $fname, 'gstatus' => $status, 'gcreatedby' => __set_modification_log([], 0, 2), 'gupdatedby' => __set_modification_log([], 0, 2));
							if ($this -> Gallery_model -> __insert_gallery($arr)) {
								__set_error_msg(array('info' => 'Gallery berhasil ditambahkan.'));
								redirect(site_url('gallery'));
							}
							else {
								__set_error_msg(array('error' => 'Gagal menambahkan gallery !!!'));
								redirect(site_url('gallery'));
							}
						}
						else {
							__set_error_msg(array('error' => 'Gagal upload file !!!'));
							redirect(site_url('gallery'));
						}
					}
					else {
						__set_error_msg(array('error' => 'Format file tidak diterima !!!'));
						redirect(site_url('gallery'));
					}
				}
				else {
					__set_error_msg(array('error' => 'Gambar tidak ada !!!'));
					redirect(site_url('gallery'));
				}
			}
		}
		else {
			$data['categories'] = $this -> categories_gallery_lib -> __get_categories(0);
			$this->load->view('gallery_' . __FUNCTION__, $data);
		}
	}

	public function edit($id)
	{
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$category = (int) $this -> input -> post('category');
			$faculty = (int) $this -> input -> post('faculty');
			$status = (int) $this -> input -> post('status');
			$title = $this -> input -> post('title');
			$content = $this -> input -> post('content');

			if ($id) {
				if (!$category || !$title || !$content) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('gallery/edit/' . $id));
				}
				else {
					$arr = array();
					if ($_FILES && !empty($_FILES['file']['name'])) {
						if (preg_match('/jpeg|jpg|png|gif|svg/i', $_FILES['file']['type'])) {
							$fname = time() . $_FILES['file']['name'];
							$fname = str_replace(' ', '-', $fname);
							$fname = str_replace('--', '-', $fname);
							$target_file = FCPATH . $this -> config -> config['upload']['gallery']['path'] . $fname;

						    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
								$arr = array('gcid' => $category, 'gfaculty' => $faculty, 'gtitle' => $title, 'gcontent' => $content, 'gstatus' => $status, 'gfile' => $fname, 'gupdatedby' => __set_modification_log([], 0, 2));
							}
							else {
								__set_error_msg(array('error' => 'Gagal upload data !!!'));
								redirect(site_url('gallery/edit/' . $id));
							}
						}
						else {
							__set_error_msg(array('error' => 'Format file tidak diterima !!!'));
							redirect(site_url('gallery/edit/' . $id));
						}
					}
					else {
						$arr = array('gcid' => $category, 'gfaculty' => $faculty, 'gtitle' => $title, 'gcontent' => $content, 'gstatus' => $status, 'gupdatedby' => __set_modification_log([], 0, 2));
					}

					if ($this -> Gallery_model -> __update_gallery($id, $arr)) {
						__set_error_msg(array('info' => 'Gallery berhasil diubah.'));
						redirect(site_url('gallery'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah gallery !!!'));
						redirect(site_url('gallery'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('gallery'));
			}
		}
		else {
			$data['data'] = $this -> Gallery_model -> __get_gallery_detail($id);
			$data['id'] = $id;
			$data['categories'] = $this -> categories_gallery_lib -> __get_categories($data['data'][0] -> gcid);
			$this->load->view('gallery_' . __FUNCTION__, $data);
		}
	}

	public function remove($id)
	{
		if (!$id) {
			__set_error_msg(array('error' => 'Kesalahan input data !!!'));
			redirect(site_url('gallery'));
		}

		if ($this -> Gallery_model -> __update_gallery($id, array('cstatus' => 0, 'cupdatedby' => __set_modification_log([], 0, 2)))) {
			__set_error_msg(array('info' => 'Category berhasil di hapus.'));
			redirect(site_url('gallery'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus category !!!'));
			redirect(site_url('gallery'));
		}
	}
}
