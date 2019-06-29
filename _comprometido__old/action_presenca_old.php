<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Sistema de Cadastro</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/custom.css">
</head>
<body>
	<div class='container box-mensagem-crud'>
		<?php 
		require '../conexao.php';

		// Atribui uma conexão PDO
		$conexao = conexao::getInstance();

		// Recebe os dados enviados pela submissão
		$acao  = (isset($_POST['acao'])) ? $_POST['acao'] : '';
		$nome    = (isset($_POST['nome'])) ? $_POST['nome'] : '';
		$codlider  = (isset($_POST['codlider'])) ? $_POST['codlider'] : '';
		$dtpresenca    		  = (isset($_POST['dtpresenca'])) ? $_POST['dtpresenca'] : '';
		$presenca    		  = (isset($_POST['presenca'])) ? $_POST['presenca'] : '';

		// // Valida os dados recebidos
		$mensagem = '';
		if ($acao == 'editar' && $id == ''):
		    $mensagem .= '<li>ID do registros desconhecido.</li>';
	    endif;

	 //    // Se for ação diferente de excluir valida os dados obrigatórios
	    if ($acao != 'excluir'):
			if ($nome == '' || strlen($nome) < 3):
				$mensagem .= '<li>Favor preencher o Nome.</li>';
		    endif;
		    if ($codlider == '' || strlen($codlider) < 3):
				$mensagem .= '<li>Favor preencher o Nome lider.</li>';
		    endif;
		    if ($dtpresenca == '' || strlen($dtpresenca) < 3):
				$mensagem .= '<li>Favor preencher a data.</li>';
		    endif;
		  //   if ($presenca == '' || strlen($presenca) < 3):
				// $mensagem .= '<li>Favor preencher a Presença.</li>';
		  //   endif;

			if ($mensagem != ''):
				$mensagem = '<ul>' . $mensagem . '</ul>';
				echo "<div class='alert alert-danger' role='alert'>".$mensagem."</div> ";
				exit;
			endif;

		endif;



		// Verifica se foi solicitada a inclusão de dados
		if ($acao == 'incluir'):

			$presencas = array();

// Inicia a variável
$cadastrados = 0;


// Para cada elemento de $usuários, faça:

foreach ($presencas as $presenca) {
  $nome = $presenca['nome'];
  $lider = $presenca['codlider'];
  $datapresenca = $presenca['dtpresenca'];
  $presencadiscipulo = $presenca['presenca'];

  // Monta a consulta
  $sql = "INSERT INTO `tab_presenca` (`nome`, `codlider`, `dtpresenca`, `presenca`) VALUES 
  					('{$nome}', '{$lider}', '{$datapresenca}', '{$presencadiscipulo}');";

  // Executa a consulta verificando se foi inserido com sucesso
  if (mysql_query($sql)) {
    // Incrementa o contador
    $cadastrados++;
  }
}



			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='10;URL=lista_presenca.php'>";
		endif;

		?>

	</div>
</body>
</html>