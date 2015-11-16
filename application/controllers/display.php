<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Display extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('product');
	}

	public function category($category){
		$data['products']=$this->product->getProductsByCategory($category);
		$data['categories']=$this->product->getCategory();
		$data['brands']=$this->product->getBrand();
		$data['itemsClass']=$this->product->getCategoryName($category);
		$this->load->view('templates/header.php',$data);
		$this->load->view('shop.php',$data);
	}
}
