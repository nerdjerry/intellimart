<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller{
	public function index(){
		$this->load->view('index.php');
	}
	public function login(){
		$this->load->helper('form');
		$this->load->view('login.php');
	}
	public function logout(){
		$array=array('id','name','access','logged');
		$this->session->unset_userdata($array);
		$this->session->sess_destroy();
		redirect();//Go to homepage
	}
}
