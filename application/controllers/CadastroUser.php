<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CadastroUser extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->load->model('cadastro_model');
		$this->load->model('produtos_model');
		

	}

	public function index()
	{	
		$data['users'] = $this->cadastro_model->getUsers($_SESSION['admin']['coduser']);
		$data['prod'] = $this->produtos_model->getProdutos();

		$this->load->view('cadastro', $data);
	}

	public function insertUser()
	{

		$name 		=		trim(ucwords($this->input->post('nome')));
		$email 		=		trim($this->input->post('email'));
		$tel 		=		$this->input->post('telefone');
		$cod_user	=		$this->input->post('tp_user');
		$login 		=		trim(strtolower($this->input->post('login')));
		$pass 		=		trim(md5(md5(md5($this->input->post('pass')))));

		$insert_user = $this->cadastro_model->insertUser($name, $email, $tel, $cod_user, 
			$login, $pass);
		
		if($insert_user)
		{
			echo "Usuário cadastrado com Sucesso!";
		}
		else
		{
			echo "Erro! tente outro login";	
		}

	} 

	// retorna todos vendedores cadastrados
	public function getVendedores()
	{
		return $this->cadastro_model->getVendedores();

	}

	// ativa usuario
	public function ativaUser()
	{

		$id = $this->input->post('id');

		$usuario = $this->cadastro_model->ativaUser($id);

		if($usuario)
		{
			echo "Usuário ativado!";
		}
	}

	// desativa usuario
	function desativaUser()
	{
		$id = $this->input->post('id');		

		$usuario = $this->cadastro_model->desativaUser($id);

		if($usuario)
		{
			echo "Usuário desativado!";
		}
	}

}