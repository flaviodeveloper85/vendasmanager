$(function(){
	

		// seleciona a tela de acordo com o que selecio no select
		$('#tipo_cadastro').change(function(){

			if($('#tipo_cadastro').val() == "3"){

				var tipocadastro = $('#tipo_cadastro option:selected').text();

				$('#box_user').hide();
				$('#box_produto').fadeIn();

				return false;
			}

			if($('#tipo_cadastro').val() == "1" || "2"){
				
				$('#box_produto').hide();
				$('#box_user').fadeIn();

			}

			if($('#tipo_cadastro').val() == "00"){

				$('#box_user').hide();
				$('#box_produto').hide();
			}

			$('#form_user').submit(function(){

				var tp_cadastro = $('#tipo_cadastro').val();
				var tp_user = $('#tp_user').val(tp_cadastro);

				cadastraUser();

				$('input[type=text]').val('');
				$('input[type=email]').val('');
				$('input[type=phone]').val('');
				return false;

			});

			
		});
		
		// mask for user's phone
		$('#fone_user').mask('(99) 9999-9999');

		// verifica se foi selecionado a quantidade de produtos
		$('#form_produto').submit(function(){
			
			if($('#qtde_prod').val() == '00'){

				$('#msg_qtde_prod').dialog()
				return false;

			}else{

				var tp_cadastro = $('#tipo_cadastro').val();
				cadastraProduto();

				return false;
			}
				
		});

		

	});

