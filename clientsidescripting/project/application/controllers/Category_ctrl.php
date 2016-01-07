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
		if(isset($_POST['addsub'])){
			$this->load->model('Category_model');
		    $this->Category_model->insertproduct();
		    echo "successfully inserted";
		}
		else{
		$id=$this->input->post('sub');
		$this->load->model('Category_model');
		$data['category']=$this->Category_model->selectcat();
		//$this->load->view('header');
		$this->load->view('products',$data);
		//$this->load->view('header');
	}
	}
	public function viewsubcat(){
		$this->load->model('Category_model');
		$data['subcategory']=$this->Category_model->subshw($_POST);
		$this->load->view('dataencode',$data);
	}
	public function viewc(){
		$this->load->model('Category_model');
		$data['category']=$this->Category_model->selectcat();
		$this->load->view('viewcat',$data);
	}
	public function viewsub(){
		$this->load->model('Category_model');
		$data['category']=$this->Category_model->selectcat();
		//$data['subcategory']=$this->Category_model->viewsubcategory();
		$this->load->view('viewsubcat',$data);
	}
	public function subonchng(){
		$this->load->model('Category_model');
		$data['subcategory']=$this->Category_model->viewsubcategory($_POST);
		$this->load->view('onchangeviewsub',$data);
	}
	public function editcat(){
		$this->load->model('Category_model');
		$data['category']=$this->Category_model->selectcat();
		//$this->load->view('header');
		$this->load->view('editcategory',$data);

		//$this->load->view('footer');
	}
	public function delcat(){
		$this->load->model('Category_model');
		$this->Category_model->delselectedcat($_POST);
	}
	public function showcat(){
		$this->load->model('Category_model');
		$data['cate']=$this->Category_model->viewcat($_POST);
		//$this->load->view('header');
		$this->load->view('catencode',$data);
	}
	public function updatecat(){
		
		$this->load->model('Category_model');
		$this->Category_model->updtcat($_POST);
	}
	public function viewprdct(){
		$this->load->model('Category_model');
		$data['category']=$this->Category_model->selectcat();
		$this->load->view('viewproduct',$data);
	}
	public function viewpc(){
		$this->load->model('Category_model');
		$data['product']=$this->Category_model->viewproductonchng($_POST);
		$this->load->view('prod',$data);
	}
	public function vieweditsub(){
		$this->load->model('Category_model');
		$data['category']=$this->Category_model->selectcat();
		$this->load->view('editsub',$data);
	}
	public function getsubshow(){
		$this->load->model('Category_model');
		$data['subcaw']=$this->Category_model->getsubcat($_POST);
		$this->load->view('editsubencode',$data);
	}
	public function updatesubca(){
		$this->load->model('Category_model');
		$this->Category_model->editsubcategory();
	}

}
