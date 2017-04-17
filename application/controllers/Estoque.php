<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Estoque extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->load->model('produtos_model');
		
	}

	public function index()
	{
		$data['estoque'] = $this->produtos_model->getProdutosAtivo();
		$this->load->view('estoque', $data);
	}


}