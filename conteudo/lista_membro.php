<?php
require_once('../permissoes.php');
verficar_permissao($_permissaoCadastro);
require '../conexao.php';

// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';

// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):

	$conexao = conexao::getInstance();
	$sql = 'SELECT idmembro, nome, email, celular, status FROM cadmembro';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$discipulos = $stm->fetchAll(PDO::FETCH_OBJ);
else:

	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT idmembro, nome, email, celular, status FROM cadmembro WHERE nome LIKE :nome OR email LIKE :email';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':nome', $termo.'%');
	$stm->bindValue(':email', $termo.'%');
	$stm->execute();
	$discipulos = $stm->fetchAll(PDO::FETCH_OBJ);
endif;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Listagem de Discípulos</title>
	<link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/sistema.css" rel="stylesheet">
</head>
<body>
	<?php require_once('../templates/header.php') ?>
	<div class='container'>
		<fieldset>

			<!-- Cabeçalho da Listagem -->
			<legend><h1>Listagem de Discípulos</h1></legend>

			<!-- Formulário de Pesquisa -->
			<form action="" method="get" id='form-contato' class="form-horizontal col-md-10">
				<label class="col-md-2 control-label" for="termo">Pesquisar</label>
				<div class='col-md-7'>
			    	<input type="text" class="form-control" id="termo" name="termo" placeholder="Infome o Nome ou E-mail">
				</div>
			    <button type="submit" class="btn btn-primary">Pesquisar</button>
			    <a href='lista_membro.php' class="btn btn-primary">Ver Todos</a>
			</form>

			<!-- Link para página de cadastro -->
			<a href='cadastro_discipulo.php' class="btn btn-success pull-right">Cadastrar Discípulo</a>
			<div class='clearfix'></div>

			<?php if(!empty($discipulos)):?>

				<!-- Tabela de Discípulos -->
				<table class="table table-striped">
					<tr class='active'>
						
						<th>Nome</th>
						<th>E-mail</th>
						<th>Celular</th>
						<th>Status</th>
						<th>Ação</th>
					</tr>
					<?php foreach($discipulos as $discipulo):?>
						<tr>
							
							<td><?=$discipulo->nome?></td>
							<td><?=$discipulo->email?></td>
							<td><?=$discipulo->celular?></td>
							<td><?=$discipulo->status?></td>
							<td>
								<a href='editar_discipulo.php?id=<?=$discipulo->idmembro?>' class="btn btn-primary">Editar</a>
							</td>
						</tr>	
					<?php endforeach;?>
				</table>

			<?php else: ?>

				<!-- Mensagem caso não exista Discipulos ou não encontrado  -->
				<h3 class="text-center text-primary">Não existem Discipulos cadastrados!</h3>
			<?php endif; ?>
		</fieldset>
	</div>
	<script src="../lib/jquery/jquery.min.js"></script>
	<script src="../lib/owl.carousel/owl-carousel/owl.carousel.min.js"></script>
	<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="../js/efeitos.js"></script>
	<script type="text/javascript" src="../js/custom_discipulo.js"></script>
</body>
</html>