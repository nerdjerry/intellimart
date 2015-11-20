<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	public function getCategory(){
		$query=$this->db->get('categories');
		return $query->result();
	}
	public function getBrand(){
		$this->db->order_by('name','ASC');
		$query=$this->db->get('brands');
		return $query->result();
	}
	public function getCategoryName($category){
		$this->db->select('name');
		$this->db->where('id',$category);
		$query=$this->db->get('categories');
		$result=$query->row();
		return $result->name;
	}
	public function getBrandName($brand){
		$this->db->select('name');
		$this->db->where('id',$brand);
		$query=$this->db->get('brands');
		$result=$query->row();
		return $result->name;
	}
	public function getProductsByCategory($category,$limit=NULL){
		if($limit!=NULL){
			$this->db->limit($limit);
		}
		$this->db->where('P_Cat',$category);
		$query=$this->db->get('products');
		return $query->result();
	}
	public function getProductsByBrand($brand){
		$this->db->where('P_Brand',$brand);
		$query=$this->db->get('products');
		return $query->result();
	}

	public function getProduct($product){
		$this->db->where('P_Id',$product);
		$query=$this->db->get('products');
		return $query->row();
	}

	public function isStock($product){
		$this->db->select('P_Stock');
		$this->db->where('P_Id',$product);
		$query=$this->db->get('products');
		$result=$query->row();
		return $result->P_Stock;
	}

	public function getProductPrice($product){
		$this->db->select('P_Price');
		$this->db->where('P_Id',$product);
		$query = $this->db->get('products');
		$result = $query->row();
		return $result->P_Price;
	}
	public function getSomeProducts(){
		$this->db->limit(6);
		$query=$this->db->get('products');
		return $query->result();
	}

	public function getSearchedProduct($search){
		$this->db->or_like('P_Name',$search);
		$this->db->or_like('P_Brand',$search);
		$this->db->or_like('P_Cat',$search);
		$query = $this->db->get('products');
		return $query->result();
	}
}
