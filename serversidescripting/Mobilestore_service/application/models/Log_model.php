<?php
/**
* 
*/
class Log_model extends CI_Model
{
	public function __construct()
	{	parent:: __construct();
	    $this->load->library('session');
	}

	function getuser()
	{
          $data['vchr_email']=$this->input->post('unm');
          $data['vchr_password']=$this->input->post('pass');

		$this->db->select('*');
		$this->db->from('tbl_login');
		$where=$this->db->where($data);
		$query=$this->db->get();
		//$cus['ll']=$query->result();
		//print_r($cus);
		foreach ($query->result() as $row) {

			$role=$row->fk_int_user_role_id;
			$id=$row->pk_int_login_id;
			$sess['id']=$id;
			$sess['name']=$row->vchr_email;
			$this->session->set_userdata($sess);

		}
		if($query->result()==NULL){
			echo "invalid username and password";
		}
		else if($query!==""&&$role==1){
                $this->load->view('admin');
		}
		else if($query!==""&&$role==2){
			

		$dat['fk_int_login_id']=$row->pk_int_login_id;
		$this->db->select('*');
		$this->db->from('tbl_registration');
		$where=$this->db->where($dat);
		$query1=$this->db->get();

		foreach ($query1->result() as $row1) {
			$stat=$row1->vchr_status;
		}

		if($stat=='Inactive'){
		echo "blocked";
		}
		elseif ($role==2&&$stat=='active') {
			
			$this->load->view('customerpg');
		}
		}
		
		
	}


	function getcategory(){
		$this->db->select('*');
		$this->db->from('tbl_category');
		$query=$this->db->get();
		return $query->result();
	}

	function modelsubcats(){
		$data['fk_int_category_id']=$this->input->post('name');

		$this->db->select('*');
		$this->db->from('tbl_sub_category');
		$where=$this->db->where($data);
		$query=$this->db->get();
		return $query->result();
	}

	function prodsscmodel(){
		$data['fk_int_sub_id']=$this->input->post('name');

		$this->db->select('*');
		$this->db->from('tbl_product');
		$this->db->join('tbl_stock','pk_int_prdct_id=fk_int_prdct_id');
		$where=$this->db->where($data);
		$query=$this->db->get();
		return $query->result();
	}

	function purchproduct(){
		 $ii=$this->session->userdata();
		$data = array(
			           'fk_int_prdct_id' =>$this->input->post('name') ,
			           'int_quantity' =>$this->input->post('nm'),
			           'int_total_amount' =>$this->input->post('pric'),
			           'fk_int_reg_id'=>$ii['id']
		               );
         $this->db->query("call csp_insert_purchase(?,?,?,?)",$data);
        
			//echo $ii['id'];
   //       $idd = $this->session->userdata();
		 // echo $idd['id'];
	}

	function showallprod(){
		$this->db->select('*');
		$this->db->from('tbl_product');
		$query=$this->db->get();
		return $query->result();
	}

	function prodsdetails(){
		$data['pk_int_prdct_id']=$this->input->post('name');

		$this->db->select('*');
		$this->db->from('tbl_product');
		$this->db->join('tbl_stock','pk_int_prdct_id=fk_int_prdct_id');
		$where=$this->db->where($data);
		$query=$this->db->get();
		return $query->result();
	}
}
?>