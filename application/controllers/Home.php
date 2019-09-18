<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('query');
		$this->load->helper('url');
		$this->load->view('layout/header');
		$this->load->view('layout/sidenav');
	}

	public function index() {
		$this->load->view('/pages/index.php');
	}

	public function import() {
		$this->load->view('/pages/import.php');
	}

	public function dashboard()	{
		$this->load->view('/pages/data.php');
		# code...
	}
}