<?php

	// validaçao de session
		if(!isset($_SESSION['admin']))
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
							<i class="fa fa-check-square-o" aria-hidden="true"></i> Administrador <?php echo $_SESSION['admin']['username'];  ?> logado
						</div>
						<div class="col-lg-1 admin-header" >
							<a href="<?php echo site_url();?>login/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> sair</a>
						</div>
						<div class="row" style="color:#337ab7">
							<div class="col-lg-1 menu" style="padding-top:30px">
								
							</div>
							<div class="col-lg-5 menu" style="padding-top:113px;">
								<h1 style="font-family:impact">
								<i class="fa fa-info-circle fa-2x" aria-hidden="true"></i>
								CADASTRO DE USUÁRIOS E PRODUTOS</h1>
								<br />
								<?php if($_SESSION['admin']['coduser'] == 0): ?>
								<select class="form-control" id="tipo_cadastro" style="width:400px">
									<option value="00">Selecione</option>
									<option value="1">Novo administrador</option>
									<option value="2">Novo vendedor</option>
									<option value="3">Novo produto</option>
								</select>
								<?php else: ?>
								<select class="form-control" id="tipo_cadastro" style="width:400px">
									<option value="00">Selecione</option>
									<option value="2">Novo vendedor</option>
									<option value="3">Novo produto</option>
								</select>
								<?php endif; ?>
								<br /><br /><br />
								<div class="box-form-user" id="box_user" style="display:none;margin-top:-20px;width:500px">
									<form name="form-user" id="form_user" method="post">
										<div class="input-group">
										  <span class="input-group-addon" id="basic-addon1">
										  	<i class="fa fa-user" aria-hidden="true"></i>
										  </span>
										  <input type="text" onkeydown="removeEspaco(this);" onblur="removeEspaco(this);" id="nome" name="nome" class="form-control" placeholder="nome sobrenome" required aria-describedby="basic-addon1">
										</div>
										<br />
										<div class="input-group">
										  <span class="input-group-addon" id="basic-addon1">
										  	<i class="fa fa-envelope-o" aria-hidden="true"></i>
										  </span>
										  <input type="email" id="email" name="email" required class="form-control" placeholder="email" aria-describedby="basic-addon1">
										</div>
										<br />
										<div class="input-group">
										  <span class="input-group-addon" id="basic-addon1">
										  	<i class="fa fa-phone" aria-hidden="true"></i>
										  </span>
										  <input type="tel" name="telefone" id="phone" required class="form-control" placeholder="Telefone" aria-describedby="basic-addon1">
										</div>
										<br />
										<div class="input-group">
										  <span class="input-group-addon" id="basic-addon1">
										  	<i class="fa fa-user" aria-hidden="true"></i>
										  </span>
										  <input type="text" onkeydown="removeEspaco(this);" onblur="removeEspaco(this);" id="login" name="login" required class="form-control" placeholder="login de acesso (sem espaços em minusculo)" aria-describedby="basic-addon1">
										</div>
										<br />
										<div class="input-group">
										  <span class="input-group-addon" id="basic-addon1">
										  	<i class="fa fa-key" aria-hidden="true"></i>
										  </span>
										  <input type="text" onkeydown="removeEspaco(this);" onblur="removeEspaco(this);" id="pass" name="pass" required class="form-control" placeholder="senha de acesso" aria-describedby="basic-addon1">
										</div><br />
										<input type="hidden" name="tp_user" id="tp_user" />
										<button type="submit" class="btn btn-warning" style="float:right">cadastrar usuário</button>
									</form>
								</div>
								<!-- fim box produto -->
								<div class="box-produto" id="box_produto" style="display:none;width:500px;margin-top:-20px">
									<form name="form-produto" id="form_produto" method="post">
										<div class="input-group">
										  <span class="input-group-addon" id="basic-addon1">
										  	<i class="fa fa-cube" aria-hidden="true"></i>
										  </span>
										  <input type="text" onkeydown="removeEspaco(this);" onblur="removeEspaco(this);" name="produto" class="form-control" placeholder="nome do produto" required aria-describedby="basic-addon1">
										</div><br />
										<div class="input-group">
										  <span class="input-group-addon" id="basic-addon1">
										  	R<i class="fa fa-dollar" aria-hidden="true"></i>
										  </span>
										  <input type="text" id="preco_prod" name="preco_prod" keydown="somenteNumeros(this);" class="form-control" placeholder="preço base (unidade)" required aria-describedby="basic-addon1">
										</div><br />
										<label>Quantidade em estoque (pronta entrega)</label><br />
										<select class="form-control" id="qtde_prod" name="qtde_prod" style="width:150px">
											<option value="00">Quantidade</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
										</select><br />
										<button type="submit" class="btn btn-warning" style="float:right">cadastrar produto</button>
									</form>
								</div>
									
								<div style="position:absolute;top:587px;width:400px;text-align:center;font-size:14px">
										<a href="<?php echo site_url();?>login"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> voltar tela principal</a>
								</div>
							</div>
							<div class="col-lg-6 menu" style="height:678px;padding-top:30px;font-weight:bold;padding:50px">
								<ul class="nav nav-tabs">
								  <li id="tb_vend" class="active"><a data-toggle="tab" href="#home">vendedores</a></li>
								  <li id="tb_prod"><a data-toggle="tab" href="#menu1">produtos</a></li>
								</ul>

								<div class="tab-content" style="height:500px;overflow:auto">
								  <div id="home" class="tab-pane fade in active">
								  <br>
								  <?php if($_SESSION['admin']['coduser'] == 0): ?>
								    <h1 style="font-family:impact"><i class="fa fa-users fa-2x" aria-hidden="true"></i>  ADMS e VENDEDORES</h1>
                    			    <?php else: ?>
                    			    <h1 style="font-family:impact"><i class="fa fa-users fa-2x" aria-hidden="true"></i>  VENDEDORES</h1>
                    				<?php endif; ?>
								<br />
								<?php if($users == null): ?>
									<p style="margin-left:100px">Nao há vendedores cadastrados.</p>
								<?php else: ?>
								<table class="table table-bordered users" style="font-size:12px">
								    <thead>
								      <tr>
								        <th>Nome</th>
								        <th>Email</th>
								        <th>Telefone</th>
								        <th>Desde</th>
								        <th></th>
								      </tr>
								    </thead>
								    <tbody>
								    <?php foreach($users as $user): ?>
								      <tr style="text-align:center">
								        <td><?php echo $user->name; ?></td>
								        <td><?php echo $user->email; ?></td>
								        <td><?php echo $user->tel; ?></td>
								        <td><?php echo date('d.m.Y', strtotime($user->created)); ?></td>
								        <td style="color:<?php if($user->ativo == 's'){echo "#45d448";}else{echo "silver";}  ?>">
								        	<i class="fa fa-user" title="<?php if($user->ativo == 's'){echo "Usuário ativo";}else{echo "Usuário inativo";}  ?>" aria-hidden="true" style="cursor:pointer" onclick="ativarDesativarUser(<?php echo $user->id_user; ?>)";></i>
								        </td>
								      </tr>
								  <?php endforeach; ?>
								    </tbody>
								  </table>
								<?php endif; ?>
								  </div>
								  <div id="menu1" class="tab-pane fade">
								    <h1 style="font-family:impact;padding-top:20px;margin-bottom:45px"><i class="fa fa-cube fa-2x" aria-hidden="true"></i>  PRODUTOS</h1>
								    <?php if($prod == null): ?>
								    	<p style="margin-left:100px">Não há produtos cadastrados.</p>
								    <?php else: ?>
								    <table class="table table-bordered" style="font-size:12px">
								    <thead>
								      <tr>
								        <th>Produto</th>
								        <th>Preço (Unidade)</th>
								        <th>Qtde em estoque</th>
								        <th>Ultima atualizaçao</th>
								        <th></th>
								        <th></th>
								      </tr>
								    </thead>
								    <tbody>
								    <?php foreach($prod as $prods): ?>
								      <tr>
								        <td><?php echo $prods->name_produto; ?></td>
								        <td>R$ <?php echo number_format($prods->preco_produto, 2, ',', '.'); ?></td>
								        <?php if($prods->qtde == 0): ?>
							        		<td style="color:red">0</td>
							        	<?php else: ?>
								        	<td><?php echo $prods->qtde; ?></td>
								        <?php endif; ?>
								        <td><?php echo date('d.m.Y', strtotime($prods->created)); ?></td>
								        <td><a style="cursor:pointer" onclick="bindProduto(<?php echo $prods->id_produto; ?>);"><i class="fa fa-pencil" title="Editar" aria-hidden="true"></i></a></td>
								        <td><i style="cursor:pointer;color:<?php if($prods->ativo == 's'){echo "#45d448";}else{echo "silver";}?>" class="fa fa-cube" onclick="ativarDesativarProduto(<?php echo $prods->id_produto; ?>);" aria-hidden="true"></i></td>
								      </tr>
								  <?php endforeach; ?>
								    </tbody>
								  </table>
								<?php endif; ?>
								  </div>
								</div>
							</div>
							<div class="row">
							<div class="col-md-12 footer" style="height:75px;text-align:center;">
								© Sistema SellControl / FS System <?php echo date('Y');?> - Todos os Direitos Reservados
							</div>
						</div>
						</div>
					</div>
					<script type="text/javascript">

							

					</script>
					<!-- modal -->
					<div id="edit_prod" title="Editar produto" style="display:none">		<br />	
					<p id="warn_msg" style="color:red;font-size:12px"></p>		  
					  <form id="form_edit_prod">
					  <br />
					  	<div class="input-group">
						  <span class="input-group-addon" id="basic-addon1">
						  	<i class="fa fa-cube" aria-hidden="true"></i>
						  </span>
						  <input type="text" name="nome_prod" id="nome_prod" class="form-control" placeholder="nome do produto" required aria-describedby="basic-addon1" onkeydown="validaEspaco(this);" onblur="validaEspaco(this);">
						</div><br />
						<div class="input-group">
						  <span class="input-group-addon" id="basic-addon1">
						  	R<i class="fa fa-dollar" aria-hidden="true"></i>
						  </span>
						  <input type="text" name="edit_preco_prod" id="edit_preco_prod" class="form-control" placeholder="preço produto" required aria-describedby="basic-addon1">
						</div><br />
						<div class="input-group">
						  <span class="input-group-addon" id="basic-addon1">
						  	<i class="fa fa-sort" aria-hidden="true"></i>
						  </span>
						  <input type="text" name="edit_qtde_prod" id="edit_qtde_prod" class="form-control" placeholder="Quantidade em estoque" required aria-describedby="basic-addon1">
						</div>
						<input type="hidden" name="hidden_id_prod" id="hidden_id_prod" />
					  </form>
					</div> <!-- end modal -->
					<!-- confirm modal -->
					<div id="dialog-confirm" title="Ativar/Desativar?" style="display:none">
					  <p style="text-align:center;margin-top:10px"><span class="ui-icon ui-icon-alert"></span>Selecione uma das opções. Ativar/Desativar usuário</p>
					</div><!-- basic modal -->
					<div id="msg_success" style="display:none">
					  <p style="text-align:center;margin-top:20px"><span class="ui-icon ui-icon-alert"></span>Usuário cadastrado com sucesso!</p>
					</div><!-- end basic modal -->
					<div id="msg_prod" style="display:none">
					  <p style="text-align:center;margin-top:20px"><span class="ui-icon ui-icon-alert"></span>Produto cadastrado com sucesso!</p>
					</div><!-- end basic modal -->
					<div id="msg_ativa_prod" title="Ativar/desativar produto" style="display:none">
					  <p style="text-align:center;margin-top:20px"><span class="ui-icon ui-icon-alert"></span>Ativar/Desativar produto?</p>
					</div><!-- end basic modal -->
					<div id="msg_qtde_prod" style="display:none">
					  <p style="text-align:center;margin-top:20px"><span class="ui-icon ui-icon-alert"></span>Favor selecione a quantidade do produto.</p>
					</div><!-- end basic modal -->
					<div id="msg_error" style="display:none">
					  <p style="text-align:center;margin-top:20px"><span class="ui-icon ui-icon-alert"></span>Erro! tente outro login</p>
					</div><!-- end basic modal -->
					<div id="msg_branco" style="display:none">
					  <p style="text-align:center;margin-top:20px;text-align:center"><span class="ui-icon ui-icon-alert"></span>Favor digite algo.</p>
					</div><!-- end basic modal -->
				</div>
			</div>
		</div>

	</body>
	<script type="text/javascript">

		// mask for form's phone number
		$('#phone').mask('(99) 99999-9999');

		$(function(){
			// mask for product's money
			$('#preco_prod').maskMoney({symbol:'', showSymbol:true, thousands:'.', decimal:',', symbolStay: true});

			$('#edit_preco_prod').maskMoney({symbol:'', showSymbol:true, thousands:'.', decimal:',', symbolStay: true});	
		});
		
 
		
		// cadastra Administrador ou Vendedor
		function cadastraUser(){

			var dados = $('#form_user').serialize();

			$.post('<?php echo site_url()?>CadastroUser/insertUser', dados)
			.done(function(data){
				if(data == "Erro! tente outro login")
				{
					$("#msg_error").dialog({
						modal:true
					});					
				}
			});

			$("#msg_success").dialog({
				modal:true
			});
			setTimeout(function(){location.reload()}, 1500);

		}

		// ativa/desativa usuario
		function ativarDesativarUser(id){

			var id = id;

			$( "#dialog-confirm" ).dialog({
				open,
				resizable: false,
			      height: "auto",
			      width: 400,
			      modal: true,
			      buttons: {
			        "Ativar": function() {

						$.ajax({
							url: '<?php echo site_url()?>CadastroUser/ativaUser',
							type: 'POST',
							data: { id: id },
							dataType: 'html',
							success: function(data){
								location.reload();
							}
						});	
						$( this ).dialog( "close" );
			        },
			        Desativar: function() {
			          $.ajax({
							url: '<?php echo site_url()?>CadastroUser/desativaUser',
							type: 'POST',
							data: { id: id },
							dataType: 'html',
							success: function(data){
								location.reload();
							}
						});	
						$( this ).dialog( "close" );
			        }
			      }

			});

		}


		function cadastraProduto(){

			var dados = $('#form_produto').serialize();

			$.post('<?php echo site_url();?>produtos/cadastraProduto', dados)
				.done(function(data){
					
				});

				$("#msg_prod").dialog({
					modal:true
				});
				setTimeout(function(){location.reload()}, 1500);
				
		}

		// retorna produto pra editar na modal
		function bindProduto(id){

			var id = id;

			$.ajax({
				url: '<?php echo site_url(); ?>produtos/getProduto',
				type: 'POST',
				data: { id: id },
				dataType: 'html',
				success: function(data){
					var result = JSON.parse(data);
					$('#nome_prod').val(result.name);
					$('#edit_preco_prod').val(result.preco);
					$('#edit_qtde_prod').val(result.qtde);
					$('#hidden_id_prod').val(result.id);
					// modal para editar produto
					$( "#edit_prod" ).dialog({
						open,
						resizable: false,
					      height: "auto",
					      width: 400,
					      modal: true,
					      buttons: {
					        "Confirmar": function() {
					        	if($('#nome_prod').val() == ''){
					        		$('#warn_msg').html('');
					        		$('#warn_msg').html('Preencha nome do produto');
					        		return false;
					        	}

					        	if(!$.isNumeric($('#edit_qtde_prod').val())){
					        		$('#warn_msg').html('Preencha quantidade de produtos em estoque');
					        		return false;
					        	}

					        	if($('#edit_preco_prod').val() == ''){
					        		$('#warn_msg').html('');
					        		$('#warn_msg').html('Preencha preço do produto.');
					        		return false;
					        	}
					        	// serializa e envia as atualizaçoes pro bd
								var data = $('#form_edit_prod').serialize();

								$.post('<?php echo site_url() ?>produtos/editProduto', data)
								.done(function(data){
									
								});
								setTimeout(function(){location.reload()}, 1000) ;
								$( this ).dialog( "close" );
					        },
					        Cancelar: function() {
					          $('#warn_msg').html('');
					          $( this ).dialog( "close" );
					        }
					      }

					}); 

				}

			});	

			if($('#edit_prod').dialog("close")){
						$('#warn_msg').html('');
					}
		}

		// ativa/desativa produto
		function ativarDesativarProduto(id){

			var id = id;

			$( "#msg_ativa_prod" ).dialog({
				open,
				resizable: false,
			      modal: true,
			      buttons: {
			        "Ativar": function() {

						$.post('<?php echo site_url()?>produtos/ativarProduto', {id:id})
						.done(function(data){
							
						});

						$( this ).dialog( "close" );
						setTimeout(function(){location.reload()}, 1000);
						
			        },
			        "Desativar": function() {
			          
			          $.post('<?php echo site_url()?>produtos/desativarProduto', {id:id})
						.done(function(data){
							
						});

						$( this ).dialog( "close" );
						setTimeout(function(){location.reload()}, 1000);
						

			        }
			      }

			});

		}

		// only enter number
	    function somenteNumeros(num) {
	        var er = /[^0-9]/;
	        er.lastIndex = 0;
	        var campo = num;
	        if (er.test(campo.value)) {
	          campo.value = "";
	        }
	    }

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

	    // remove blank spaces
	    function validaEspaco(num) {
	        var er = /^(\s)+$/;
	        //er.lastIndex = 0;
	        var campo = num;
	        if (er.test(campo.value)) {
	          campo.value = "";
	          $('#warn_msg').html('');
	          $('#warn_msg').html('Preencha o nome do produto.');
	          num.focus();
	          return false;
	        }
	    }


	</script>
</html>
