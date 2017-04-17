<?php
	
 
/* abaixo as veriaveis principais, que devem conter em seu formulario*/
$mail 	 	   = $_POST["email"];


// constroi o html do pedido de orçamento com div
$message = "<div>";
$message .= "Verificamos que necessita de uma nova senha. Favor se nao solicito, desconsidere esse link, caso sim clique aqui";
$message .= "</div>";

 
/*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/ 
 

require_once('PHPMailer-master/class.phpmailer.php');
require_once('PHPMailer-master/PHPMailerAutoload.php');

 
$mail = new PHPMailer();
 
$mail->IsMail();
$mail->SMTPAuth  = true;
$mail->Charset   = 'utf8_decode()';
$mail->Host  = 'smtp.hidroforte.com.br';
$mail->Port  = '587';
$mail->Username  = 'user@user.com.br';
$mail->Password  = '****';
$mail->From = "contato@hidroforte.com.br"; // Seu e-mail
$mail->FromName  = utf8_decode("** $nome - Pedido de Orçamento **");
$mail->IsHTML(true);
$mail->Subject  = utf8_decode('SELLCONTROL - Nova Senha');
$mail->Body  = utf8_decode($message);
$mail->AddAddress($email);


 
if($mail->Send()){

	$mensagemRetorno = 'Formulário enviado com sucesso!';

}else{

	$mensagemRetorno = 'Erro ao enviar formulário: '. print($mail->ErrorInfo);
} 
 echo $mensagemRetorno; 

?>
 