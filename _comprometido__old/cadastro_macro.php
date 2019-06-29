<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Cadastro de lider</title>
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
			<legend><h1>Formulário - Cadastro de Macro</h1></legend>
			
			<form action="action_macro.php" method="post" id='form-contato' enctype='multipart/form-data'>
				<div class="row">
				            <div class="form-group col-md-6">
							     <label for="Nome Do macro">Nome Do Macro:</label>
				                 <input type="Text" class="form-control" id="nome_macro"  name ="nome_macro">
				            </div>
				            
			    <div class="form-group col-md-6">
			      <label for="status">Status</label>
			      <select class="form-control" name="status" id="status">
				    <option value="">Selecione o Status</option>
				    <option value="Ativo">Ativo</option>
				    <option value="Inativo">Inativo</option>
				  </select>
				  <span class='msg-erro msg-status'></span>
			    </div>

			    <input type="hidden" name="acao" value="incluir">
			    <button type="submit" class="btn btn-primary" id='botao'> 
			      Gravar
			    </button>
			    <a href='lista_macro.php' class="btn btn-danger">Cancelar</a>
			</form>
		</fieldset>
	</div>
	<script type="text/javascript" src="../js/custom_macro.js"></script>
</body>
</html>