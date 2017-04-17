<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->load->model('produtos_model');
		
		
	}

	public function cadastraProduto(){

		$produto = trim(ucwords($this->input->post('produto')));
		$preco = str_replace('.', '', $this->input->post('preco_prod'));
		$preco = str_replace(',','.', $preco);
		$qtde = $this->input->post('qtde_prod');

		$prod = $this->produtos_model->cadastraProduto($produto, $preco, $qtde);

		if($prod)
		{
			echo "Produto cadastrado com sucesso!";
		}
		else
		{
			echo "Falha ao tentar cadastrar produto.";
		}
	}

	public function getProduto()
	{
		$id = $this->input->post('id');
		$prod = $this->produtos_model->getProduto($id);
		$preco = number_format($prod->preco_produto, 2,',','.');

		$produto = array(
			'id'   => $prod->id_produto,
			'name' => $prod->name_produto,
			'preco' => $preco,
			'qtde' => $prod->qtde
			);

		echo json_encode($produto);
	}

	public function editProduto()
	{
		$id = $this->input->post('hidden_id_prod');
		$name = $this->input->post('nome_prod');
		$preco = str_replace('.', '', $this->input->post('edit_preco_prod'));
		$preco = str_replace(',','.', $preco);
		$qtde = $this->input->post('edit_qtde_prod');

		$this->produtos_model->editProduto($id, $name, $preco, $qtde);
	}

	// ativa produto no sistema
	public function ativarProduto()
	{

		$id = $this->input->post('id');
		$this->produtos_model->ativarProduto($id);

	}

	// desativa produto no sistema
	public function desativarProduto()
	{

		$id = $this->input->post('id');
		$this->produtos_model->desativarProduto($id);

	}

}