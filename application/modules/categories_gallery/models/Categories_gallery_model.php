<?php
class Categories_gallery_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function __get_categories($faculty) {
		$this -> db -> select("a.*, b.cname as cparentname FROM categories_tab a LEFT JOIN categories_tab b ON a.cparent=b.cid WHERE a.ctype=2 AND (a.cstatus=1 OR a.cstatus=0) AND a.cfaculty=" . $faculty, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_categories_detail($id) {
		$this -> db -> select('* FROM categories_tab WHERE cid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __insert_categories($data) {
        return $this -> db -> insert('categories_tab', $data);
	}
	
	function __update_categories($id, $data) {
        $this -> db -> where('cid', $id);
        return $this -> db -> update('categories_tab', $data);
	}

	function __get_categories_select($type, $parent, $faculty) {
		if ($type == 1)
			$this -> db -> select('cid,cname FROM categories_tab WHERE ctype=2 AND (cstatus=1 OR cstatus=0) AND cparent=0 AND cfaculty='.$faculty.' ORDER BY cname ASC');
		else
			$this -> db -> select('cid,cname FROM categories_tab WHERE ctype=2 AND (cstatus=1 OR cstatus=0) AND cparent='.$parent.' AND cfaculty='.$faculty.' ORDER BY cname ASC');
		return $this -> db -> get() -> result();
	}
}
