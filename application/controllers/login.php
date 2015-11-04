<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller{

	public function register(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required');
		if($this->form_validation->run() === FALSE){
			$errorMessage="Missing fields";
			$message="Please enter all the fields";
			show_error($message,0,$errorMessage);
		}
		else{
			$this->load->model('user');
			if($errorMessage=$this->user->register()==1){
							//TODO:create session and login user.
			}
			elseif($errorMessage=$this->user->register()){
				$message = "Please refill for with apt details";
				show_error($message,0,$errorMessage);
			}
		}
	}
}
