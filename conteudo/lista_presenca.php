<?php
require_once('../permissoes.php');
verficar_permissao($_permissaoCelulograma);
require '../conexao.php';

// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';

// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):

	$conexao = conexao::getInstance();
	$sql = 'SELECT cadmembroLider.nome as nomelider, cadmembro.idmembro, cadmembro.nome, cadmembro.lider FROM cadmembro left join cadmembro cadmembroLider on cadmembroLider.idmembro = cadmembro.lider';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$presencas = $stm->fetchAll(PDO::FETCH_OBJ);

else:

	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = "SELECT cadmembroLider.nome as nomelider, cadmembro.idmembro, cadmembro.nome, cadmembro.lider FROM cadmembro left join cadmembro cadmembroLider on cadmembroLider.idmembro = cadmembro.lider WHERE nome LIKE :nome OR lider LIKE :lider";
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':nome', '%'.$termo.'%');
	$stm->bindValue(':lider', '%'.$termo.'%');
	$stm->execute();
	$presencas = $stm->fetchAll(PDO::FETCH_OBJ);

endif;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Listagem de Macro</title>
	<link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/sistema.css" rel="stylesheet">
</head>
<body>
	<?php require_once('../templates/header.php') ?>
	<div class='container'>
		<div class="alert alert-success" style='display:none' role="alert">
			<strong>Cadastrado com Sucesso</strong>			
		</div>
		<div class="alert alert-danger" style='display:none' role="alert">
			<strong>Erro no cadastro</strong>
		</div>
		<fieldset>		
			<!-- Cabeçalho da Listagem -->
			<legend><h1>Celulograma</h1></legend>

			<!-- Formulário de Pesquisa -->
			<div class="row">
				<form action="" method="get" id='form-contato-listagem' class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-1 control-label">Pesquisar</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="termo" name="termo" value="<?=$termo?>" placeholder="Infome o Nome">
						</div>
						<div class="col-sm-1">
							<button type="submit" class="btn btn-primary">Pesquisar</button>
						</div>
					</div>
				</form>				
			</div>

			<!-- Link para página de cadastro -->
			
			<div class='clearfix'></div>
			<div class="row">
				<form action="action_presenca.php" method="post" id='form-contato' enctype='multipart/form-data'>
					<?php if(!empty($presencas)):?>

						<!-- Tabela de Discípulos -->
						<table class="table table-striped" id="tabela-discipulos">
							<tr class='active'>
								<th>Nome</th>
								<th>Lider</th>
								<th>Data</th>
								<th>Presença</th>							
							</tr>
							<?php foreach($presencas as $key => $presenca):?>
								<tr>
									<td>
										<input type="Text" disabled='true' class="form-control" id="nome"  name="nome" value="<?=$presenca->nome?>">
										<input type="hidden" id="id"  name="id" value="<?=$presenca->idmembro?>">
									</td>
									<td>
										<input type="Text" disabled='true' class="form-control" value="<?=empty($presenca->nomelider)? '----' : $presenca->nomelider?>">										
									</td>
									<td>
										<input type="date" name="data">
									</td>
									<td>
										<select class="form-control" name="presenca" id="presenca">
											<option value="">Selecione</option>
											<option value="p">P</option>
											<option value="f">F</option>
										</select>
									</td>
								</tr>	
							<?php endforeach;?>
						</table>

					<?php else: ?>

						<!-- Mensagem caso não exista Discipulos ou não encontrado  -->
						<h3 class="text-center text-primary">Não existem Presença!</h3>
					<?php endif; ?>
					<button type="submit" class="btn btn-primary" id='botao'> 
						Gravar
					</button>
				</form>
			<div>
		
		</fieldset>
	</div>
	<script src="../js/jquery.js"></script>
	<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="../js/efeitos.js"></script>
	<script>
		$(document).ready(function() {
			
			var _url = './action_presenca.php';

			var _criarDiscipulo = function (id,nome, data, presenca) {
				return {
					id:id,
					nome:nome,
					data:data,
					presenca:presenca
				};
			};

			var _obterListaDiscipulos = function () {
				var listaDiscipulos = [];
				$('#tabela-discipulos tr:not(.active)').each(function (e, index) {
					var id = $(this).find('[name=id]').val();
					var nome = $(this).find('[name=nome]').val();
					var data = $(this).find('[name=data]').val();
					var presenca = $(this).find('[name=presenca]').val();
					
					if(id && nome && data && presenca)
						listaDiscipulos.push(_criarDiscipulo(id,nome,data,presenca));
				});
				return listaDiscipulos
			}

			var _carregarEventoSubmit = function () {
				$('#form-contato').submit(function() {
					var listaDiscipulos = _obterListaDiscipulos();
					if(!listaDiscipulos.length){
						$('.alert-danger').show();
						$('.alert-success').hide();
						return false;
					}			
					$.ajax({
						type: 'POST',
						url: _url,
						data: {listaDiscipulos:listaDiscipulos },
						async: true,
						cache: false,
						success: function (data) {
							$(document).scrollTop(0);
							$('.alert-success').show();
							$('.alert-danger').hide();
							setTimeout(function (){
								location.reload();
							}, 2000);
						},
						error: function (data) {
							$(document).scrollTop(0);
							$('.alert-danger').show();
							$('.alert-success').hide();
						},
					});
					return false;		
				});
			};

			_carregarEventoSubmit();
		});
	</script>
</body>
</html>