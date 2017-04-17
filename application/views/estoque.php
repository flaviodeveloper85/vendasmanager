<?php
	date_default_timezone_set('America/Sao_Paulo');
		
		// validaçao de session
		if(!isset($_SESSION['vendedor']))
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
							<i class="fa fa-check-square-o" aria-hidden="true"></i> Vendedor <?php echo $_SESSION['vendedor']['username'] ?> logado
						</div>
						<div class="col-lg-1 admin-header" >
							<a href="<?php echo site_url();?>login/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> sair</a>
						</div>
						<div class="row" style="color:#337ab7">
							<div class="col-lg-4 menu"></div>
							<div class="col-lg-5 menu">

							<div class="box-edit-conta" style="position:relative;top:20px;height:660px;">
									
									<h1 style="font-family:impact;margin-bottom:50px">
								<i class="fa fa-database fa-2x" aria-hidden="true"></i>
								 ESTOQUE DE PRODUTOS</h1>
									
									<?php if($estoque == null): ?>
										<p style="margin-top:160px">Nao há produtos cadastrados.</p>
									<?php else: ?>
								<table class="table table-bordered" style="font-size:13px">
								    <thead style="background:#337ab7;color:white">
								      <tr style="text-align:center">
								        <th>Produto</th>
								        <th>Preço base</th>
								        <th>Qtde em estoque</th>
								        <th>Ultima atualização</th>
								      </tr>
								    </thead>
								    <tbody>
								    <?php foreach($estoque as $prod): ?>
								      <tr style="text-align:center">
								        <td><?php echo $prod->name_produto; ?></td>
								        <td><?php echo number_format($prod->preco_produto,2,',','.'); ?></td>
								        <td style="color:<?php if($prod->qtde == 0) echo "red"?>"><?php echo $prod->qtde;  ?></td>
								        <td><?php echo date('d.m.Y', strtotime($prod->created)); ?></td>
								      </tr>
								  	<?php endforeach; ?>
								    </tbody>
								  </table>
									<?php endif; ?>
								<div style="position:absolute;top:535px;width:400px;text-align:center;left:20px;font-size:14px">
										<a href="<?php echo site_url();?>login_vendedor"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> voltar tela principal</a>
									</div>
							</div>
							<div class="col-lg-3 menu"></div>
								
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
	</body>
</html>
