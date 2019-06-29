<?php
	require_once('../permissoes.php');
	verficar_permissao($_permissaoCadastro);
	require '../conexao.php';
	$conexao = conexao::getInstance();
	$sql = 'SELECT nome,idmembro FROM cadmembro WHERE grupo = :lider';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':lider', 'Lider');
	$stm->execute();
	$listaLideres = $stm->fetchAll(PDO::FETCH_OBJ);
	if(!is_array($listaLideres)) $listaLideres = array();
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
	<?php require_once('../templates/header.php') ?>
	<div class='container'>
		<fieldset>
			<legend><h1>Formulário - Cadastro de Discípulo</h1></legend>
			
			<form action="action_discipulo.php" method="post" id='form-contato' enctype='multipart/form-data'>
				
			    <div class="form-group col-md-6">
			      <label for="Nome Do Discípulo">Nome Do Discípulo:</label>
			      <input type="text" class="form-control required" id="nome" name="nome">
			      <span class='msg-erro msg-nome'></span>
			    </div>

			    <div class="form-group col-md-3">
					<label for="rg">RG:</label>
				    <input type="Text" class="form-control" id="rg" name ="rg">
				    <span class='msg-erro msg-rg'></span>
				</div>

				<div class="form-group col-md-3">
			      <label for="cpf">CPF</label>
			      <input type="Text" class="form-control" id="cpf"  name="cpf">
			      <span class='msg-erro msg-cpf'></span>
			    </div>

			    <div class="form-group col-md-3">
			      <label for="data_nascimento">Data de Nascimento</label>
			      <input type="DATE" class="form-control" required id="data" name="data">
			      <span class='msg-erro msg-data'></span>
			    </div>

				<div class="form-group col-md-6">
					<label for="Endereço">Endereço:</label>
				    <input type="Text" class="form-control" required id="endereco" name="endereco">
				    <span class='msg-erro msg-endereco'></span>
				</div>

				<div class="form-group col-md-3">
					<label for="Numero">Numero:</label>
				    <input type="number" class="form-control" required id="numero" name ="numero">
				    <span class='msg-erro msg-numero'></span>
				</div>

				<div class="form-group col-md-5">
					<label for="Complemento">Complemento:</label>
					<input type="Text" class="form-control" id="complemento" name ="complemento">
					<span class='msg-erro msg-complemento'></span>
				</div>

				<div class="form-group col-md-5">
					<label for="Bairro">Bairro:</label>
				    <input type="Text" class="form-control" id="bairro" name ="bairro">
				    <span class='msg-erro msg-bairro'></span>
				</div>

				<div class="form-group col-md-2">
					<label for="CEP">CEP:</label>
				    <input type="Text" class="form-control" id="cep" name ="cep">
				    <span class='msg-erro msg-cep'></span>
				</div>

				<div class="form-group col-md-4">
					<label for="Fone Residencial">Fone Residencial:</label>
				    <input type="Text" class="form-control" id="telefone" name ="telefone">
				    <span class='msg-erro msg-telefone'></span>
				</div>
				<div class="form-group col-md-4">
					<label for="Fone Celular">Fone Celular:</label>
				    <input type="Text" class="form-control" id="celular" required name="celular">
				    <span class='msg-erro msg-celular'></span>
				</div>
				<div class="form-group col-md-4">
				    <label for="Estado Civil">Estado Civil:</label>
				    <input type="Text" class="form-control" id="estadocivil" required name="estadocivil">
				    <span class='msg-erro msg-estadocivil'></span>
				</div>
				<div class="form-group col-md-6">
				    <label for="Naturalidade">Naturalidade:</label>
				    <input type="Text" class="form-control" id="naturalidade" name ="naturalidade">
				    <span class='msg-erro msg-naturalidade'></span>
				</div>
				<div class="form-group col-md-6">
				    <label for="Grau de Instrução">Grau de Instrução:</label>
				    <input type="Text" class="form-control" id="grauinstrucao" name ="grauinstrucao">
				    <span class='msg-erro msg-grauinstrucao'></span>
				</div>
				<div class="form-group col-md-4">
				    <label for="Profissão">Profissão:</label>
				    <input type="Text" class="form-control" id="profissao" name ="profissao">
				    <span class='msg-erro msg-profissao'></span>
				</div>
			    <div class="form-group col-md-4">
			      <label for="email">E-mail</label>
			      <input type="email" class="form-control" id="email" required name="email">
			      <span class='msg-erro msg-email'></span>
			    </div>
			    <div class="form-group col-md-4">
			      <label for="lider">Lider</label>
			      <select class="form-control" name="lider" id="lider"></select>
			    </div>
			    <div class="form-group col-md-4">
					<label for="lider">Macro</label>
					<select class="form-control" required name="idmacro" required id="idmacro">
						<?php
							echo '<option value="">'. "Selecione a Macro" .'</option>';
							$resultado = mysqli_query($conn,"SELECT idmacro,nome_macro FROM cadmacro ORDER BY nome_macro ASC");

							if (! $resultado){
								echo  mysql_error($resultado);
							} else {
								while ($row = mysqli_fetch_assoc($resultado)) {
									
									echo '<option value="'.$row["idmacro"].'">'. $row["nome_macro"] .'</option>';
								}
							}
						?>
				  	</select>
			    </div>
			    <div class="form-group col-md-4">
			      <label for="status">Grupo de Investimento</label>
			      <select class="form-control" required name="grupo" id="grupo">
				  	<option value="">Selecione</option>
				    <option value="abordado">Abordado</option>
				    <option value="simpatizante">Simpatizante</option>
				    <option value="comprometido">Comprometido</option>
				    <option value="lider">Lider</option>
				  </select>
				  <span class='msg-erro msg-grupo'></span>
			    </div>
			    <div class="form-group col-md-4">
			      <label for="status">Status</label>
			      <select class="form-control" name="status" required id="status">
				    <option value="">Selecione o Status</option>
				    <option value="Ativo">Ativo</option>
				    <option value="Inativo">Inativo</option>
				  </select>
				  <span class='msg-erro msg-status'></span>
			    </div>
			    <div class="form-group col-md-6">
			    	<input type="hidden" name="acao" value="incluir">
			    	<button type="submit" class="btn btn-primary" id='botao'> 
			      		Gravar
			   		</button>
			    	<a href='lista_membro.php' class="btn btn-danger">Cancelar</a>
				</div>
			</form>
		</fieldset>
	</div>
	<script src="../lib/jquery/jquery.min.js"></script>
	<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="../js/efeitos.js"></script>
	<script>
		$(document).ready(function() {
			var listaLideres = <?=json_encode($listaLideres)?>;

			var _carregar = function () {
				_carregarSelectLideres();
			};
			
			var _carregarSelectLideres = function () {
				$('#lider').append($('<option>', { value: -1, text: 'Selecione' }));

				listaLideres.forEach(function (lider) {
					$('#lider').append($('<option>', {
						value: lider.idmembro,
						text: lider.nome
					}));
				})
			}

			_carregar();
		});
	</script>
	</body>
</html>