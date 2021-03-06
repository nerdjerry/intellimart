<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	private function getData(&$data){
		$this->load->model('product');
		$data['categories']=$this->product->getCategory();
		$data['brands']=$this->product->getBrand();
	}
	public function index(){
		$this->getData($data);
		$data['products']=$this->product->getSomeProducts();
		foreach($data['categories'] as $category){
			$categoryName = $category->name;
			$products = $this->product->getProductsByCategory($category->id,4);
			$productsByCategory[$categoryName] = $products;
		}
		$data['productsByCategory']= $productsByCategory;
		$this->load->view('templates/header.php',$data);
		$this->load->view('index.php',$data);
		$this->load->view('templates/footer.php',$data);
	}
	public function login(){
		$this->load->helper('form');
		$this->getData($data);
		$this->load->view('templates/header.php',$data);
		$this->load->view('login.php');
		$this->load->view('templates/footer.php',$data);
	}
	public function logout(){
		$array=array('id','name','access','logged');
		$this->session->unset_userdata($array);
		$this->session->sess_destroy();
		redirect();//Go to homepage
	}
}
