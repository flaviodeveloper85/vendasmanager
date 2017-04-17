<?php
	date_default_timezone_set('America/Sao_Paulo');
		
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
							<i class="fa fa-check-square-o" aria-hidden="true"></i> Administrador <?php echo $_SESSION['admin']['username'] ?> logado
						</div>
						<div class="col-lg-1 admin-header" >
							<a href="<?php echo site_url();?>login/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> sair</a>
						</div>
						<div class="row" style="color:#337ab7">
							<div class="col-lg-3">
								<div style="text-align:center;position:relative;top:20px;">
									<h1 style="font-family:impact;margin-bottom:30px"><i class="fa fa-search fa-2x" style="color:#e97416" aria-hidden="true"></i> CÓDIGO DA VENDA</h1>
									<div style="float:left;position:relative;left:40px;width:170px;">
									<form id="form_search" method="post">
										<input type="text" placeholder="Informe codigo da venda" class="form-control input-sm" name="id_venda" id="id_venda"></div>
										<button type="button" class="btn btn-warning btn-sm" style="position:relative;left:50px;float:left" id="bt_buscar">BUSCAR</button>		
									</form>
										<br><br><br>
									<div style="margin-bottom:15px;position:relative;left:40px;width:255px">
										<p style="text-align:left">Buscar por ano
										<?php if(!$years_sell): ?>
										<select class="form-control" disabled id="filter_ano" name="filter_ano">
												<option value="00">Selecione o ano</option>
											<?php foreach($years_sell as $years): ?>
												<option value="<?php echo $years->yearssell;?>"><?php echo $years->yearssell;?></option>
											<?php endforeach; ?>
										</select></p>
										<?php else: ?>
										<select class="form-control" id="filter_ano" name="filter_ano">
												<option value="00">Selecione o ano</option>
											<?php foreach($years_sell as $years): ?>
												<option value="<?php echo $years->yearssell;?>"><?php echo $years->yearssell;?></option>
											<?php endforeach; ?>
										</select></p>
										<?php endif; ?>
									</div>

									<div style="margin-bottom:30px;position:relative;left:40px;width:255px">
										<?php if(!$years_sell): ?>
										<p style="text-align:left">Buscar por mês
										<select class="form-control" disabled name="filter_mes" id="filter_mes">
											<option value="00">Selecione o mês</option>
											<option value="01">janeiro</option>
											<option value="02">fevereiro</option>
											<option value="03">março</option>
											<option value="04">abril</option>
											<option value="05">maio</option>
											<option value="06">junho</option>
											<option value="07">julho</option>
											<option value="08">agosto</option>
											<option value="09">setembro</option>
											<option value="10">outubro</option>
											<option value="11">novembro</option>
											<option value="12">dezembro</option>
										</select></p>
										<?php else: ?>
											<p style="text-align:left">Buscar por mês
										<select class="form-control" name="filter_mes" id="filter_mes">
											<option value="00">Selecione o mês</option>
											<option value="01">janeiro</option>
											<option value="02">fevereiro</option>
											<option value="03">março</option>
											<option value="04">abril</option>
											<option value="05">maio</option>
											<option value="06">junho</option>
											<option value="07">julho</option>
											<option value="08">agosto</option>
											<option value="09">setembro</option>
											<option value="10">outubro</option>
											<option value="11">novembro</option>
											<option value="12">dezembro</option>
										</select></p>
										<?php endif; ?>
									</div>

									<div style="margin-bottom:15px;position:relative;left:40px;width:255px">
									<?php if(!$years_sell): ?>
										<p style="text-align:left">
										<input type="checkbox" disabled value="3" name="3" id="chk_canceladas"/> Buscar somente vendas canceladas</p>
										<?php else: ?>
										<p style="text-align:left">
										<input type="checkbox" value="3" name="3" id="chk_canceladas"/> Buscar somente vendas canceladas</p>
										<?php endif; ?>
									</div>
									<div style="text-align:center;font-size:14px;margin-top:200px">
										<a href="<?php echo site_url();?>login"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> voltar tela principal</a>
									</div>
									
								</div>
								
							</div>
							<div class="col-lg-9">
								<div class="box-report" style="position:relative;top:20px;height:650px;width:950px">
									
									<h1 style="font-family:impact;margin-bottom:30px">
								<i class="fa fa-bar-chart fa-2x" aria-hidden="true"></i>
								HISTÓRICO</h1>
								<h3 style="font-size:16px">Para ver total de vendas de um periodo, utilize o filtro no lado esquerdo da tela. Buscas com informações completa, informe código da venda</h3>
								<table id="table_sell" class='table table-bordered' style='font-size:12px'>
									    <thead>
									      <tr>
									        <th>Nome Cliente</th>
									        <th>Telefone</th>
									        <th>Produto</th>
									        <th>Valor Venda</th>
									        <th>Data Compra</th>
									        <th>Feita por</th>
									        <th>Vend./Canc.</th>
									        <th>Cod</th>
									      </tr>
									    </thead>
									    
								    </table>
								    <div style="float:right;font-weight:bold" id="total_vendas">
									</div>
									
								
							</div>	
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 footer" style="height:75px;text-align:center;">
								© Sistema SellControl / FS System <?php echo date('Y');?> - Todos os Direitos Reservados
							</div>
							<!-- Modal -->
							<div id="modal_sell" class="modal fade" data-backdrop="static" role="dialog">
							  <div class="modal-dialog modal-lg">

							    <!-- Modal content-->
							    <div class="modal-content" style="background:#f5f5f5">
							      <div class="modal-body">
							      <h1 id="header1" style="font-size:20px;color:#337ab7;margin-bottom:30px;font-family:impact">SELLCONTROL - HIDROFORTE</h1>
							      <hr>
							      <h2 id="header_search" style="color:#337ab7;margin-bottom:30px;font-family:impact"></h2>
							      
							        <table class="table table-bordered" style="font-size:12px">
									    <thead>
									      <tr>
									        <th style="text-align:center">Nome Cliente</th>
									        <th style="text-align:center">Telefone</th>
									        <th style="text-align:center">Email</th>
									        <th style="text-align:center">Produto</th>
									        <th style="text-align:center">Valor Venda</th>
									        <th style="text-align:center">Data Compra</th>
									        <th style="text-align:center">Feita por</th>
									        
									      </tr>
									    </thead>
									    <tbody>
									      <tr style="text-align:center">
									        <td id="cliente"></td>
									        <td id="tel_cliente"></td>
									        <td id="email_cliente"></td>
									        <td id="produto"></td>
									        <td id="valor"></td>
									        <td id="data_compra"></td>
									        <td id="feitapor"></td>
									      </tr>
									      <tr>
									      	<td colspan="7" id="obs_venda">
									      		
									      	</td>
									      </tr>
									    </tbody>
									  </table>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Fechar</button>
							      </div>
							    </div>
								<div id="msg_error" style="display:none">
								  <p style="text-align:center;margin-top:20px"><span class="ui-icon ui-icon-alert"></span>Nenhuma venda com código correspondente.</p>
								</div><!-- end basic modal -->
								<div id="msg_error2" style="display:none">
								  <p style="text-align:center;margin-top:20px"><span class="ui-icon ui-icon-alert"></span>Campo em branco.</p>
								</div><!-- end basic modal -->
								
							  </div>

							</div><!-- fim modal search-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<script type="text/javascript">
	$(function(){
		$("#bt_buscar").click(function(){
			var id_venda = $('#form_search').serialize();
			if($('#id_venda').val() == '')
			{
				$('#msg_error2').dialog({
					modal:true,
					resizable:false
				});
				return false;
			}
			$.post('<?php echo site_url()?>historico/getSell', id_venda)
			.done(function(data){
				if(data == "Código inválido.")
				{
					$('#msg_error').dialog({
						modal:true,
						resizable:false
					});
					return false;
				}
				$('#modal_sell').modal();
				var result = JSON.parse(data);
				$('#cliente').html(result.cliente);
				$('#tel_cliente').html(result.tel);
				$('#email_cliente').html(result.email);
				$('#produto').html(result.produto);
				$('#valor').html(result.valor);
				$('#data_compra').html(result.data);
				$('#feitapor').html(result.feitapor);
				$('#header_search').html('Informações sobre a venda de '+result.cliente);
				if(result.obs == "")
				{
					$('#obs_venda').html("<i>Nao há informaçoes adicionais.</i>");
					return false;
				}
				$('#obs_venda').html(result.obs);
				
			});	
		});


	});	

	// carrega historico de vendas na view por ajax
		$.post("<?php echo site_url()?>historico/getSells")
		.done(function(data){
			if(data == false)
			{
				$('#table_sell').html("Nenhuma venda registrada.");
			}
			$('#table_sell').append(data);
		});

		$('#filter_ano').change(function(){

			var filter_mes = $('#filter_mes').val();
			var filter_ano = $('#filter_ano').val();
			var sell_cancel;

			if(!$('#chk_canceladas').prop('checked'))
			{
				$('#chk_canceladas').val('');

			}else{

				$('#chk_canceladas').val('3');
			}

			sell_cancel = $('#chk_canceladas').val();

			$.post('<?php echo site_url();?>historico/getSellByFilter', {filter_mes:filter_mes,sell_cancel:sell_cancel,filter_ano:filter_ano})
			.done(function(data){
				$('#table_sell').html("<table class='table table-bordered'><thead><th>Nome Cliente</th><th>Telefone</th><th>Produto</th><th>Valor Venda</th><th>Data Venda</th><th>Feita Por</th><th>Vend./Canc.</th><th>Cod</th></thead>"+data+"</table>");
			});

			$.post("<?php echo site_url()?>historico/getTotalSell", {filter_mes:filter_mes, sell_cancel:sell_cancel, filter_ano:filter_ano})
			.done(function(data){
					if(data == false)
					{
						$('#total_vendas').html("NAO HA VENDAS NESSE PERIODO");
						return false;
					}
				$('#total_vendas').html("TOTAL VENDAS: R$ "+data);
			});

		});

		// selecionando o select do filtro retorna as vendas
		$('#filter_mes').change(function(){

			var filter_mes = $('#filter_mes').val();
			var filter_ano = $('#filter_ano').val();
			var sell_cancel;

			if(!$('#chk_canceladas').prop('checked'))
			{
				$('#chk_canceladas').val('');

			}else{

				$('#chk_canceladas').val('3');
			}

			sell_cancel = $('#chk_canceladas').val();
			
			$.post("<?php echo site_url()?>historico/getSellByFilter", {filter_mes:filter_mes, sell_cancel:sell_cancel, filter_ano:filter_ano})
			.done(function(data){
				$('#table_sell').html("<table class='table table-bordered'><thead><th>Nome Cliente</th><th>Telefone</th><th>Produto</th><th>Valor Venda</th><th>Data Venda</th><th>Feita Por</th><th>Vend./Canc.</th><th>Cod</th></thead>"+data+"</table>");
				

			});

			$.post("<?php echo site_url()?>historico/getTotalSell", {filter_mes:filter_mes, sell_cancel:sell_cancel, filter_ano:filter_ano})
			.done(function(data){
					if(data == false)
					{
						$('#total_vendas').html("NAO HA VENDAS NESSE PERIODO");
						return false;
					}
				$('#total_vendas').html("TOTAL VENDAS: R$ "+data);
			});

		}); 

		// inicializa pagina com total de vendas
		$.post("<?php echo site_url()?>historico/getTotalSell")
		.done(function(data){
			$('#total_vendas').html("TOTAL VENDAS: R$ "+data);
		});

		$('#chk_canceladas').change(function(){

			var filter_mes = $('#filter_mes').val();
			var filter_ano = $('#filter_ano').val();
			var sell_cancel;

			if(!$('#chk_canceladas').prop('checked'))
			{
				$('#chk_canceladas').val('');

			}else{

				$('#chk_canceladas').val('3');
			}

			sell_cancel = $('#chk_canceladas').val();

			$.post('<?php echo site_url()?>historico/getSellByFilter', {sell_cancel:sell_cancel, filter_mes:filter_mes, filter_ano:filter_ano })
			.done(function(data){

				$('#table_sell').html("<table class='table table-bordered'><thead><th>Nome Cliente</th><th>Telefone</th><th>Produto</th><th>Valor Venda</th><th>Data Venda</th><th>Feita Por</th><th>Vend./Canc.</th><th>Cod</th></thead>"+data+"</table>");
				$('#total_vendas').toggle();
			});

			$.post("<?php echo site_url()?>historico/getTotalSell", {filter_mes:filter_mes, sell_cancel:sell_cancel, filter_ano:filter_ano})
			.done(function(data){
					if(data == false)
					{
						$('#total_vendas').html("NAO HA VENDAS NESSE PERIODO");
						return false;
					}
				$('#total_vendas').html("TOTAL VENDAS: R$ "+data);
			});

			
	});	

		$('#novostatus').change(function(){
				var status = $('#novostatus').val();

				$.post('<?php echo site_url();?>', status)
				.done(function(){

				});
				
		});
		
	</script>
</html>
