<?php
/**
* 
*/
class Log_model extends CI_Model
{
	
	function getuser()
	{
          $data['vchr_email']=$this->input->post('unm');
          $data['vchr_password']=$this->input->post('pass');

		$this->db->select('*');
		$this->db->from('tbl_login');
		$where=$this->db->where($data);
		$query=$this->db->get();
		if($query->result()==NULL){
			echo "invalid username and password";
		}else{

		foreach ($query->result() as $row) {

			$role=$row->fk_int_user_role_id;
			if($role==2){
				$this->load->view('index');
			}else{
				//$this->load->view('header');
				$this->load->view('admin');
				//$this->load->view('footer');
				// $this->load->view('middle');
				
				
			}
		}
		}
	}
}
?>