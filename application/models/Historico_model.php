<?php

class Historico_model extends CI_Model{

	function __construct(){

		parent::__construct();
	}

	// retorna vendas ou canceladas atraves dos filtros
	function getSellReport($id_sell=null, $mes=null, $ano=null, $sell_cancel=null)
	{	

		// query limpa 
		$select1 = "SELECT t1.*, t2.name, t3.name_produto,
				(SELECT distinct(Sum(preco_sell))
					FROM   tb_sell
					WHERE status = 2";

		$select2 = ")AS result_sum
				FROM   tb_sell t1
				       INNER JOIN tb_user t2
				               ON t1.id_user = t2.id_user
				       INNER JOIN tb_produtos t3
				               ON t1.id_produto = t3.id_produto
				WHERE";

		// variavel que ira armazenar query final para execuçao		
		$final_query = "";

		$final_query = $select1.$select2." t1.status = 2 limit 11";		
		
		if($sell_cancel == 3)
		{	
			$final_query = $select1.$select2." t1.status = 3";

			if($mes!=00)
			{
				$final_query = $select1." and month(created_sell) = '$mes' ".$select2."t1.status = 3 and month(t1.created_sell) = '$mes' ";

			}
			
			if($ano!=00)
			{
				$final_query = $select1." and month(created_sell) = '$mes' and year(created_sell) = '$ano'".$select2." t1.status = 3 and month(t1.created_sell) = '$mes' and year(t1.created_sell) = '$ano' ";		
			}
			
		} 

		if($ano!=00)
		{
			$final_query = $select1." and year(created_sell) = '$ano'".$select2." t1.status = 2 and year(t1.created_sell) = '$ano'";
			

			if($mes!=00)
			{

				$final_query = $select1." and year(created_sell) = '$ano' and month(created_sell) = '$mes' ".$select2." t1.status = 2 and year(t1.created_sell) = '$ano' and month(t1.created_sell) = '$mes'";
			
			}

			if($sell_cancel==3)
			{
				if($mes!=00)
				{
					$final_query = $select1." and year(created_sell) = '$ano' and month(created_sell) = '$mes' ".$select2." t1.status = 3 and year(t1.created_sell) = '$ano' and month(t1.created_sell) = '$mes'";	
				}

				$final_query = $select1." and year(created_sell) = '$ano'".$select2." t1.status = 3 and year(t1.created_sell) = '$ano'";
			}
		} 
		
		
		if($mes!=00)
		{
			
			$final_query = $select1." and month(created_sell) = '$mes'".$select2." t1.status = 2 and month(t1.created_sell) = '$mes' ";
			
			
			if($ano!=00)
			{
				
				$final_query = $select1." and month(created_sell) = '$mes' and year(created_sell) = '$ano'".$select2." t1.status = 2 and month(t1.created_sell) = '$mes' and year(t1.created_sell) = '$ano' ";
				
			}

			if($sell_cancel == 3)
			{

				$final_query = $select1." and month(created_sell) = '$mes'".$select2." t1.status = 3 and month(t1.created_sell) = '$mes'";

				if($ano!=00)
				{
					$final_query = $select1." and month(created_sell) = '$mes'".$select2." t1.status = 3 and month(t1.created_sell) = '$mes' and year(t1.created_sell) = '$ano' ";
				}
				
			}

		}

		
		// retorna venda atraves do id 
		$venda = "";
		if($id_sell!=null){
			$venda = $id_sell;

			$select1.= " and id_sell = '$venda'".$select2." t1.id_sell = '$venda'";
			return $this->db->query($select1)->unbuffered_row();
		}
		
		// executa query
		return $this->db->query($final_query)->result();
		
	}

	// retorna cada ano das vendas
	function getYearsSelect()
	{
		return $this->db->query("SELECT distinct(year(created_sell)) as yearssell from tb_sell where status <> 1 order by created_sell desc")->result();
	}

}