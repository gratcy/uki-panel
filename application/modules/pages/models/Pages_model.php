<?php
class Pages_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function __get_pages() {
		$this -> db -> select("* FROM pages_tab WHERE (pstatus=1 OR pstatus=0)", FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_pages_detail($id) {
		$this -> db -> select('* FROM pages_tab WHERE pid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __insert_pages($data) {
        return $this -> db -> insert('pages_tab', $data);
	}
	
	function __update_pages($id, $data) {
        $this -> db -> where('pid', $id);
        return $this -> db -> update('pages_tab', $data);
	}
}
