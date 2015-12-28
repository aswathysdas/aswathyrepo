<?php
/**
* 
*/
class Category_model extends CI_Model
{
	
	function addcategory(){
		$data = array (
			'categry_nm'=>$this->input->post('ctgry')
          );
		$this->db->query("call csp_category(?)",$data);
	}
	function selectcat(){
		$this->db->select('*');
		$this->db->from('tbl_category');
		$query=$this->db->get();
		return $query->result();
	}
	function insertsub(){
		$data = array(
			           'vchr_sub_name' =>$this->input->post('subcat') ,
			           'fk_int_cat_id' =>$this->input->post('sub')
		               );
		$this->db->query("call csp_insert_sub_category(?,?)",$data);
	}
	function insertpro($id){
		// $data= array('fk_int_category_id' =>$this->input->post('sub')
		//  );
		// $query=$this->db->query("call csp_slct(?)",$data);
		// return $query->result();
	
			$this->db->select('*');
		$this->db->from('tbl_sub_category');
		$query=$this->db->get();
		return $query->result();
	
	}
}



?>