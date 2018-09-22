<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('Events_model');
	}

	public function index()
	{
		$data['data'] = $this -> Events_model -> __get_events($this -> permission_lib -> sesresult['ufaculty']);
		$this->load->view('events', $data);
	}

	public function add()
	{
		if ($_POST) {
			$faculty = (int) $this -> input -> post('faculty');
			$status = (int) $this -> input -> post('status');
			$title = $this -> input -> post('title');
			$content = $this -> input -> post('content');
			$location = $this -> input -> post('location');
			$datefrom = $this -> input -> post('datefrom');
			$dateto = $this -> input -> post('dateto');

			if (!$title || !$content || !$location || !$datefrom || !$dateto) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('events/add'));
			}
			else {
				if ($_FILES && !empty($_FILES['file']['name'])) {
					if (preg_match('/jpeg|jpg|png|gif|svg/i', $_FILES['file']['type'])) {
						$fname = time() . $_FILES['file']['name'];
						$fname = str_replace(' ', '-', $fname);
						$fname = str_replace('--', '-', $fname);
						$target_file = FCPATH . $this -> config -> config['upload']['events']['path'] . $fname;

					    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
							$datefrom = str_replace('/', '-', $datefrom);
							$datefrom = strtotime($datefrom);
							$dateto = str_replace('/', '-', $dateto);
							$dateto = strtotime($dateto);

							$arr = array('euid' => $this -> permission_lib -> sesresult['uid'], 'efaculty' => $faculty, 'elocation' => $location, 'edatefrom' => date('Y-m-d H:i:s', $datefrom), 'edateto' => date('Y-m-d H:i:s', $dateto), 'ecover' => $fname, 'etitle' => $title, 'econtent' => $content, 'estatus' => $status, 'ecreatedby' => __set_modification_log([], 0, 2), 'eupdatedby' => __set_modification_log([], 0, 2));
							if ($this -> Events_model -> __insert_events($arr)) {
								__set_error_msg(array('info' => 'Event berhasil ditambahkan.'));
								redirect(site_url('events'));
							}
							else {
								__set_error_msg(array('error' => 'Gagal menambahkan post !!!'));
								redirect(site_url('events'));
							}
						}
						else {
							__set_error_msg(array('error' => 'Gagal upload cover !!!'));
							redirect(site_url('events'));
						}
					}
					else {
						__set_error_msg(array('error' => 'Format file tidak diterima !!!'));
						redirect(site_url('events/add'));
					}
				}
				else {
					__set_error_msg(array('error' => 'Cover harus di isi !!!'));
					redirect(site_url('events/add'));
				}
			}
		}
		else {
			$this->load->view('events_' . __FUNCTION__, array());
		}
	}

	public function edit($id)
	{
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$faculty = (int) $this -> input -> post('faculty');
			$status = (int) $this -> input -> post('status');
			$title = $this -> input -> post('title');
			$content = $this -> input -> post('content');
			$location = $this -> input -> post('location');
			$datefrom = $this -> input -> post('datefrom');
			$dateto = $this -> input -> post('dateto');

			if ($id) {
				if (!$title || !$content || !$location || !$datefrom) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('events/edit/' . $id));
				}
				else {
					$datefrom = str_replace('/', '-', $datefrom);
					$datefrom = strtotime($datefrom);

					$dateto = str_replace('/', '-', $dateto);
					$dateto = strtotime($dateto);

					if ($_FILES && !empty($_FILES['file']['name'])) {
						if (preg_match('/jpeg|jpg|png|gif|svg/i', $_FILES['file']['type'])) {
							$fname = time() . $_FILES['file']['name'];
							$fname = str_replace(' ', '-', $fname);
							$fname = str_replace('--', '-', $fname);
							$target_file = FCPATH . $this -> config -> config['upload']['events']['path'] . $fname;

						    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
								$arr = array('efaculty' => $faculty, 'elocation' => $location, 'edatefrom' => date('Y-m-d H:i:s', $datefrom), 'edateto' => date('Y-m-d H:i:s', $dateto), 'ecover' => $fname, 'etitle' => $title, 'econtent' => $content, 'estatus' => $status, 'eupdatedby' => __set_modification_log([], 0, 2));
								if ($this -> Events_model -> __update_events($id, $arr)) {
									__set_error_msg(array('info' => 'Event berhasil diubah.'));
									redirect(site_url('events'));
								}
								else {
									__set_error_msg(array('error' => 'Gagal mengubah event !!!'));
									redirect(site_url('events'));
								}
							}
							else {
								__set_error_msg(array('error' => 'Gagal upload cover !!!'));
								redirect(site_url('events/edit/' . $id));
							}
						}
						else {
							__set_error_msg(array('error' => 'Format file tidak diterima !!!'));
							redirect(site_url('events/edit/' . $id));
						}
					}
					else {
						$arr = array('efaculty' => $faculty, 'elocation' => $location, 'edatefrom' => date('Y-m-d H:i:s', $datefrom), 'edateto' => date('Y-m-d H:i:s', $dateto), 'etitle' => $title, 'econtent' => $content, 'estatus' => $status, 'eupdatedby' => __set_modification_log([], 0, 2));
						if ($this -> Events_model -> __update_events($id, $arr)) {
							__set_error_msg(array('info' => 'Event berhasil diubah.'));
							redirect(site_url('events'));
						}
						else {
							__set_error_msg(array('error' => 'Gagal mengubah event !!!'));
							redirect(site_url('events'));
						}
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('events'));
			}
		}
		else {
			$data['data'] = $this -> Events_model -> __get_events_detail($id);
			$data['id'] = $id;
			$this->load->view('events_' . __FUNCTION__, $data);
		}
	}

	public function remove($id)
	{
		if (!$id) {
			__set_error_msg(array('error' => 'Kesalahan input data !!!'));
			redirect(site_url('events'));
		}

		if ($this -> Events_model -> __update_events($id, array('estatus' => 3, 'eupdatedby' => __set_modification_log([], 0, 2)))) {
			__set_error_msg(array('info' => 'Event berhasil di hapus.'));
			redirect(site_url('events'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus events !!!'));
			redirect(site_url('events'));
		}
	}
}
