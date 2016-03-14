<?php
/**
* 
*/
class Reg_model extends CI_Model
{
	
	function insrt(){
		$data = array (
			'email'=>$this->input->post('email'),
			'pasword'=>$this->input->post('pswd'),
			'fnm'=>$this->input->post('fname'),
			'lnm'=>$this->input->post('lname'),
			'addrs'=>$this->input->post('addrs'),
			'pincode'=>$this->input->post('pincd'),
			'mbnum'=>$this->input->post('mbnum')
          );
		$this->db->query("call csp_reg_log(?,?,?,?,?,?,?)",$data);
	}
}



?>