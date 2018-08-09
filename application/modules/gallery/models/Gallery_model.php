<?php
class Gallery_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function __get_gallery($faculty) {
		$this -> db -> select("a.*,b.cname FROM gallery_tab a JOIN categories_tab b ON a.gcid=b.cid WHERE b.ctype=2 AND a.gstatus=1 AND a.gfaculty=" . $faculty, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_gallery_detail($id) {
		$this -> db -> select('* FROM gallery_tab WHERE gid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __insert_gallery($data) {
        return $this -> db -> insert('gallery_tab', $data);
	}
	
	function __update_gallery($id, $data) {
        $this -> db -> where('gid', $id);
        return $this -> db -> update('gallery_tab', $data);
	}
}
