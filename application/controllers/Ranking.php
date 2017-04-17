<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ranking extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->load->model('ranking_model');
		
	}

	public function index()
	{
		$data['ranking'] = $this->ranking_model->getRanking();
		$this->load->view('ranking', $data);
	}


}