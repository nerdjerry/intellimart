<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller{

	private function create_session($user){
		$sessionData=array(
			'id' => $user->user_id,
			'name'=> $user->first_name,
			'access' => $user->access,
			'logged' => TRUE
		);
		$this->session->set_userdata($sessionData);
	}

	public function signin(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required');
		if($this->form_validation->run()===FALSE){
			$errorMessage = "Incorrect details";
			$message="Please enter all the login details";
			show_error($message,0,$errorMessage);
		}else{
			$this->load->model('user');
			$user=$this->user->login();
			if($user!=NULL){
				$this->create_session($user);
				redirect('home');
			}else{
				$errorMessage="Incorrect details";
				$message="Please correct detials,or your email is not registered";
				show_error($message,0,$errorMessage);
			}
		}
	}

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
			$data=$this->user->register();
			if(!is_string($data)){
				$user=$data;//Since data is not a string,it contains user details.
				$this->create_session($user);
				redirect('home');
			}
			else{//As data is a string that means it doesnot contain data but contains error message
				$message = "Please refill for with apt details";
				$errorMessage = $data;
				show_error($message,0,$errorMessage);
			}
		}
	}
}
