<?php

		// validaçao de session
		if(!isset($_SESSION['admin']))
		{
			session_unset();
			redirect('');
		}

		$meses = array(
			'01' => 'janeiro',
			'02' => 'fevereiro',
			'03' => 'março',
			'04' => 'abril',
			'05' => 'maio',
			'06' => 'junho',
			'07' => 'julho',
			'08' => 'agosto',
			'09' => 'setembro',
			'10' => 'outubro',
			'11' => 'novembro',
			'12' => 'dezembro'
			);

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
						
						<div class="row">
							<div class="col-lg-3 menu" style="padding:40px">
								<?php 
									if($result)
									{
										$status = "";
										foreach($result as $cont){
											$status =  $cont->result_status;

										}
										echo "<h2 style='color:#337ab7;font-family:impact;font-size:20px'>VOCÊ POSSUI <br>$status VENDA(S) ANTIGA(S) 'NEGOCIANDO'</h2>";	
									
									
								?>
								<table id="table_sell" class='table table-bordered' style='font-size:10px'>
								<?php foreach($result as $neg):  ?>
									    <tbody>
									      <tr style="text-align:center">
									        <td><?php echo $neg->nome_cliente;?></td>
									        <td><?php echo $neg->name_produto;?></td>
									        <td><?php echo date('d.m.Y', strtotime($neg->created_sell));?></td>
									        <td id="cell_id_sell"><?php echo $neg->id_sell;?>
									        </td>
									        <td><a class="muda_status" onclick="sellOld(<?php echo $neg->id_sell;?>);">mudar status</a></td>
									      </tr>
									    </tboby>
							    <?php endforeach;?>
								    </table>

								    <p style="font-size:12px">Troque de status (vendido ou cancelado). Para mais informaçoes, utilize o código da venda. <!--Para informaçoes detalhadas, procure um administrador e informe o código da venda.--></p>
						    <?php } ?><!-- final condiçao end -->
							</div>
							<div class="col-lg-8 menu">
							
								<div style="position:relative;padding:30px;height:400px; margin-top:250px;color:gray">
									<!--vendas-->
									
									<a href="<?php echo site_url()?>vendas">
									<div class="box-item">
										<i class="fa fa-shopping-cart" aria-hidden="true" style="font-size:38px"></i><br />
										<span style="font-weight:bold">VENDAS</span>
									</div>
									</a>
									
									<a href="<?php echo site_url();?>CadastroUser">
									<div class="box-item">
										<i class="fa fa-plus-circle" aria-hidden="true" style="font-size:38px"></i><br />
										<span style="font-weight:bold">CADASTRO</span>
									</div>
									</a>
									<a href="<?php echo site_url()?>historico">
									<div class="box-item">
										<i class="fa fa-bar-chart" aria-hidden="true" style="font-size:38px"></i><br />
										<span style="font-weight:bold">HISTÓRICO</span>
									</div>
									</a>
									<a href="<?php echo site_url()?>ranking">
									<div class="box-item">
										<i class="fa fa-trophy" aria-hidden="true" style="font-size:38px"></i><br />
										<span style="font-weight:bold">RANKING</span>
									</div>
									</a>
									<!--
									<a href="">
									<div class="box-item">
										<i class="fa fa-desktop" aria-hidden="true" style="font-size:38px"></i><br />
										<span style="font-weight:bold">MURAL</span>
									</div>
									</a>-->
									<a href="<?php echo site_url()?>conta">
									<div class="box-item">
										<i class="fa fa-edit" aria-hidden="true" style="font-size:38px"></i><br />
										<span style="font-weight:bold">EDITAR CONTA</span>
									</div>
									</a>
								</div>
							</div>
							<div class="col-lg-1 menu"></div>
								
						</div>
						<div class="row">
							<div class="col-md-12">
								<div id="notification" style="text-align:center;font-size:11px;font-family:verdana;color:#337ab7;position:relative;bottom:80px"></div>	
							</div>
						</div>
						<div class="row">

							<div class="col-md-12 footer" style="height:75px;text-align:center;">
								© Sistema SellControl / FS System <?php echo date('Y');?> - Todos os Direitos Reservados
							</div>
						</div>
					</div>
				</div>
				<div id="mudar_status" style="margin-left:55px;margin-top:25px;text-align:center;display:none" title="Mudar status">
										
							<select id="novostatus" class="form-control" style="width:150px;">
						  	<option value="00">Novo status</option>
						  	<option value="2">Vendido</option>
						  	<option value="3">Cancelado</option>
						  </select>
					</div><!-- end update status modal -->
			</div>
		</div>
	</body>
	<script type="text/javascript">
		
		// ajax para retorna as vendas acontecendo no mes corrente (atual)
		$.post('<?php echo site_url()?>vendas/lastSell')
		.done(function(data){
			$('#notification').html("<i class='fa fa-cube' aria-hidden='true'></i> "+data+" produto(s) vendido(s) no mês de <?php echo $meses[date('m')].'/'.date('Y'); ?>");
		});

		//carrega div com select status
		$('.muda_status').click(function(){
			
			$('#mudar_status').dialog({
				modal:true,
				resizable:false
			}); 

		});

		function sellOld(idSell)
		{
			var id_sell = idSell;

			$('#novostatus').change(function(){
			
			var novo_status = $('#novostatus').val();	

			$.post('<?php echo site_url()?>vendas/updateStatusOld', {novo_status:novo_status, id_sell:id_sell})
			.done(function(data){

			});

			setTimeout(function(){location.reload()}, 2000);
			});

		}

		
		

	</script>
</html>
