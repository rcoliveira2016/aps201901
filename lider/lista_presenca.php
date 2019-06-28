<?php
session_start();
require '../conexao.php';

// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';

// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):

	$conexao = conexao::getInstance();
	$sql = 'SELECT idmembro, nome,lider FROM cadmembro';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$presencas = $stm->fetchAll(PDO::FETCH_OBJ);

else:

	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT idmembro, nome, lider FROM cadmembro WHERE nome LIKE :nome OR lider LIKE :lider';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':nome', $termo.'%');
	$stm->bindValue(':lider', $termo.'%');
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
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="../css/sistema.css" rel="stylesheet">
    <script src="../js/ie-emulation-modes-warning.js"></script>
</head>
<body>
<header>
		<nav class="navbar navbar-inverse">
	  		<div class="container-fluid">
		    	<ul class="nav navbar-nav">
		    		<li><a href="lider.php">Home</a></li>
			      	<li><a class="dropdown-toggle" data-toggle="dropdown">Cadastro<span class="caret"></span></a>
					    <ul class="dropdown-menu">
						    <li><a href="lista_membro.php">Membros</a></li>
					     </ul>
			      	</li>
			      	<li><a href="lista_presenca.php">Celulograma</a></li>
			      	<li><a href="estudos.html">Estudos de Celula</a></li>
			      	<li class="dropdown">
			        	<a href="../sair.php">Sair</a>
			      	</li>
		    	</ul>
	  		</div>
		</nav>
	</header>
	<div class='container'>
		<fieldset>

			<!-- Cabeçalho da Listagem -->
			<legend><h1>Celulograma</h1></legend>

			<!-- Formulário de Pesquisa -->
			<form action="" method="get" id='form-contato' class="form-horizontal col-md-10">
				<label class="col-md-2 control-label" for="termo">Pesquisar</label>
				<div class='col-md-7'>
			    	<input type="text" class="form-control" id="termo" name="termo" placeholder="Infome o Nome">
				</div>
			    <button type="submit" class="btn btn-primary">Pesquisar</button>
			    
			</form>

			<!-- Link para página de cadastro -->
			
			<div class='clearfix'></div>
		<form action="action_presenca.php" method="post" id='form-contato' enctype='multipart/form-data'>
			<?php if(!empty($presencas)):?>

				<!-- Tabela de Discípulos -->
				<table class="table table-striped">
					<tr class='active'>
						<th>Nome</th>
						<th>Data</th>
						<th>Presença</th>
						
					</tr>
					<?php foreach($presencas as $key => $presenca):?>
						<tr>
							<td><input type="Text" class="form-control" id="nome"  name ="nome[<?php echo $key; ?>]" value="<?=$presenca->nome?>"></td>
							<td><input type="date" name="dtpresenca[<?php echo $key; ?>]" valor="dtpresenca"></td>
							<td>
								<select class="form-control" name="presenca[<?php echo $key; ?>]" id="presenca">
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
			<input type="hidden" name="acao" value="incluir">
			    <button type="submit" class="btn btn-primary" id='botao'> 
			      Gravar
			    </button>
		</form>
		
		</fieldset>
	</div>
	<script type="text/javascript" src="../js/custom_presença.js"></script>
</body>
</html>