<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Igreja Caminho Pleno</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="css/sistema.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
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
						    <li><a href="lista_lider.php">Lider</a></li>
						    <li><a href="lista_macro.php">Macro</a></li>
					     </ul>
			      	</li>
			      	<li><a href="lista_presenca.php">Celulograma</a></li>
			      	<li><a href="relatorio.php">Relatorios</a></li>
			      	<li class="dropdown">
				        <a class="dropdown-toggle" data-toggle="dropdown">Usuario<span class="caret"></span></a>
					        <ul class="dropdown-menu">
						        <li><a href="cadastro_usuario.php">Cadastro Usuario</a></li>
						        <li><a href="cadastro_nivel_acesso.php">Nivel de Acesso</a></li>
					        </ul>
			      	</li>
			      	<li class="dropdown">
			        	<a href="sair.php">Sair</a>
			      	</li>
		    	</ul>
	  		</div>
		</nav>
	</header>
	<div class="row col-md-6">
		<ul class="list-group">
			<li><a>Membros</a></li>
			<li><a>Celulograma</a></li>
		</ul>
	</div>


<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/owl.carousel/owl-carousel/owl.carousel.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script src="js/efeitos.js"></script>
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>