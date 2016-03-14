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
	function insertproduct($imgs){
		$data=array(
			'prdctnm'=>$this->input->post('productnm'),
			'price'=>$this->input->post('price'),
			'descrptn'=>$this->input->post('desc'),
			'quantity'=>$this->input->post('qty'),
			'fk_sub_id'=>$this->input->post('subcat'),
               'selprice'=>$this->input->post('sellprice'),
               'prdctimg'=>$imgs['upload_data']['file_name'],
               'sideview'=>"img.jpg"
			);
		$this->db->query("call csp_product(?,?,?,?,?,?,?,?)",$data);
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
     function delselectedsub(){
     	$data['id']=$this->input->post('name');
     	$this->db->query("call csp_del_subcat(?)",$data);
     }
     function editproductselect(){
     	$data['pk_int_prdct_id']=$this->input->post('name');
     	$this->db->select('*');
     	$this->db->from('tbl_product');
          $where=$this->db->where($data);
     	$query=$this->db->get();
     	return $query->result();
     }
     function updateproductonediting(){
     	$data = array('prdct_id' =>$this->input->post('proid') ,
     	               'prdct_nm'=>$this->input->post('pronm'),
     	               'price'=>$this->input->post('prodprice'),
     	               'descrptn'=>$this->input->post('proddesc'),
     	               'qty'=>$this->input->post('prodqty')
     	               );
     	$this->db->query("call csp_prdct_updt(?,?,?,?,?)",$data);
     }
     function deleteselectproduct(){
     	$data['id']=$this->input->post('name');
     	$this->db->query("call csp_del_product(?)",$data);
     }
     function selectcustomer(){
          $data['vchr_status']='active';
          $this->db->select('*');
          $this->db->from('tbl_registration');
          $where=$this->db->where($data);
          $query=$this->db->get();
          return $query->result();
     }
     function slctcustomer(){
          $this->db->select('*');
          $this->db->from('tbl_registration');
           $query=$this->db->get();
          return $query->result();
     }
     function updatestatus(){
          $data['id']=$this->input->post('name');
          $this->db->query("call csp_susp(?)",$data);
     }
     function showpurchprod()
     {
          $data['fk_int_login_id']=$this->input->post('name');
          $this->db->select('*');
          $this->db->from('tbl_purchase');
          $this->db->join('tbl_product','fk_int_product_id=pk_int_prdct_id');
          $where=$this->db->where($data);
          $query=$this->db->get();
          return $query->result();
     }
}


?>