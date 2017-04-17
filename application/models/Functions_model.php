<?php

class Functions_model extends CI_Model{

	function __construct(){

		parent::__construct();
	}

	function handleMoney($money){

		for($i=0;$i<=strlen($money);$i++)
		{
			if($money[$i] == '.')
			{
				$money[$i]
			
			}

		}
	}
}