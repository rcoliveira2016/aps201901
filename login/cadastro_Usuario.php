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
			<legend><h1>Formulário - Cadastro de Usuario</h1></legend>
			
			<form action="action_usuario.php" method="post" id='form-contato' enctype='multipart/form-data'>


			    <div class="form-group col-md-6">
			      <label for="Nome Do Usuario">Nome Do Usuario:</label>
			      <input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto">
			    </div>
			    <div class="form-group col-md-6">
					<label for="email">Usuario:</label>
				    <input type="Text" class="form-control" id="email" name ="email">
				</div>
				<div class="form-group col-md-6">
					<label for="senha">Senha:</label>
				    <input type="password" class="form-control" id="senha" name ="senha">
				</div>
				  <div class="form-group col-md-6">
			      <label for="status">Nivel de Acesso</label>
			      <select class="form-control" name="niveisacesso" id="niveisacesso">
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
	<!-- <script type="text/javascript" src="../js/custom_discipulo.js"></script> -->
</body>
</html>