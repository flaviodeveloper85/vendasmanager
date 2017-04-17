<?php

date_default_timezone_set('America/Sao_Paulo');

class Vendas_model extends CI_Model{

	function __construct(){

		parent::__construct();
		
	}

	// retorna todos os produtos disponivel no estoque para popular select
	function getProdutosDisponivel()
	{
		return $this->db->query("select id_produto, name_produto from tb_produtos where qtde <> 0 and ativo = 's'")->result_array();
	}

	function novaVenda($id_prod, $preco, $nome_cliente, $email_cliente, $tel_cliente, $user, $status, $obs=null)
	{
		
		$data = array(
			'id_produto'  	=> $id_prod,	
			'preco_sell'    => $preco,
			'nome_cliente'  => $nome_cliente,
			'email_cliente' => $email_cliente,
			'tel_cliente'	=> $tel_cliente,
			'id_user'		=> $user,
			'status'		=> $status,
			'obs'			=> $obs,
			'created_sell'  => date('Y-m-d H:i')
			);

		// validador para apenas uma unica vez a qtde de produto e alterada
		$flag = true;

		if($flag)
		{
			if($status == 1 || $status == 2)
			{
				$qtde = $this->db->query("SELECT qtde from tb_produtos where id_produto ='$id_prod'")->row();

				if($qtde->qtde == 0){
					
					return false;
					exit;
				}

				$this->db->query("UPDATE tb_produtos set qtde = qtde-1 where id_produto = '$id_prod'");
				
				$flag = false;


				// faz o insert no banco
				return $this->db->insert('tb_sell', $data);


			}
			
		}
		
	}

	// retorna todos os processos de vendas negociando/vendido/cancelado
	function getSell()
	{	
		
		$date = date('m');
		return $this->db->query("SELECT t1.name_produto, t1.qtde, t2.*, t3.name from tb_produtos t1 inner join tb_sell t2 on t1.id_produto = t2.id_produto inner join tb_user t3 on t2.id_user = t3.id_user where MONTH(t2.created_sell) = '$date' order by t2.id_sell desc")->result();

	}

	function updateStatusVenda($idsell, $status, $id_produto)
	{
		$status_venda = $this->db->query("SELECT status from tb_sell where id_sell='$idsell'")->row();

		
		if($status == $status_venda->status)
		{
			return false;
			exit;
		}

		// se status for cancelado recoloca o valor no estoque
		if($status_venda->status == 1 || $status_venda->status == 2)
		{
			if($status == 3)
			{
				$this->db->query("UPDATE tb_produtos set qtde = qtde+1 where id_produto = '$id_produto'");
			}

		}elseif($status_venda->status == 3)
		{
			$qtde = $this->db->query("SELECT qtde from tb_produtos where id_produto = '$id_produto' ")->row();
			
			if($qtde->qtde == 0){
				if($status == 1 || $status == 2){
					return false;
					exit;
				}
			}
			
			if($status == 1 || $status == 2)
			{
				$this->db->query("UPDATE tb_produtos set qtde = qtde-1 where id_produto = '$id_produto'");
			}
		}


		$data = array(
			'status' => $status
			);
				$this->db->where('id_sell', $idsell);
		return $this->db->update('tb_sell', $data);
	}

	// edita observaçoes de vendas
	function updateObservacao($idsell, $obs)
	{
		$data = array(

			'obs' => $obs

			);
				$this->db->where('id_sell', $idsell);
		return $this->db->update('tb_sell', $data);
	}

	function check_vendas()
	{			
				$mes = date('m');
		return $this->db->query("SELECT * from tb_sell where status = 2 and MONTH(created_sell) = '$mes'")->num_rows();
	}

	// retorna vendas antigas com status 'negociando' 
	function oldStatus($iduser)
	{
		// pega o mes e ano atual e retira o . que separa
		$date = date('Y.m');
		$date = str_replace('.', '', $date);
		
		return $this->db->query("SELECT t1.id_sell, t1.nome_cliente, t1.created_sell, t2.name_produto,
			(SELECT count(status) from tb_sell where status = 1 and extract(year_month from created_sell) <> '$date' and id_user = '$iduser' ) as result_status
		 from tb_sell t1 inner join tb_produtos t2 
		 				on t1.id_produto = t2.id_produto 
		 				where t1.status = 1 and t1.id_user = '$iduser' and 
		 				extract(year_month from t1.created_sell) <> '$date'
		 				group by t1.id_sell ")->result();
	}

	// muda de status para vendas antigas marcadas com 'negociando'
	function updateStatusOld($id_sell, $status)
	{
		return $this->db->query("UPDATE tb_sell set status = '$status' where id_sell = '$id_sell' ");
	}

	function excluirSell($id, $id_produto)
	{
		$result = $this->db->query("DELETE from tb_sell where id_sell = '$id' ");
		$this->db->query("UPDATE tb_produtos set qtde = qtde+1 where id_produto = '$id_produto' ");

		return $result;

	}

}