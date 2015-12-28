<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_ctrl extends CI_Controller {

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
		//$this->load->view('header');
		$this->load->view('category');
		//$this->load->view('footer');
	}
	public function addcat(){
		$this->load->model('Category_model');
		$this->Category_model->addcategory();
		echo "successfully added";
	}
	public function subcat(){
		if(isset($_POST['addsub'])){
			$this->load->model('Category_model');
			$this->Category_model->insertsub();
			echo "successfully added";
		}
		else
		{
		$this->load->model('Category_model');
		$data['category']=$this->Category_model->selectcat();
		//$this->load->view('header');
		$this->load->view('subcategory',$data);
		//$this->load->view('header');
		}
	}
	public function addproduct(){
		$id=$this->input->post('sub');
		$this->load->model('Category_model');
		$data['category']=$this->Category_model->selectcat();
		$data['subcategory']=$this->Category_model->insertpro();
		//$this->load->view('header');
		$this->load->view('products',$data);
		//$this->load->view('header');


	}
	
}
