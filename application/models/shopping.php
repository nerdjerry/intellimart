<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shopping extends CI_Model{

	private function checkItem($data){
		$this->db->where('Session_Id',$data['Session_Id']);
		$this->db->where('User_Id',$data['User_Id']);
		$this->db->where('P_Id',$data['P_Id']);
		$query = $this->db->get('cart');
		return $query->num_rows()>0;
	}
	public function addItem($data){
		if($this->checkItem($data)){
			if(isset($_SESSION['logged']))
				$this->db->where('User_Id',$data['User_Id']);
			else
				$this->db->where('Session_Id',$data['Session_Id']);
			$data['Quantity']+=1;
			$data['Amount']=$data['Quantity']*$data['Amount'];
			$this->db->set('Quantity',$data['Quantity']);
			$this->db->set('Amount',$data['Amount']);
			$this->db->where('P_Id',$data['P_Id']);
			if(isset($_SESSION['logged']))
				$this->db->where('User_Id',$data['User_Id']);
			else
				$this->db->where('Session_Id',$data['Session_Id']);
			$this->db->update('cart');
		}else{
			$this->db->insert('cart',$data);
		}
	}

	public function getCart($userId){
		$this->db->select('P_Id,Quantity,Amount');
		if(isset($_SESSION['logged']))
			$this->db->where('User_Id',$userId);
		else
			$this->db->where('Session_Id',$userId);
		$query = $this->db->get('cart');
		return $query->result();
	}
}
