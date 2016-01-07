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
	function subshw(){
		// $data= array('fk_int_category_id' =>$this->input->post('sub')
		//  );
		// $query=$this->db->query("call csp_slct(?)",$data);
		// return $query->result();
	     $data['fk_int_category_id']=$this->input->post('name');
		$this->db->select('*');
		$this->db->from('tbl_sub_category');
		$where=$this->db->where($data);
		$query=$this->db->get();
		return $query->result();
	
	}
	function insertproduct(){
		$data=array(
			'prdctnm'=>$this->input->post('productnm'),
			'price'=>$this->input->post('price'),
			'descrptn'=>$this->input->post('desc'),
			'quantity'=>$this->input->post('qty'),
			'fk_sub_id'=>$this->input->post('subcat')
			);
		$this->db->query("call csp_product(?,?,?,?,?)",$data);
	}
	function viewsubcat(){
		$data['id']=$this->input->post('cat');
		$this->db->query("call csp_slct_sub_cat(?)",$data);
	}
	function viewcat(){
		$data['pk_int_category_id']=$this->input->post('name');
     	$this->db->select('*');
     	$this->db->from('tbl_category');
     	$where=$this->db->where($data);
     	$query=$this->db->get();
		return $query->result();
     }
     function updtcat(){

     	
     	$data['ctgry_id']=$this->input->post('catid');
     	$data['ctgry_nm']=$this->input->post('ctgry');
     	$this->db->query("call csp_updt_categry(?,?)",$data);
     }
     function delselectedcat(){
     	$data['id']=$this->input->post('name');
     	$this->db->query("call csp_del_cat(?)",$data);
     }
     function viewsubcategory(){
     	$data['fk_int_category_id']=$this->input->post('name');
     	$this->db->select('*');
     	$this->db->from('tbl_sub_category');
     	$where=$this->db->where($data);
     	$query=$this->db->get();
     	return $query->result();
     }
     function viewproductonchng(){
     	$data['fk_int_sub_id']=$this->input->post('name');
     	$this->db->select('*');
     	$this->db->from('tbl_product');
     	$where=$this->db->where($data);
     	$query=$this->db->get();
     	return $query->result();
     }
     function getsubcat(){
     	$data['pk_int_sub_id']=$this->input->post('name');
     	$this->db->select('*');
     	$this->db->from('tbl_sub_category');
     	$where=$this->db->where($data);
     	$query=$this->db->get();
     	return $query->result();
     }
     function editsubcategory(){
     	$data['sub_id']=$this->input->post('subcatid');
     	$data['ctgry_nm']=$this->input->post('subctgry');
     	$this->db->query("call csp_sub_categry(?,?)",$data);
     }

}


?>