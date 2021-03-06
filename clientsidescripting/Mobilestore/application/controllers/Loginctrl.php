<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginctrl extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login');
	}
	public function match(){
		$this->load->model('Log_model');
		$this->Log_model->getuser();
		
	}
	public function viewcatess(){
		$this->load->model('Log_model');
		$data['disccats']=$this->Log_model->getcategory();
		$this->load->view('dispencode',$data);
	}
	
	public function viewsubcsss(){
		$this->load->model('Log_model');
		$data['subcates']=$this->Log_model->modelsubcats($_POST);
		$this->load->view('subencode',$data);
	}

	public function productlove(){
		$this->load->model('Log_model');
		$data['imagpd']=$this->Log_model->prodsscmodel($_POST);
		$this->load->view('modprodencode',$data);
	}

	public function purchased(){
		$this->load->model('Log_model');
		$data['prodnh']=$this->Log_model->purchproduct($_POST);
		$this->load->view('modprodencode',$data);
	}

	public function logout(){
		$this->session->unset_userdata('$sess');
		session_destroy();
		redirect('loginctrl','refresh');
	}

	public function myfunc()
	{
		$this->load->view('b');
	}
	public function prodluv(){
		$this->load->model('Log_model');
		$data['prodsqw']=$this->Log_model->showallprod();
		$this->load->view('allprodencode',$data);
	}
	
	public function prodonclick(){
		$this->load->model('Log_model');
		$data['prodcy']=$this->Log_model->prodsdetails();
		$this->load->view('proencode',$data);
	}
	public function singl(){
		$dats['id']=$this->input->post('a');
		$dats['des']=$this->input->post('b');
		$dats['price']=$this->input->post('c');
		$dats['seprice']=$this->input->post('d');
		$dats['imgags']=$this->input->post('e');
		$dats['pdnames']=$this->input->post('f');
		//print_r($dats);

		$this->load->view('single',$dats);
	}
	public function acnt(){
		$this->load->view('account');
	}

}
