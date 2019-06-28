<?php
	include_once ("../conexao.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Cadastro de Discípulo</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/custom.css">
</head>
<body>
	<header>
		<nav class="navbar navbar-inverse">
	  		<div class="container-fluid">
		    	<ul class="nav navbar-nav">
		    		<li><a href="administrativo.php">Home</a></li>
			      	<li><a class="dropdown-toggle" data-toggle="dropdown">Cadastro<span class="caret"></span></a>
					    <ul class="dropdown-menu">
						    <li><a href="lista_membro.php">Membros</a></li>
						    <li><a href="lista_macro.php">Macro</a></li>
					     </ul>
			      	</li>
			      	<li><a href="lista_presenca.php">Celulograma</a></li>
			      	<li><a href="#">Relatorios</a></li>
			      	<li><a href="estudos.html">Estudos de Celula</a></li>
			      	<li class="dropdown">
				        <a class="dropdown-toggle" data-toggle="dropdown">Usuario<span class="caret"></span></a>
					        <ul class="dropdown-menu">
						        <li><a href="../login/lista_usuario.php">Cadastro Usuario</a></li>
						    </ul>
			      	</li>
			      	<li class="dropdown">
			        	<a href="../sair.php">Sair</a>
			      	</li>
		    	</ul>
	  		</div>
		</nav>
	</header>
	<div class='container'>
		<fieldset>
			<legend><h1>Formulário - Cadastro de Discípulo</h1></legend>
			
			<form action="action_discipulo.php" method="post" id='form-contato' enctype='multipart/form-data'>
				
			    <div class="form-group col-md-6">
			      <label for="Nome Do Discípulo">Nome Do Discípulo:</label>
			      <input type="text" class="form-control" id="nome" name="nome">
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
			      <input type="DATE" class="form-control" id="data" name="data">
			      <span class='msg-erro msg-data'></span>
			    </div>

				<div class="form-group col-md-6">
					<label for="Endereço">Endereço:</label>
				    <input type="Text" class="form-control" id="endereco" name="endereco">
				    <span class='msg-erro msg-endereco'></span>
				</div>

				<div class="form-group col-md-3">
					<label for="Numero">Numero:</label>
				    <input type="number" class="form-control" id="numero" name ="numero">
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
				    <input type="Text" class="form-control" id="celular" name ="celular">
				    <span class='msg-erro msg-celular'></span>
				</div>
				<div class="form-group col-md-4">
				    <label for="Estado Civil">Estado Civil:</label>
				    <input type="Text" class="form-control" id="estadocivil" name ="estadocivil">
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
			      <input type="email" class="form-control" id="email" name="email">
			      <span class='msg-erro msg-email'></span>
			    </div>
			    <div class="form-group col-md-4">
			      <label for="lider">Lider</label>
			      <select class="form-control" name="lider" id="lider">
				<?php
					echo '<option value=" ">'. "Selecione o Lider" .'</option>';
					$resultado = mysqli_query($conn,"SELECT IdMembro, nome FROM cadmembro where grupo = 'Lider' ORDER BY nome ASC");

					if (! $resultado){
						echo  mysql_error($resultado);
					} else {
						while ($row = mysqli_fetch_assoc($resultado)) {

						    
						    echo '<option value="'.$row["IdMembro"].'">'. $row["nome"] .'</option>';
						}
					}
				?>
				  </select>
			    </div>
			    <div class="form-group col-md-4">
			      <label for="lider">Macro</label>
			      <select class="form-control" name="idmacro" id="idmacro">
				<?php
					echo '<option value=" ">'. "Selecione a Macro" .'</option>';
					$resultado = mysqli_query($conn,"SELECT nome_macro FROM cadmacro ORDER BY nome_macro ASC");

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
			      <select class="form-control" name="grupo" id="grupo">
				    <option value="">Selecione o Grupo</option>
				     <option value="Lider">Lider</option>
				    <option value="Abordado">Abordado</option>
				    <option value="Simpatizante">Simpatizante</option>
				    <option value="Comprometido">Comprometido</option>
				  </select>
				  <span class='msg-erro msg-grupo'></span>
			    </div>
			    <div class="form-group col-md-4">
			      <label for="status">Status</label>
			      <select class="form-control" name="status" id="status">
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
	</body>
</html>