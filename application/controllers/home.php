<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller{
	public function index(){
		$this->load->view('index.php');
	}
	public function login(){
		$this->load->view('login.php');
	}
}
