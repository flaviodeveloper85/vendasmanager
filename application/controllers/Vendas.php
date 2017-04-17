<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Vendas extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->load->model('vendas_model');
		
	}

	public function index()
	{
		
		$data['prod_disponivel'] = $this->vendas_model->getProdutosDisponivel();
		$data['vendas'] = $this->vendas_model->getSell();

		$this->load->view('vendas', $data);
	}

	public function novaVenda()
	{
		
		$nome_cliente  = $this->input->post('nome_cliente');
		$email_cliente = $this->input->post('email_cliente');
		$tel_cliente   = $this->input->post('tel_cliente');
		$prod_venda	   = $this->input->post('prod_venda');
		$status_venda  = $this->input->post('status_venda');
		$preco_venda   = str_replace('.', '', $this->input->post('preco_venda'));
		$preco_venda   = str_replace(',', '.', $preco_venda);
		$obs_venda     = $this->input->post('obs_venda');
		$user_venda	   = $this->input->post('user_venda');

		$confirm = $this->vendas_model->novaVenda($prod_venda, $preco_venda, $nome_cliente, $email_cliente, $tel_cliente, $user_venda, $status_venda, $obs_venda);

		if(!$confirm){ echo 'Não foi possivel registrar.'; }
	}

	public function updateStatusVenda()
	{
		$id_venda 	 = $this->input->post('idsell');
		$novo_status = $this->input->post('novostatus');
		$id_produto  = $this->input->post('idproduto');

		$update = $this->vendas_model->updateStatusVenda($id_venda, $novo_status, $id_produto);
		if(!$update)
		{
			echo "Error!";

		}
		
	}

	public function updateObs()
	{
		$update_obs = $this->input->post('updateobs');
		$idsell = $this->input->post('idsell');

		$obs = $this->vendas_model->updateObservacao($idsell, $update_obs);
		
		if($obs)
		{
			echo "Atualizado com Sucesso!";
		}
	}

	public function lastSell()
	{
		$result =$this->vendas_model->check_vendas();
		if($result == null)
		{
			echo "0";
		}
		else{
			echo $result;	
		}
		
	}

	function updateStatusOld()
	{
		$novoStatus = $this->input->post('novo_status');
		$idSell = $this->input->post('id_sell');
		$result = $this->vendas_model->updateStatusOld($idSell, $novoStatus);
		
		if(!$result) echo false;
	}

	function excluirSell()
	{
		$id_sell 	= $this->input->post('idSell');
		$id_produto = $this->input->post('idProduto');

		$result = $this->vendas_model->excluirSell($id_sell, $id_produto);

		if(!$result)
		{
			echo false;
			exit;
		}

		echo true;
	}


}