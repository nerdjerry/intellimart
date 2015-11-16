<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	public function getCategory(){
		$this->db->select('name');
		$query=$this->db->get('categories');
		return $query->result();
	}
	public function getBrand(){
		$this->db->select('name');
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
	public function getProductsByCategory($category){
		$this->db->where('P_Cat',$category);
		$query=$this->db->get('products');
		return $query->result();
	}
}
