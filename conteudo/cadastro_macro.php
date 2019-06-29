<?php 
  require_once('../permissoes.php');
  verficar_permissao($_permissaoCadastro);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Cadastro de lider</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/custom.css">
	<link href="../css/sistema.css" rel="stylesheet">
</head>
<body>
	<?php require_once('../templates/header.php') ?>
	<div class='container'>
		<fieldset>
			<legend><h1>Formulário - Cadastro de Macro</h1></legend>
			
			<form action="action_macro.php" method="post" id='form-contato' enctype='multipart/form-data'>
				<div class="row">
					<div class="form-group col-md-6">
							<label for="Nome Do macro">Nome Do Macro:</label>
							<input type="Text" class="form-control" id="nome_macro" required name="nome_macro">
					</div>
				            
					<div class="form-group col-md-6">
						<label for="status">Status</label>
						<select class="form-control" required name="status" id="status">
							<option value="">Selecione o Status</option>
							<option value="Ativo">Ativo</option>
							<option value="Inativo">Inativo</option>
						</select>
						<span class='msg-erro msg-status'></span>
					</div>					
				</div>
				<div class="row">
					<div class="col-md-12">
						<input type="hidden" name="acao" value="incluir">
						<button type="submit" class="btn btn-primary" id='botao'> 
							Gravar
						</button>
						<a href='lista_macro.php' class="btn btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
		</fieldset>
	</div>
	<script src="../lib/jquery/jquery.min.js"></script>
	<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="../js/efeitos.js"></script>
	<script type="text/javascript" src="../js/custom_macro.js"></script>
</body>
</html>