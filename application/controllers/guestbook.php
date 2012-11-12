<?php
/**
* Created by TiLo 2012-10-11
*/
class Guestbook extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
    }
	
	function index() {
		$data['title'] = "The CI Guestbook title";	
		$data['heading'] = "The CI Guestbook heading";
		$data['query'] = $this->db->get('comments');
		
		$this->load->view('guestbook_view', $data);
	}
	
	function comment_insert() {
		
		$this->db->insert('comments', $_POST);
		redirect('guestbook/index');
	}
}