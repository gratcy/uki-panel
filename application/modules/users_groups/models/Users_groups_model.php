<?php
class Users_groups_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function __get_users_groups() {
		$this -> db -> select("* FROM groups_tab WHERE (gstatus=1 OR gstatus=0)", FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_users_groups_detail($id) {
		$this -> db -> select('* FROM groups_tab WHERE gid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __insert_users_groups($data) {
        return $this -> db -> insert('groups_tab', $data);
	}
	
	function __update_users_groups($id, $data) {
        $this -> db -> where('gid', $id);
        return $this -> db -> update('groups_tab', $data);
	}

	function __get_users_groups_select() {
		$this -> db -> select('gid,gname FROM groups_tab WHERE (gstatus=1 OR gstatus=0) ORDER BY gname ASC');
		return $this -> db -> get() -> result();
	}
}
