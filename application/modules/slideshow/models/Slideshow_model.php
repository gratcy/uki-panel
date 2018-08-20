<?php
class Slideshow_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function __get_slideshow($faculty) {
		$this -> db -> select("* FROM slideshow_tab WHERE (sstatus=1 OR sstatus=0) AND sfaculty=".$faculty." ORDER BY sid DESC", FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_slideshow_detail($id) {
		$this -> db -> select('* FROM slideshow_tab WHERE sid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __insert_slideshow($data) {
        return $this -> db -> insert('slideshow_tab', $data);
	}
	
	function __update_slideshow($id, $data) {
        $this -> db -> where('sid', $id);
        return $this -> db -> update('slideshow_tab', $data);
	}
}
