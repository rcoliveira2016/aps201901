<?php
require_once('../permissoes.php');
verficar_permissao($_permissaoCadastro);
require '../conexao.php';

// Recebe o id do discipulo do discipulo via GET
$idmacro = (isset($_GET['id'])) ? $_GET['id'] : '';

// Valida se existe um id e se ele é numérico
if (!empty($idmacro) && is_numeric($idmacro)):

	// Captura os dados do discipulo solicitado
	$conexao = conexao::getInstance();
	$sql = 'SELECT idmacro,nome_macro,status FROM cadmacro WHERE idmacro = :idmacro';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':idmacro', $idmacro);
	$stm->execute();
	$macro = $stm->fetch(PDO::FETCH_OBJ);

	
endif;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Edição de Macro</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/custom.css">
	<link href="../css/sistema.css" rel="stylesheet">
</head>
<body>
	<?php require_once('../templates/header.php') ?>
	<div class='container'>
		<fieldset>
			<legend><h1>Formulário - Edição de Macro</h1></legend>
			
			<?php if(empty($macro)):?>
				<h3 class="text-center text-danger">Macro não encontrado!</h3>
			<?php else: ?>
				<form action="action_macro.php" method="post" id='form-contato' enctype='multipart/form-data'>
					<div class="row">
						<div class="form-group col-md-6">
							<label for="Nome Do Macro">Nome Do Macro:</label>
							<input type="Text" class="form-control" id="nome_macro" required name="nome_macro" value="<?=$macro->nome_macro?>">
							<span class='msg-erro msg-nome_macro'></span>
						</div>
						<div class="form-group col-md-6">
							<label for="status">Status</label>
							<select class="form-control" name="status" required id="status">
								<option value="">Selecionar</option>
								<option value="Ativo">Ativo</option>
								<option value="Inativo">Inativo</option>
							</select>
						</div>						
					</div>
					<div class="row">
						<div class="col-md-12">
							<input type="hidden" name="acao" value="editar">
							<input type="hidden" name="idmacro" value="<?=$macro->idmacro?>">
							<button type="submit" class="btn btn-primary" id='botao'>Gravar</button>
							<a href='lista_macro.php' class="btn btn-danger">Cancelar</a>
						</div>
					</div>
				</form>
			<?php endif; ?>
		</fieldset>

	</div>
	<script src="../lib/jquery/jquery.min.js"></script>
	<script src="../lib/owl.carousel/owl-carousel/owl.carousel.min.js"></script>
	<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="../js/efeitos.js"></script>
	<script>
		$(document).ready(function() {
			var _carregar = function () {
				var valorstatus = <?="'$macro->status'"?>;

				$('#status').val(valorstatus);
			};
			_carregar();
		});
	</script>
</body>
</html>