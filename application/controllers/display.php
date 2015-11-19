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

	public function brand($brand){
		$data['products']=$this->product->getProductsByBrand($brand);
		$data['categories']=$this->product->getCategory();
		$data['brands']=$this->product->getBrand();
		$data['itemsClass']=$this->product->getBrandName($brand);
		$this->load->view('templates/header.php',$data);
		$this->load->view('shop.php',$data);
	}

	public function product($productid){
		$product=$this->product->getProduct($productid);
		$data['product']=$product;
		$data['categories']=$this->product->getCategory();
		$data['brands']=$this->product->getBrand();
		if($this->product->isStock($productid)){
			$data['isStock']='In Stock';
		}else{
			$data['isStock']="Out of Stock";
		}
		$data['productCategory']=$this->product->getCategoryName($product->P_Cat);
		if($product->P_Brand!=null)
			$data['productBrand']=$this->product->getBrandName($product->P_Brand);
		$this->load->helper('form');
		$this->load->view('templates/header.php',$data);
		$this->load->view('product_details.php',$data);
	}
}
