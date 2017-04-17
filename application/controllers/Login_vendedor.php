<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_vendedor extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->load->model('login_vendedor_model');
		$this->load->model('vendas_vendedor_model');
		
		
	}

	public function index()
	{
		$idUser = $_SESSION['vendedor']['iduser'];
		$data['result'] = $this->vendas_vendedor_model->oldStatus($idUser);
		$this->load->view('vendedor', $data);

	}

	public function check_login()
	{
		$login = $this->input->post('login');
		$pass =  md5(md5(md5($this->input->post('pass'))));

		$user = $this->login_model->checkLogin($login, $pass);
		
		if(!$user)
		{
			
			$data['msg_erro'] = "Login ou senha inválido.";
			$this->load->view('index', $data);

			
		}
		else{
			if($user->cod_user == 0 || $user->cod_user == 1)
			{

				$data = array(
					'coduser'  => $user->cod_user,
					'username' => $user->name,
					'iduser'   => $user->id_user
					);

				$_SESSION['admin'] = $data;
				
				$idUser = $_SESSION['admin']['iduser'];
				$data['result'] = $this->vendas_model->oldStatus($idUser);
				$this->load->view('admin', $data);

			}
			else if($user->cod_user == 2)
			{
				$data = array(
					'coduser'  => $user->cod_user,
					'username' => $user->name,
					'iduser'   => $user->id_user
					);

				$_SESSION['vendedor'] = $data;
				 $idUser = $_SESSION['vendedor']['iduser'];
				$data['result'] = $this->vendas_vendedor_model->oldStatus($idUser);
				$this->load->view('vendedor', $data);
			}
		}

		
	}

	
	public function logout()
	{
		session_unset();
		session_destroy();

		redirect('');
	}

	// carrega view esqueci minha senha
	function esqueciSenha()
	{
		$this->load->view('esqueci_senha');
	}


	function rescueSenha()
	{
		$email = $this->input->post('email_rescue');

		$result = $this->login_model->rescueSenha($email);

		if($result)
		{	
			echo true;

			base_url('PHPMailer-master');

			$hash = base64_encode($email);
			$hash_data = date('Y:m:d H:i:s', strtotime('+1 day'));
			$this->db->query("INSERT into tb_hash (hash, data_hash) values('$hash', '$hash_data')");


			// constroi o html do pedido do link de recuperaçao com div
			$message = "<div>";
			$message .= "Verificamos que necessita de uma nova senha. Favor se nao solicito, desconsidere esse link, caso sim <a href='".site_url('login/novaSenha')."'?$hash_pass&$hash_data'>clique aqui</a>";
			$message .= "</div>";

			 
			/*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/ 
			 

			base_url('PHPMailer-master/class.phpmailer.php');
			base_url('PHPMailer-master/PHPMailerAutoload.php');

			 
			$mail = new PHPMailer();
			 
			$mail->IsMail();
			$mail->SMTPAuth  = true;
			$mail->Charset   = 'utf8_decode()';
			$mail->Host  = 'smtp.hidroforte.com.br';
			$mail->Port  = '587';
			$mail->Username  = 'user@user.com.br';
			$mail->Password  = '****';
			$mail->From = "contato@hidroforte.com.br"; // Seu e-mail
			$mail->FromName  = utf8_decode("** SELLCONTROL **");
			$mail->IsHTML(true);
			$mail->Subject  = utf8_decode('SELLCONTROL - Nova Senha');
			$mail->Body  = utf8_decode($message);
			$mail->AddAddress($email);

				
		}
		else
		{
			echo false;	
		}


	}

	// carrega view nova senha
	function novaSenha()
	{
		$this->load->view('nova_senha');
	}

}