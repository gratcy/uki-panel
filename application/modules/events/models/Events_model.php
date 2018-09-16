<?php
class Events_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function __get_events($faculty) {
		$this -> db -> select("* FROM events_tab WHERE (estatus=1 OR estatus=0 OR estatus=2) AND efaculty=" . $faculty, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_events_detail($id) {
		$this -> db -> select('* FROM events_tab WHERE eid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __insert_events($data) {
        return $this -> db -> insert('events_tab', $data);
	}
	
	function __update_events($id, $data) {
        $this -> db -> where('eid', $id);
        return $this -> db -> update('events_tab', $data);
	}
}
