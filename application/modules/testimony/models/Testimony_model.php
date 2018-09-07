<?php
class Testimony_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function __get_testimony($faculty) {
		$this -> db -> select('* FROM testimonial_tab WHERE (tstatus=1 OR tstatus=0) AND tfaculty='.$faculty, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_testimony_detail($id) {
		$this -> db -> select('* FROM testimonial_tab WHERE tid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __insert_testimony($data) {
        return $this -> db -> insert('testimonial_tab', $data);
	}
	
	function __update_testimony($id, $data) {
        $this -> db -> where('tid', $id);
        return $this -> db -> update('testimonial_tab', $data);
	}
}
