<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	private function exists($columnName,$data){
		$this->db->where($columnName,$data);
		$query=$this->db->get('users');
		return $query->num_rows()>0;
	}
	public function register(){
		$this->load->helper('url');
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
			return $this->db->insert('users',$data);
		}

	}
}
