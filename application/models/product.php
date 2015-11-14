<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	public function getCategory(){
		$this->db->select('P_Cat');
		$this->db->distinct();
		$query=$this->db->get('products');
		return $query->result();
	}
	public function getBrand(){
		$this->db->select('P_Brand');
		$this->db->distinct();
		$query=$this->db->get('products');
		return $query->result();
	}
}
