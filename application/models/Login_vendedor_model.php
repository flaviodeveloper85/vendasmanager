<?php

class Login_vendedor_model extends CI_Model{

	function __construct(){

		parent::__construct();
	}

	function checkLogin($login, $pass)
	{
		$this->db->where('login', $login);
		$this->db->where('pass', $pass);

		return  $this->db->get('tb_user')->row();
		 
	}

	function rescueSenha($email)
	{
		$this->db->where('email', $email);
		return $this->db->get('tb_user')->row();
	}

}