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
							<div class="col-lg-5 menu" style="padding-top:50px;">
								<h1 style="font-family:impact"><i class="fa fa-cube fa-2x" aria-hidden="true"></i> REGISTRAR FUTURAS VENDAS</h1>
								<div class="box-form-venda" id="box_venda" style="margin-top:50px;width:500px">
									<form name="form-venda" id="form_venda" method="post">
										<div class="input-group">
										  <span class="input-group-addon" id="basic-addon1">
										  	<i class="fa fa-user" aria-hidden="true"></i>
										  </span>
										  <input type="text" onkeydown="removeEspaco(this);" onblur="removeEspaco(this);" id="nome_cliente" name="nome_cliente" class="form-control" placeholder="nome do cliente" required aria-describedby="basic-addon1">
										</div>
										<br />
										<div class="input-group">
										  <span class="input-group-addon" id="basic-addon1">
										  	<i class="fa fa-envelope-o" aria-hidden="true"></i>
										  </span>
										  <input type="email" id="email_cliente" name="email_cliente" required class="form-control" placeholder="email do cliente" aria-describedby="basic-addon1">
										</div>
										<br />
										<div class="input-group">
										  <span class="input-group-addon" id="basic-addon1">
										  	<i class="fa fa-phone" aria-hidden="true"></i>
										  </span>
										  <input type="tel" name="tel_cliente" id="phone_cliente" required class="form-control" placeholder="Telefone do cliente" aria-describedby="basic-addon1">
										</div>
										<br />
										<select class="form-control" name="prod_venda" id="prod_venda" style="float:left;width:300px">
											<?php if(!$prod_disponivel): ?>
											<option value="00" >Não há produtos</option>
											<?php else: ?>
											<option value="00">Produto ao cliente</option>
											<?php foreach($prod_disponivel as $prod): ?>
											<option value="<?php echo $prod['id_produto']; ?>"><?php echo $prod['name_produto']; ?></option>
											<?php endforeach; ?>
											<?php endif; ?>
										</select>
										<select class="form-control" name="status_venda" id="status_venda" style="width:200px">
											<option value="00">Status da venda</option>
											<option value="1">Negociando</option>
											<option value="2">Vendido</option>
										</select><br />
										<div class="input-group">
										  <span class="input-group-addon" id="basic-addon1">
										  	R<i class="fa fa-dollar" aria-hidden="true"></i>
										  </span>
										  <input type="text" id="preco_venda" name="preco_venda" keydown="somenteNumeros(this);" class="form-control" placeholder="preço de venda" required aria-describedby="basic-addon1">
										</div><br />
										<div class="input-group">
										  <span class="input-group-addon" id="basic-addon1">
										  	<i class="fa fa-info-circle" aria-hidden="true"></i>
										  </span>
										  <textarea rows="5" name="obs_venda" class="form-control" style="resize:none" placeholder="Observaçao"></textarea> 
										</div><br />
										<input type="hidden" name="user_venda" value="<?php echo $_SESSION['admin']['iduser']; ?>" />
										<?php if(!$prod_disponivel): ?>
										<button type="submit" id="bt_registrar" class="btn btn-warning" style="float:right" " disabled>Registrar</button>
										<?php else: ?>
										<button type="submit" id="bt_registrar" class="btn btn-warning" style="float:right" " >Registrar</button>
										<?php endif; ?>
									</form>
									<div style="position:absolute;top:595px;width:400px;text-align:center;font-size:14px">
										<a href="<?php echo site_url();?>login"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> voltar tela principal</a>
									</div>
								</div>
							</div>
							<div class="col-lg-6 menu" style="height:680px;padding-top:30px;font-weight:bold;padding:50px">
								<h1 style="font-family:impact"><i class="fa fa-clock-o fa-2x" aria-hidden="true"></i> STATUS DE VENDAS</h1>
								<div class="alert alert-warning" style="margin-bottom:-30px;font-size:12px;width:550px">
								   Somente exclua uma venda se precisar alterar informações do cliente, como email, telefone, etc. Em seguida refaça o registro.
								</div>
								<?php if(!$vendas): ?>
								<div style="margin-left:40px;margin-top:50px">No momento não há vendas em negociação neste mês</div>
								<?php else: ?>
								<div class="container-vendas" style="width:570px;height:385px;overflow:auto;margin-top:50px">
								<?php foreach($vendas as $sell): ?>
									
										<div class="box-venda" style="border:1px solid silver;padding:10px;width:550px;margin-bottom:10px;font-size:12px;">
										<span title="Quantidade em estoque: <?php echo $sell->qtde; ?>" style="color:#2d2d2d"><i class="fa fa-cube" aria-hidden="true"></i> <?php echo $sell->name_produto; ?> - <?php echo date('d.m.Y', strtotime($sell->created_sell)); ?> 
										<span style="float:right">
										<?php if($sell->id_user == $_SESSION['admin']['iduser']):?>
										<span title="Excluir venda" style="cursor:pointer;color:silver" 
										onclick="excluirSell(<?php echo $sell->id_sell; ?>, <?php echo $sell->id_produto; ?> );">[Excluir]</span>
										<?php endif;?>
										 <?php echo $sell->name; ?>
										</span></span> <br />

									<?php echo $sell->nome_cliente; ?> <span style="float:right">R$ <?php echo number_format($sell->preco_sell, 2,',','.'); ?></span><br />
									<?php echo $sell->email_cliente; ?><br />
									<?php echo $sell->tel_cliente; ?><br />
									<input type="hidden" id="idsell<?php echo $sell->id_sell; ?>" value="<?php echo $sell->id_sell; ?>">
									<a id="<?php echo $sell->id_sell; ?>" style="cursor:pointer">Clique para observações</a>
									
									<?php 
										if($sell->id_user == $_SESSION['admin']['iduser']){

											if($sell->status == 1){
												echo "<span class='label label-warning status' onclick='updateStatus($sell->id_sell, $sell->id_produto)' style='float:right'>Negociando</span>";	
											}elseif($sell->status == 2){
												echo "<span class='label label-success status' onclick='updateStatus($sell->id_sell, $sell->id_produto)' style='float:right'>Vendido</span>";	
											}elseif($sell->status == 3){
												echo "<span class='label label-danger status' onclick='updateStatus($sell->id_sell, $sell->id_produto)' style='float:right'>Cancelado</span>";	
											}
										// nao podera altera status se for venda de outros usuarios	
										}else{

											if($sell->status == 1){
												echo "<span class='label label-warning' style='float:right'>Negociando</span>";	
											}elseif($sell->status == 2){
												echo "<span class='label label-success' style='float:right'>Vendido</span>";	
											}else{
												echo "<span class='label label-danger' style='float:right'>Cancelado</span>";	
											}
										}

									?> 
									<div id="box_obs<?php echo $sell->id_sell; ?>" class="venda-obs" style="color:gray;display:none;margin-top:5px"><?php echo $sell->obs; ?><br /><br /> <span><a class="add-obs" id="obs<?php echo $sell->id_sell; ?>">Adicionar Informações</a></span></div>
								</div>
								<script>
										// ver observaçoes de processo de vendas
										$('#<?php echo $sell->id_sell; ?>').click(function(){
											$('#box_obs<?php echo $sell->id_sell; ?>').toggle('fade');
										});

										// fazer modificaçoes nas observaçoes
										$('#obs<?php echo $sell->id_sell; ?>').click(function(){

												$('#add_obs<?php echo $sell->id_sell; ?>').dialog({
													open,
													modal:true,
													resizable: false,
													width: 460,
													height:260,
													buttons: {
														"OK": function(){
															var updateobs = $('#sellobs<?php echo $sell->id_sell; ?>').val();

															var idsell = $('#idsell<?php echo $sell->id_sell; ?>').val();

															$.post('<?php echo site_url()?>vendas/updateObs', {updateobs:updateobs, idsell:idsell})
															.done(function(data){
																if(data == "Atualizado com Sucesso!"){
																	$('#update_obs').dialog({
																		modal:true
																	});	
																}

															});
															setTimeout(function(){location.reload()}, 1000);
															return false;

														},
														"Cancelar":function(){
															$('#sellobs<?php echo $sell->id_sell; ?>').val('');
															$('#add_obs<?php echo $sell->id_sell; ?>').dialog('close');
															setTimeout(function(){location.reload()}, 400);
														}

													}

												});

										});

								</script>
								<div id="add_obs<?php echo $sell->id_sell; ?>" style="margin-top:15px;text-align:center;display:none" title="Observação">
									<textarea class="textarea-obs" id="sellobs<?php echo $sell->id_sell; ?>" rows="7" cols="56" style="resize:none"><?php echo $sell->obs; ?></textarea>										
								</div><!-- end update status modal -->
								<?php endforeach; ?>
									</div>
								
							<?php endif; ?>
							</div> <!-- end col-lg-6 -->
						</div>
						<div class="row">
							<div class="col-md-12 footer" style="height:75px;text-align:center;">
								© Sistema SellControl / FS System <?php echo date('Y');?> - Todos os Direitos Reservados
							</div>
						</div>
						<!-- modal editar venda -->
					<div id="modal_edit_venda" title="Editar Venda" style="display:none">		<br />	
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
						</div><br />
						<div class="input-group">
						  <span class="input-group-addon" id="basic-addon1">
						  	<i class="fa fa-sort" aria-hidden="true"></i>
						  </span>
						  <input type="text" name="edit_qtde_prod" id="edit_qtde_prod" class="form-control" placeholder="Quantidade em estoque" required aria-describedby="basic-addon1">
						</div><br />
						<div class="input-group">
						  <span class="input-group-addon" id="basic-addon1">
						  	<i class="fa fa-sort" aria-hidden="true"></i>
						  </span>
						  <input type="text" name="edit_qtde_prod" id="edit_qtde_prod" class="form-control" placeholder="Quantidade em estoque" required aria-describedby="basic-addon1">
						</div><br />
						<input type="hidden" name="hidden_id_prod" id="hidden_id_prod" />
					  </form>
					</div> <!-- end modal -->
					</div>
					<script>
									 	function updateStatus(idsell, idproduto){
									 		
								 			// mudar status de venda					
											$('#mudar_status').dialog({
												width:250,
												modal:true
											}); 

											$('#novostatus').change(function(){
												var novostatus = $('#novostatus').val();
												
												$.post('<?php echo site_url()?>vendas/updateStatusVenda',{idsell : idsell, novostatus : novostatus, idproduto :idproduto})
												.done(function(data){
													
												}); 

												setTimeout(function(){location.reload()}, 1000);
												return false;
											});
								 		}
									 </script>
					
					<div id="msg_success" style="display:none">
					  <p style="text-align:center;margin-top:20px"><span class="ui-icon ui-icon-alert"></span> Processo de venda registrado com sucesso!</p>
					</div><!-- end basic modal -->
					<div id="msg_error" style="display:none">
					  <p style="text-align:center;margin-top:20px"><span class="ui-icon ui-icon-alert"></span>Não foi possivel registrar.</p>
					</div><!-- end basic modal -->
					<div id="msg_error2" style="display:none">
					  <p style="text-align:center;margin-top:20px"><span class="ui-icon ui-icon-alert"></span>Por favor, selecione o produto.</p>
					</div><!-- end basic modal -->
					<div id="msg_error3" style="display:none">
					  <p style="text-align:center;margin-top:20px"><span class="ui-icon ui-icon-alert"></span>Por favor, selecione o status.</p>
					</div><!-- end basic modal -->
					<div id="update_obs" style="display:none">
					  <p style="text-align:center;margin-top:20px"><span class="ui-icon ui-icon-alert"></span>Atualizado com Sucesso!</p>
					</div><!-- end basic modal -->
					<div id="excluir_sell_msg" style="display:none">
					  <p style="text-align:center;margin-top:20px"><span class="ui-icon ui-icon-alert"></span>Falha ao tentar excluir.</p>
					</div><!-- end basic modal -->
					<div id="excluir_sell" title="Excluir Venda" style="display:none">
					  <p style="text-align:center;margin-top:20px"><span class="ui-icon ui-icon-alert"></span>Tem certeza que deseja excluir?</p>
					</div><!-- end basic modal -->
					<div id="msg_branco" style="display:none">
					  <p style="text-align:center;margin-top:20px;text-align:center"><span class="ui-icon ui-icon-alert"></span>Favor digite algo.</p>
					</div><!-- end basic modal -->
					<div id="mudar_status" style="margin-left:35px;margin-top:25px;text-align:center;display:none" title="Mudar status">
										
							<select id="novostatus" class="form-control" style="width:150px;">
						  	<option value="00">Novo status</option>
						  	<option value="1">Negociando</option>
						  	<option value="2">Vendido</option>
						  	<option value="3">Cancelado</option>
						  </select>
					</div><!-- end update status modal -->
					
				</div>
			</div>
		</div>

	</body>
	<script type="text/javascript">

		// mask for form's phone number
		$('#phone_cliente').mask('(99) 99999-9999');

		$(function(){
			// mask for product's money
			$('#preco_venda').maskMoney({symbol:'', showSymbol:true, thousands:'.', decimal:',', symbolStay: true});

		});
		

		// tootip
		$( function() {
		    $( document ).tooltip({
		      position: {
		        my: "center bottom-20",
		        at: "center top",
		        using: function( position, feedback ) {
		          $( this ).css( position );
		          $( "<div>" )
		            .addClass( "arrow" )
		            .addClass( feedback.vertical )
		            .addClass( feedback.horizontal )
		            .appendTo( this );
		        }
		      }
		    });
		  } );

		
		// cadastra nova venda no sistema
		$('#form_venda').submit(function(){

			if($('#prod_venda').val() == '00'){

				$('#msg_error2').dialog({
					modal:true
				});
				return false;
			}
			
			if($('#status_venda').val() == '00'){

				$('#msg_error3').dialog({
					modal:true
				});
				return false;
			}

			var dados = $('#form_venda').serialize();

			$.post('<?php echo site_url()?>Vendas/novaVenda', dados)
			.done(function(data){
				if(data == "Não foi possivel registrar."){
					$("#msg_error").dialog({
						width:450,
						modal:true
					});

					setTimeout(function(){location.reload()}, 1900);
					return false;

				}
			});

			$("#msg_success").dialog({
				width:450,
				modal:true
			});
			setTimeout(function(){location.reload()}, 1500);
			return false;
		});

		function excluirSell(id, idProduto)
		{
			var idSell = id;
			var idProduto = idProduto;
			
			$('#excluir_sell').dialog({
				modal:true,
				resizable:false,
				buttons:{
					"Sim": function(){
						$.post('<?php echo site_url()?>vendas/excluirSell', {idSell:idSell, idProduto:idProduto})
						.done(function(data){
							if(!data)
							{
								
								$('#excluir_sell_msg').dialog({
									modal:true,
									resizable:false
								});
								
							}
							

						});

						setTimeout(function(){location.reload()}, 1000);
						return false;
					},
					"Cancelar": function(){
						$('#excluir_sell').dialog('close');
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
