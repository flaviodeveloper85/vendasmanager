<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Conta extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->load->model('conta_model');

	}

	public function index()
	{
		$data['account'] = $this->conta_model->getConta($_SESSION['admin']['iduser']);
		$this->load->view('conta', $data);
	}

	public function editConta()
	{
		$id_user 		 = $_SESSION['admin']['iduser'];
		$name 			 = trim(ucwords($this->input->post('edit_nome')));
		$email 			 = trim($this->input->post('edit_email'));
		$tel	 		 = $this->input->post('edit_phone');
		$login	 		 = trim($this->input->post('edit_login'));
		$pass	 		 = trim($this->input->post('new_pass'));
		$confirm_pass	 = trim($this->input->post('confirm_new_pass'));

		if($pass != null && $confirm_pass != null)
		{
			if($pass == $confirm_pass)
			{
				$pass = md5(md5(md5($this->input->post('new_pass'))));
			}
			else
			{
				echo "Senhas não conferem.";
				exit;
			}	
		}
		else if($pass != null || $confirm_pass != null)
		{
				echo "Senhas não conferem.";
				exit;
		}
		else
		{
			$pass = $this->input->post('new_pass');
		}

		$edit = $this->conta_model->editConta($id_user, $name, $email, $tel, $login, $pass);

		echo $edit;

		// mata a variavel de sessao
		session_unset();
	}

}