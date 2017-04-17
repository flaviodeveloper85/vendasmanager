<?php

class Conta_vendedor_model extends CI_Model{

	function __construct(){

		parent::__construct();
	}

	// retorna conta do usuario
	function getConta($idUser)
	{
		$this->db->where('id_user', $idUser);
		return $this->db->get('tb_user')->row();
	}

	// atualiza informaçoes no bd
	function editConta($idUser, $name, $email, $tel, $login, $pass=null){

		// se senha estiver em branco atualiza com a senha q ja se encontra no bd
		$currentPass = $this->db->query("SELECT pass from tb_user where id_user = '$idUser'")->row();

		$data = array(

			'name'   => $name,
			'email'  => $email,
			'tel'    => $tel,
			'login'  => $login,
			'pass'   => ($pass == null)? $currentPass->pass : $pass

			);

		$this->db->where('id_user', $idUser);
		$edit_conta = $this->db->update('tb_user', $data);
		if($edit_conta)
		{
			return "Atualizado com Sucesso!";
		}
		else
		{
			return "Erro!";	
		}
	}

}
