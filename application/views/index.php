<html>
	<head>
		<title>Sistema de Gestao de Vendas</title>
		<link rel="shortcut icon" href="<?php echo base_url();?>img/favicon.ico" type="image/x-icon">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url('css/style.css');?>" />
        <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css');?>" />
        <link rel="stylesheet" href="<?php echo base_url('css/normalize.css');?>" />
        <link rel="stylesheet" href="<?php echo base_url('css/font-awesome.min.css');?>" />
        <link rel="stylesheet" href="<?php echo base_url('css/jquery-ui.min.css');?>" />
       	<link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="<?php echo base_url('js/jquery.maskedinput.min.js');?>"></script>
	</head>
	<body style="background-image:url('<?php echo base_url('img/back.jpg');?>'); background-repeat: no-repeat;background-size: cover;">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 main">
					<div class="row">
						<div class="col-lg-11 header"><span></span> <span style="font-style:italic;font-size:13px"></span></div>
						<div class="col-lg-1 header">Versao 1.0.0</div>
						<div class="row">
							<div class="col-lg-12 top">
								<div id="gestao" style="margin-top:-30;color:#efb310;margin-bottom:10px;margin-left:-10px;display:none;font-size:130px">SELLCONTROL<span style="font-size:30px">®</span></div>

								<div class="row">
									<div class="col-lg-4">
																		
									</div>
									<div class="col-lg-4">
										<div class="box-login" style="width:270px;height:270px;margin-left:75px;padding:30px;padding-top:50px;background:#f7f7f7;margin-bottom:50px">
											<form id="form_login" method="post" action="<?php echo site_url();?>Login/check_login">
											
												<div class="input-group">
												  <span class="input-group-addon" id="basic-addon1">
												  	<i class="fa fa-user" aria-hidden="true"></i>
												  </span>
												  <input type="text" onkeydown="removeEspaco(this);" onblur="removeEspaco(this);" id="nome" name="login" class="form-control" placeholder="login" required aria-describedby="basic-addon1">
												</div>
												<br>
												<div class="input-group">
												  <span class="input-group-addon" id="basic-addon1">
												  	<i class="fa fa-key" aria-hidden="true"></i>
												  </span>
												  <input type="password" onkeydown="removeEspaco(this);" onblur="removeEspaco(this);" id="nome" name="pass" class="form-control" placeholder="senha" required aria-describedby="basic-addon1">
												</div>
												<span class="esqueci-senha" style="font-size:13px;margin:10px;font-family:arial;float:right"><a href="<?php echo site_url()?>login/esqueciSenha">Esqueci minha senha</a></span>
												<button type="submit" class="btn btn-primary" id="bt_login"><i class="fa fa-sign-in" aria-hidden="true"></i> Entrar</button>
												<br><br>
												<br/><br/><br/>
												<span id="msg_erro"
												style="font-style:italic;font-family:arial;margin-top:-190px;margin-left:35px;color:red;font-size:13px"><?php 
												if(isset($msg_erro)){echo $msg_erro;}?></span>
											</form>
										</div>
										<span style="margin-left:-40;color:white;font-size:12px;font-family:arial"><img src="<?php echo base_url('img/logofs.png');?>" width=38 height=38><br/><br/>Todos os Direitos Reservados - FS System</span>
									</div>
									<div class="col-lg-4"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<script type="text/javascript">
		$(function(){
			
			$('#gestao').fadeIn('slow');

		});
	</script>>
</html>