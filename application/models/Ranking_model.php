<?php

date_default_timezone_set('America/Sao_Paulo');

class Ranking_model extends CI_Model{

	function __construct(){

		parent::__construct();
	}

	function getRanking()
	{	
		//mes anterior ao atual
		if(date("d") <= 31 && date('m') == 03)
		 {
		 	$mes = 02;
		 }
		 else
		 {
			$mes = date("m", strtotime("-1 months"));
		 	
		 }
		 
		return $this->db->query("SELECT count(t1.status) as result, t2.created as data, t2.name from tb_sell t1 inner join tb_user t2 on t1.id_user = t2.id_user where t1.status = 2 and month(t1.created_sell) = '$mes' and t2.cod_user = '2' group by t2.name order by result desc, data asc")->result();
	}

}
