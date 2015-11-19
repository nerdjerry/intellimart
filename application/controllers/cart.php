<?php defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('shopping');
		$this->load->helper('cookie');
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
		$this->load->model('product');
		$productPrice=$this->product->getProductPrice($product);
		$data['Amount'] = $quantity*$productPrice;
		$this->shopping->addItem($data);
		set_cookie("userId",$data['Session_Id'],60*60*24*3);
		$this->showCart();
	}

	public function showCart(){

	}
}
