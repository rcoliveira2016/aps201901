<?php
require_once('../permissoes.php');
verficar_permissao($_permissaoUsuario);
require '../conexao.php';

// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';

// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):

	$conexao = conexao::getInstance();
	$sql = 'SELECT IDUsuario, nomeCompleto, email, niveisacesso FROM cadusuario';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$discipulos = $stm->fetchAll(PDO::FETCH_OBJ);

else:

	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT IDUsuario, nomeCompleto, email, niveisacesso FROM cadusuario WHERE nomeCompleto LIKE :nomeCompleto OR email LIKE :email';
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
	<title>Listagem de Usuario</title>
	<link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/sistema.css" rel="stylesheet">
</head>
<body>
	<?php require_once('../templates/header.php') ?>
	<div class='container'>
		<fieldset>

			<!-- Cabeçalho da Listagem -->
			<legend><h1>Listagem de Usuario</h1></legend>

			<!-- Formulário de Pesquisa -->
			<div class="row">
				<form action="" method="get" id='form-contato' class="form-horizontal">
					<div class="col-lg-1 col-md-2 col-sm-2">
						<a href='cadastro_Usuario.php' class="btn btn-success">Cadastrar</a>
					</div>
					<label class="col-lg-1 col-md-1 col-sm-1 ccontrol-label" for="termo">Pesquisar</label>
					<div class='col-lg-6 col-md-5 col-sm-5'>
						<input type="text" class="form-control" id="termo" name="termo" placeholder="Infome o Nome ou E-mail">
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4">
						<button type="submit" class="btn btn-primary">Pesquisar</button>
						<a href='lista_membro.php' class="btn btn-primary">Ver Todos</a>
					</div>
				</form>
			</div>
			
			<div class='clearfix'></div>

			<?php if(!empty($discipulos)):?>
				<div class="row  m-t-lg">
					<div class="col-md-12">
						<!-- Tabela de Discípulos -->
						<table class="table table-striped">
							<tr class='active'>
								<th>Nome</th>
								<th>Usuario</th>
								<th>Nivel de Acesso</th>
								<th>Ação</th>
							</tr>
							<?php foreach($discipulos as $discipulo):?>
								<tr>
									<td><?=$discipulo->nomeCompleto?></td>
									<td><?=$discipulo->email?></td>
									<td><?=$discipulo->niveisacesso?></td>
									<td>
										<a href='editar_usuario.php?id=<?=$discipulo->IDUsuario?>' class="btn btn-primary">Editar</a>
									</td>
								</tr>	
							<?php endforeach;?>
						</table>
					</div>
				</div>
			<?php else: ?>

				<!-- Mensagem caso não exista Discipulos ou não encontrado  -->
				<h3 class="text-center text-primary">Não existem Usuario cadastrados!</h3>
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