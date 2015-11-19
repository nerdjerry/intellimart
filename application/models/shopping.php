<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shopping extends CI_Model{

	public function addItem($data){
		$this->db->insert('cart',$data);
	}
}
