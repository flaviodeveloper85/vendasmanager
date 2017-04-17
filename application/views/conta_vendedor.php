<?php
		
		// validaçao de session
		if(!isset($_SESSION['vendedor']))
		{
			session_unset();
			redirect('');
		}

		
?>
<html>
	<head>
		<title>Sistema de Gestao de Vendas</title>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="<?php echo base_url();?>img/favicon.ico" type="image/x-icon">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url('css/style.css');?>" />
        <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css');?>" />
        <link rel="stylesheet" href="<?php echo base_url('css/normalize.css');?>" />
        <link rel="stylesheet" href="<?php echo base_url('css/font-awesome.min.css');?>" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    	<link href="https://fonts.googleapis.com/css?family=Anton|Russo+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="<?php echo base_url('js/jquery.maskedinput.min.js');?>"></script>
        <script src="<?php echo base_url('js/jquery.maskMoney.js');?>"></script>
        <script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>
        <script src="<?php echo base_url('js/main.js');?>"></script>
        <script src="<?php echo base_url('js/jquery-ui.min.js');?>"></script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 main">
					<div class="row">
						<div class="col-lg-4 admin-header">
							SellControl - HidroForte
						</div>
						<div class="col-lg-7 admin-header" style="text-align:right;padding-right:50px">
							<i class="fa fa-check-square-o" aria-hidden="true"></i> Vendedor <?php echo $_SESSION['vendedor']['username'] ?> logado
						</div>
						<div class="col-lg-1 admin-header" >
							<a href="<?php echo site_url();?>login/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> sair</a>
						</div>
						<div class="row" style="color:#337ab7">
							<div class="col-lg-4 menu"></div>
							<div class="col-lg-4 menu">

							<div class="box-edit-conta" style="position:relative;top:20px;height:660px;">
									
									<h1 style="font-family:impact;margin-bottom:50px">
								<i class="fa fa-edit fa-2x" aria-hidden="true"></i>
								EDITAR CONTA</h1>
								<form id="edit_conta" method="post">
									<div class="input-group">
									  <span class="input-group-addon" id="basic-addon1">
									  	<i class="fa fa-user" aria-hidden="true"></i>
									  </span>
									  <input type="text" value="<?php echo $account->name; ?>" onkeydown="removeEspaco(this);" onblur="removeEspaco(this);" id="edit_nome" name="edit_nome" class="form-control" placeholder="nome sobrenome" required aria-describedby="basic-addon1">
									</div><br />
									<div class="input-group">
									  <span class="input-group-addon" id="basic-addon1">
									  	<i class="fa fa-envelope" aria-hidden="true"></i>
									  </span>
									  <input type="email" value="<?php echo $account->email; ?>" onkeydown="removeEspaco(this);" onblur="removeEspaco(this);" id="edit_email" name="edit_email" class="form-control" placeholder="email" required aria-describedby="basic-addon1">
									</div><br />
									<div class="input-group">
									  <span class="input-group-addon" id="basic-addon1">
									  	<i class="fa fa-phone" aria-hidden="true"></i>
									  </span>
									  <input type="phone" value="<?php echo $account->tel; ?>" onkeydown="removeEspaco(this);" onblur="removeEspaco(this);" id="edit_phone" name="edit_phone" class="form-control" placeholder="telefone" required aria-describedby="basic-addon1">
									</div><br />
									<div class="input-group">
									  <span class="input-group-addon" id="basic-addon1">
									  	<i class="fa fa-user" aria-hidden="true"></i>
									  </span>
									  <input type="text" value="<?php echo $account->login; ?>" onkeydown="removeEspaco(this);" onblur="removeEspaco(this);" id="edit_login" name="edit_login" class="form-control" placeholder="login de acesso" required aria-describedby="basic-addon1">
									</div><br />
									<div class="input-group">
									  <span class="input-group-addon" id="basic-addon1">
									  	<i class="fa fa-key" aria-hidden="true"></i>
									  </span>
									  <input type="text" onkeydown="removeEspaco(this);" onblur="removeEspaco(this);" id="new_pass" name="new_pass" class="form-control" placeholder="nova senha (opcional)" aria-describedby="basic-addon1">
									</div><br />
									<div class="input-group">
									  <span class="input-group-addon" id="basic-addon1">
									  	<i class="fa fa-key" aria-hidden="true"></i>
									  </span>
									  <input type="text" onkeydown="removeEspaco(this);" onblur="removeEspaco(this);" id="confirm_new_pass" name="confirm_new_pass" class="form-control" placeholder="confirmar nova senha (opcional)"  aria-describedby="basic-addon1">
									</div><br />
									<button type="submit" class="btn btn-warning" style="float:right">Editar conta</button>
								</form>
								<div style="left:15px;position:absolute;top:535px;width:400px;text-align:center;font-size:14px">
										<a href="<?php echo site_url();?>login_vendedor"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> voltar tela principal</a>
									</div>
							</div>
							<div class="col-lg-4 menu"></div>
								
						</div>
						<div class="row">
							<div class="col-md-12 footer" style="height:75px;text-align:center;">
								© Sistema SellControl / FS System <?php echo date('Y');?> - Todos os Direitos Reservados
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="msg_success" style="display:none">
	  <p style="text-align:center;margin-top:20px"><span class="ui-icon ui-icon-alert"></span>Atualizado com Sucesso!</p>
	</div><!-- end basic modal -->
	<div id="msg_error" style="display:none">
	  <p style="text-align:center;margin-top:20px"><span class="ui-icon ui-icon-alert"></span>Senhas não conferem.</p>
	</div><!-- end basic modal -->
	<div id="msg_branco" style="display:none">
	  <p style="text-align:center;margin-top:20px;text-align:center"><span class="ui-icon ui-icon-alert"></span>Favor digite algo.</p>
	</div><!-- end basic modal -->
	</body>
	<script type="text/javascript">

		$('#edit_phone').mask('(99) 99999-9999');
		
		$('#edit_conta').submit(function(){

			var data = $('#edit_conta').serialize();

			$.post('<?php echo site_url()?>conta_vendedor/editConta', data)
			.done(function(data){
				if(data == "Atualizado com Sucesso!")
				{
					$('#msg_success').dialog({
						modal:true
					});	
				}
				else if(data == "Senhas não conferem.")
				{
					$('#msg_error').dialog({
						modal:true
					});
				}

			});
				setTimeout(function(){ location.reload()}, 1500);
				return false;

		});

		// remove blank spaces
	    function removeEspaco(num) {
	        var er = /^(\s)+$/;
	        //er.lastIndex = 0;
	        var campo = num;
	        if (er.test(campo.value)) {
	          campo.value = "";
	          $('#msg_branco').dialog({
	          	open,
	          	modal:true
	          });
	          num.focus();
	          return false;
	        }
	    }

	</script>
	
	
</html>
