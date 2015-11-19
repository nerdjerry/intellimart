<?php defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('shopping');
		$this->load->model('product');
		$this->load->helper('cookie');
	}

	private function getHeaderData(&$data){
		$data['categories']=$this->product->getCategory();
		$data['brands']=$this->product->getBrand();
	}
	private function getCartDetails($userId,&$data){
		$data['cart'] = $this->shopping->getCart($userId);
		foreach($data['cart'] as $cartItem){
			$productId=$cartItem->P_Id;
			$data['products'][$productId]=$this->product->getProduct($cartItem->P_Id);
		}
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
		$this->getCartDetails($userId,$data);
		$this->getHeaderData($data);
		$this->load->view('templates/header.php',$data);
		$this->load->view('cart.php',$data);
	}

	public function checkout(){
		if(isset($_SESSION['logged'])){
			$this->load->model('user');
			$userId = $_SESSION['id'];
			$data['user']=$this->user->getUser($userId);
		}else
			$userId = get_cookie("userId");
		$this->getCartDetails($userId,$data);
		$this->getHeaderData($data);
		$this->load->view('templates/header.php',$data);
		$this->load->view('checkout.php',$data);
	}
}
