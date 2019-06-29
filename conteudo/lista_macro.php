<?php
require_once('../permissoes.php');
verficar_permissao($_permissaoCadastro);
require '../conexao.php';

// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';

// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):

	$conexao = conexao::getInstance();
	$sql = 'SELECT idmacro, nome_macro, status  FROM cadmacro' ;
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$macros = $stm->fetchAll(PDO::FETCH_OBJ);

else:

	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = "SELECT idmacro, nome_macro, status  FROM cadmacro WHERE nome_macro like :nome";
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':nome', '%'.$termo.'%');
	$stm->execute();
	$macros = $stm->fetchAll(PDO::FETCH_OBJ);

endif;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Listagem de Macro</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/custom.css">
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="../css/sistema.css" rel="stylesheet">
   
</head>
	<?php require_once('../templates/header.php') ?>
	<div class='container'>
		<fieldset>

			<!-- Cabeçalho da Listagem -->
			<legend><h1>Listagem de Macro</h1></legend>

			<div class="row">
				<!-- Formulário de Pesquisa -->
				<form action="" method="get" id='form-contato' class="form-horizontal">					
					<div class="col-lg-1 col-md-2 col-sm-2">
						<a href='cadastro_macro.php' class="btn btn-success">Cadastrar</a>
					</div>
					<label class="col-lg-1 col-md-1 col-sm-1 ccontrol-label" for="termo">Pesquisar</label>
					<div class='col-lg-6 col-md-5 col-sm-5'>
						<input type="text" class="form-control" id="termo" name="termo" placeholder="Infome o Nome">
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4">
						<button type="submit" class="btn btn-primary">Pesquisar</button>
						<a href='lista_macro.php' class="btn btn-primary">Ver Todos</a>
					</div>
				</form>
			</div>
			<div class='clearfix'></div>

			<?php if(!empty($macros)):?>

				<!-- Tabela de Discípulos -->
				<table class="table table-striped">
					<tr class='active'>
						<th>Nome</th>
						<th>Status</th>
						<th>Ação</th>
					</tr>
					<?php foreach($macros as $macro):?>
						<tr>
							<td><?=$macro->nome_macro?></td>
							<td><?=$macro->status?></td>
							<td>
								<a href='editar_macro.php?id=<?=$macro->idmacro?>' class="btn btn-primary">Editar</a>
								
							</td>
						</tr>	
					<?php endforeach;?>
				</table>

			<?php else: ?>

				<!-- Mensagem caso não exista Discipulos ou não encontrado  -->
				<h3 class="text-center text-primary">Não existem Macro cadastrados!</h3>
			<?php endif; ?>
		</fieldset>
	</div>
	<script src="../lib/jquery/jquery.min.js"></script>
	<script src="../lib/owl.carousel/owl-carousel/owl.carousel.min.js"></script>
	<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="../js/efeitos.js"></script>
</body>
</html>