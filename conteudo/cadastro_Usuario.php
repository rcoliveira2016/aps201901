<?php 
  require_once('../permissoes.php');
  verficar_permissao($_permissaoUsuario);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Cadastro de Discípulo</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/custom.css">
	<link href="../css/sistema.css" rel="stylesheet">
</head>
<body>
<?php 
	require_once('../templates/header.php') ?>
	<div class='container'>
		<fieldset>
			<legend><h1>Formulário - Cadastro de Usuario</h1></legend>
			
			<form action="action_usuario.php" method="post" id='form-contato' enctype='multipart/form-data'>


			    <div class="form-group col-md-6">
			      <label for="Nome Do Usuario">Nome Do Usuario:</label>
			      <input type="text" class="form-control" required id="nomeCompleto" name="nomeCompleto">
			    </div>
			    <div class="form-group col-md-6">
					<label for="email">E-mail:</label>
				    <input type="Text" class="form-control" required id="email" name ="email">
				</div>
				<div class="form-group col-md-6">
					<label for="senha">Senha:</label>
				    <input type="password" class="form-control" required id="senha" name ="senha">
				</div>
				<div class="form-group col-md-6">
					<label for="status">Nivel de Acesso</label>
					<select required class="form-control" name="niveisacesso" id="niveisacesso">
						<option value="">Selecione o Nivel de Acesso</option>
						<option value="Doze">Doze</option>
						<option value="Lider">Lider</option>
						<option value="Comprometido">Comprometido</option>
					</select>
					<span class='msg-erro msg-grupo'></span>
			    </div>
				<div class="form-group col-md-12">
			    	<!-- <input type="hidden" name="acao" value="incluir"> -->
			    	<button type="submit" class="btn btn-primary" id='botao'> 
			      		Gravar
			   		</button>
			    	<a href='lista_Usuario.php' class="btn btn-danger">Cancelar</a>
				</div>
			</form>
		</fieldset>
	</div>
	<script src="../lib/jquery/jquery.min.js"></script>
	<script src="../lib/owl.carousel/owl-carousel/owl.carousel.min.js"></script>
	<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="../js/efeitos.js"></script>
</body>
</html>