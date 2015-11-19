<?php defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('shopping');
		$this->load->model('product');
		$this->load->helper('cookie');
	}

	private function getData(&$data){
		$data['categories']=$this->product->getCategory();
		$data['brands']=$this->product->getBrand();
	}

	public function addToCart($product){
		$data['Session_Id']=session_id();
		$data['User_Id']=null;
		$data['P_Id']=$product;
		if(null!==$this->input->post('quantity')){
			$quantity = $this->input->post('quantity');
		}else{
			$quantity = 1;
		}
		if(isset($_SESSION['logged']))
		   $data['User_Id']=$_SESSION['id'];
		$data['Quantity']=$quantity;
		$productPrice=$this->product->getProductPrice($product);
		$data['Amount'] = $quantity*$productPrice;
		$this->shopping->addItem($data);
		set_cookie("userId",$data['Session_Id'],60*60*24*3);
		redirect('cart/showCart');
	}

	public function showCart(){
		if(isset($_SESSION['logged'])){
			$userId = $_SESSION['id'];
		}else{
			$userId = get_cookie("userId");
		}
		$data['cart'] = $this->shopping->getCart($userId);
		foreach($data['cart'] as $cartItem){
			$productId=$cartItem->P_Id;
			$data['products'][$productId]=$this->product->getProduct($cartItem->P_Id);
		}
		$this->getData($data);
		$this->load->view('templates/header.php',$data);
		$this->load->view('cart.php',$data);
	}
}
