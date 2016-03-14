<?php
/**
* 
*/
class Welcome_model extends CI_Model
{
	public function __construct()
	{	parent:: __construct();
	    $this->load->library('session');
	}

	// function viewsscategories(){
	// 	$this->db->select('*');
	// 	$this->db->from('tbl_category');
	// 	$query=$this->db->get();
	// 	return $query->result();
	// }
}
?>