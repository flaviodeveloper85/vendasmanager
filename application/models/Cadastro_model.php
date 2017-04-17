<?php

class Cadastro_model extends CI_Model{

	function __construct(){

		parent::__construct();
	}

	// cadastra vendedor ou admin
	function insertUser($name, $email, $tel, $cod_user, $login, $pass)
	{
		$login_bd = $this->db->query("SELECT login from tb_user where login = '$login' ")->row();

		if(!$login_bd)
		{
			
			$data = array(

			'name'     => $name,
			'email'    => $email,
			'tel'  	   => $tel,
			'cod_user' => $cod_user,
			'login'    => $login,
			'pass'	   => $pass,
			'ativo'	   => 's',
			'created'  => date('Y-m-d H:i:s')

			);

			return $this->db->insert('tb_user', $data);
		}
		else
		{
			return false;
			exit;
		}

		
	}

	// retorna todos os vendedores e adms se coduser for 0 e retorna apenas vendedores se for 1
	function getUsers($coduser)
	{
		if($coduser == 0)
		{
			return $this->db->query('SELECT * from tb_user where login <> "master" order by id_user desc ')->result();	
		}
		else if($coduser == 1)
		{	
			return $this->db->query('SELECT * from tb_user where cod_user = 2 order by id_user desc')->result();	
		}

		
	}

	// ativa usuario pelo id
	function ativaUser($id)
	{
		 $this->db->where('id_user', $id);
		 $data = array(
		 	'ativo' => 's'
		 	);
		return $this->db->update('tb_user', $data);
	}

	function desativaUser($id)
	{
		$this->db->where('id_user', $id);
		$data = array(
			'ativo' => 'n'
			);
		return $this->db->update('tb_user',$data);
	}

}