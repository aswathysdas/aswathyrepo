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
		$ses=$this->session->userdata();
		if(isset($ses['id'])){
			$this->load->view('category');
		}else{
			$this->load->view('index');
		}
		
		//$this->load->view('footer');
	}
	public function addcat(){
		$this->load->model('Category_model');
		$this->Category_model->addcategory();
		echo "successfully added";
	}
	public function subcat(){
		$ses=$this->session->userdata();

		if(isset($ses['id'])){

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
	else
	{
	 $this->load->view('index');	
	}
	}
	public function addproduct(){

		$ses=$this->session->userdata();
		if(isset($ses['id'])){
	
		if(isset($_POST['addsub'])){

			$config['upload_path']="./uploads/";
			$config['allowed_types']="gif|jpg|jpeg|png";
			$config['max_size']="";
			$config['max_width']="";
			$config['max_height']="";

			$this->load->library('upload',$config);

			if($this->upload->do_upload())
			{
				$data = array('upload_data' =>$this->upload->data());
			}
			else
			{
				$error = array('error' =>$this->upload->display_errors());
				$this->load->view('products',$error);
			}

			$this->load->model('Category_model');
		    $this->Category_model->insertproduct($data);
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
else{
	$this->load->view('index');	
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
		$ses=$this->session->userdata();
		if(isset($ses['id']))
		{
		$this->load->model('Category_model');
		$data['category']=$this->Category_model->selectcat();
		//$data['subcategory']=$this->Category_model->viewsubcategory();
		$this->load->view('viewsubcat',$data);
	}
	else{
		$this->load->view('index');	
	}
	}
	public function subonchng(){
		$this->load->model('Category_model');
		$data['subcategory']=$this->Category_model->viewsubcategory($_POST);
		$this->load->view('onchangeviewsub',$data);
	}
	public function editcat(){
		$ses=$this->session->userdata();
		if(isset($ses['id']))
		{

		$this->load->model('Category_model');
		$data['category']=$this->Category_model->selectcat();
		//$this->load->view('header');
		$this->load->view('editcategory',$data);

		//$this->load->view('footer');
	}
	else{
		$this->load->view('index');	
	}
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
		$ses=$this->session->userdata();
		if(isset($ses['id'])){
		$this->load->model('Category_model');
		$data['category']=$this->Category_model->selectcat();
		$this->load->view('viewproduct',$data);
	}
	else
	{
		$this->load->view('index');	
	}
	}
	public function viewpc(){
		$this->load->model('Category_model');
		$data['product']=$this->Category_model->viewproductonchng($_POST);
		$this->load->view('prod',$data);
	}
	public function vieweditsub(){
		$ses=$this->session->userdata();
		if(isset($ses['id']))
		{
		$this->load->model('Category_model');
		$data['category']=$this->Category_model->selectcat();
		$this->load->view('editsub',$data);
	    }else
	    {
	    	$this->load->view('index');	
	    }
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
	public function delsubc(){
		$this->load->model('Category_model');
		$this->Category_model->delselectedsub($_POST);
	}
	public function vieweditproduct(){
		$ses=$this->session->userdata();
		if(isset($ses['id'])){
		$this->load->model('Category_model');
		$data['category']=$this->Category_model->selectcat();
		$this->load->view('editproduct',$data);
		}else
		{
			$this->load->view('index');	
		}
		
	}
	public function encodeproductedit(){
		$this->load->model('Category_model');
		$data['editproduct']=$this->Category_model->editproductselect($_POST);
		$this->load->view('encodeeditingproduct',$data);
	}
	public function updateproducts(){
		$this->load->model('Category_model');
		$this->Category_model->updateproductonediting();
		echo "successfully updated";
	}
	public function deletingproduct(){
		$this->load->model('Category_model');
		$this->Category_model->deleteselectproduct($_POST);
	}
	public function viewcust(){
		$ses=$this->session->userdata();

		if(isset($ses['id'])){

		$this->load->model('Category_model');
		$data['customer']=$this->Category_model->selectcustomer();
		$this->load->view('viewcustomer',$data);
		}
		else{
			$this->load->view('index');	
		}
	}
	public function suspendcust(){
		$ses=$this->session->userdata();
		if(isset($ses['id'])){
		$this->load->model('Category_model');
		$data['cust']=$this->Category_model->slctcustomer();
		$this->load->view('suspend',$data);
		}
		else{
			$this->load->view('index');	
		}
		
	}
	public function custsuspension(){
		$this->load->model('Category_model');
		$this->Category_model->updatestatus();
	}

	public function proooducts(){
		$this->load->model('Category_model');
		$data['proddes']=$this->Category_model->showpurchprod($_POST);
		$this->load->view('proddetailencode',$data);
	}

	
}
