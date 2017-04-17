<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Historico extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->load->model('historico_model');
		

	}

	
	function index()
	{	// popula filtro anos
		$data['years_sell'] = $this->historico_model->getYearsSelect();
		$this->load->view('historico', $data);
		
	}

	function getSells()
	{
		$sell = $this->historico_model->getSellReport();

		if(!$sell)
		{
			echo false;
			exit;
		}

		$result = "";
		foreach($sell as $sells)
		{

			$cliente  = $sells->nome_cliente;
			$telefone = $sells->tel_cliente;
			$produto  = $sells->name_produto;
			$valor    = number_format($sells->preco_sell,2,',','.');
			$data     = date('d.m.Y', strtotime($sells->created_sell));
			$feitapor = $sells->name;
			$status	  = $sells->status;
			$cod      = $sells->id_sell;
			$result   = $sells->result_sum;	

			if($status == 1)
			{
				$status = "negociando"; 
				$class_status = "status-warning";
			}
			else if($status == 2)
			{
				$status = "vendido"; 
				$class_status = "status-success";
			}
			else if($status == 3)
			{
				$status = "cancelado"; 	
				$class_status = "status-fail";
			}

			echo "
		    <tbody>
		      <tr style='text-align:center'>
		        <td>$cliente</td>
		        <td>$telefone</td>
		        <td>$produto</td>
		        <td>R$ $valor</td>
		        <td>$data</td>
		        <td>$feitapor</td>
		        <td class='$class_status'>$status</td>
		        <td>$cod</td>
		      </tr>
		    </tbody>";
		}
		
	}

	// retorna uma sell pelo id
	function getSell()
	{
		$id_venda = $this->input->post('id_venda');
		$sell = $this->historico_model->getSellReport($id_venda);
		
		if(!$sell)
		{
			echo "Código inválido.";
			exit;
		}

		$venda = array(
			'cliente' => $sell->nome_cliente,
			'tel' 	  => $sell->tel_cliente,
			'email'	  => $sell->email_cliente,
			'produto' => $sell->name_produto,
			'valor'   => number_format($sell->preco_sell,2,',','.'),
			'data'    => date('d.m.Y', strtotime($sell->created_sell)),
			'feitapor'=> $sell->name,
			'status'  => $sell->status,
			'obs'     => $sell->obs
			);

		echo json_encode($venda);
	}

	// retorna vendas atraves do filtro
	function getSellByFilter(){

		$filter_mes    = $this->input->post('filter_mes');
		$filter_ano    = $this->input->post('filter_ano');
		$filter_cancel = $this->input->post('sell_cancel');

		$result_filter = $this->historico_model->getSellReport(null, $filter_mes,$filter_ano,$filter_cancel);
		
		if(!$result_filter)
		{
			echo false;
			exit;
		}

		foreach($result_filter as $result)
		{
			$cliente  = $result->nome_cliente;
			$telefone = $result->tel_cliente;
			$produto  = $result->name_produto;
			$valor    = number_format($result->preco_sell,2,',','.');
			$data     = date('d.m.Y', strtotime($result->created_sell));
			$feitapor = $result->name;
			$status	  = $result->status;
			$cod      = $result->id_sell;
			
			
			
			if($status == 1)
			{
				$status = "negociando"; 
				$class_status = "status-warning";
			}
			else if($status == 2)
			{
				$status = "vendido"; 
				$class_status = "status-success";
			}
			else if($status == 3)
			{
				$status = "cancelado"; 	
				$class_status = "status-fail";
			} 
			
			echo "
		    <tbody>
		      <tr style='text-align:center'>
		        <td>$cliente</td>
		        <td>$telefone</td>
		        <td>$produto</td>
		        <td>R$ $valor</td>
		        <td>$data</td>
		        <td>$feitapor</td>
		        <td class='$class_status'>$status</td>
		        <td>$cod</td>
		      </tr>
		    </tbody>";
		}

		
	}

	// retorna soma das vendas atraves dos filtros
	function getTotalSell()
	{
		$filter_mes    = $this->input->post('filter_mes');
		$filter_ano    = $this->input->post('filter_ano');
		$filter_cancel = $this->input->post('sell_cancel');

		$result_filter = $this->historico_model->getSellReport(null, $filter_mes,$filter_ano,$filter_cancel);

		$result = "";
		foreach($result_filter as $sells)
		{
			$result = $sells->result_sum;
			
		}
		
		if(!$result)
		{
			echo false;
			exit;
		}

		echo number_format($result,2,',','.');
	}



}