<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model{
	public function __construct(){
		$this->load->database();
		$this->load->helper('url');
	}
	private function exists($columnName,$data){
		$this->db->where($columnName,$data);
		$query=$this->db->get('users');
		return $query->num_rows()>0;
	}
	public function login(){
		$data['email']=$this->input->post('email');
		$data['password']=md5($this->input->post('password'));
		$this->db->where('email_id',$data['email']);
		$this->db->where('password',$data['password']);
		$query=$this->db->get('users');
		return $query->row();
	}
	public function register(){
		$inputName=$this->input->post('name');
		list($first,$last)=explode(" ",$inputName);
		$data['first_name']=ucfirst($first);
		$data['last_name']=ucfirst($last);
		$data['email_id']=$this->input->post('email');
		$data['password']=md5($this->input->post('password'));
		$data['mobile_no']=$this->input->post('mobile');
		if($this->exists('email_id',$data['email_id'])){
			return "Email Id already registered";
		}
		elseif($this->exists('mobile_no',$data['mobile_no'])){
			return "Mobile number already registered";
		}else{
			$this->db->insert('users',$data);
			$this->db->where('email_id',$data['email_id']);
			$query=$this->db->get('users');
			return $query->row();
		}

	}
}
