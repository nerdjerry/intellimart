<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	public function register(){
		$this->load->helper('url');
		$inputName=$this->input->post('name');
		list($first,$last)=explode(" ",$inputName);
		$data['first_name']=ucfirst($first);
		$data['last_name']=ucfirst($last);
		$data['email_id']=$this->input->post('email');
		$data['mobile_no']=$this->input->post('mobile');
		if(($this->db->where('email_id',$data['email_id']))->num_rows>0){
			return "Email Id already registered";
		}
		elseif(($this->db->where('mobile_no',$data['mobile_no']))->num_rows>0){
			return "Mobile number already registered";
		}
		$data['password']=md5($this->input->post('password'));
		return $this->db->insert('users',$data);
	}
}
