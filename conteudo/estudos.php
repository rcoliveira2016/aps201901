<?php
	require_once('../permissoes.php');
	verficar_permissao($_permissaoEstudosCelula);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Igreja Caminho Pleno</title>
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link href="../css/sistema.css" rel="stylesheet">
	</head>
	<body>
		<?php require_once('../templates/header.php') ?>
		<div class="container-fluid">
			<h3 class="display-1">Estudos Fevereiro</h3>
				<a href="estudos\ESTUDO DE CELULA 1.pdf">1. PRINCÍPIOS PARA UMA VIDA FELIZ </a><br>
				<a href="estudos\ESTUDO DE CELULA 2.pdf">2. ULTIMAS INSTRUÇÕES DE JESUS AOS SEUS DISCÍPULOS</a><br>
				<a href="estudos\ESTUDO DE CELULA 3.pdf">3. CONDIÇÕES PARA PERMANECER EM CRISTO E AS  BÊNÇÃOS QUE ISTO TRAZ</a><br>
				<a href="estudos\ESTUDO DE CELULA 4.pdf">4. COMO SER CHEIO DO ESPÍRITO SANTO </a><br>
				<a href="estudos\ESTUDO DE CELULA 5.pdf">5. A DIFERENÇA ENTRE FÉ E ESPERANÇA </a><br>		
		</div>
		<script src="../lib/jquery/jquery.min.js"></script>
		<script src="../lib/owl.carousel/owl-carousel/owl.carousel.min.js"></script>
		<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
		<script src="../js/efeitos.js"></script>

	</body>
</html>
