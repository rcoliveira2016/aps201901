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
		$idmembro    = (isset($_POST['idmembro'])) ? $_POST['idmembro'] : '';
		$nome  = (isset($_POST['nome'])) ? $_POST['nome'] : '';
		$rg  = (isset($_POST['rg'])) ? $_POST['rg'] : '';
		$cpf   = (isset($_POST['cpf'])) ? str_replace(array('.','-'), '', $_POST['cpf']): '';
		$data  = (isset($_POST['data'])) ? $_POST['data'] : '';
		$endereco  = (isset($_POST['endereco'])) ? $_POST['endereco'] : '';
		$numero  = (isset($_POST['numero'])) ? $_POST['numero'] : '';
		$complemento  = (isset($_POST['complemento'])) ? $_POST['complemento'] : '';
		$bairro  = (isset($_POST['bairro'])) ? $_POST['bairro'] : '';
		$cep  = (isset($_POST['cep'])) ? $_POST['cep'] : '';
		$telefone  		  = (isset($_POST['telefone'])) ? str_replace(array('-', ' '), '', $_POST['telefone']) : '';
		$celular   		  = (isset($_POST['celular'])) ? str_replace(array('-', ' '), '', $_POST['celular']) : '';
		$estadocivil  = (isset($_POST['estadocivil'])) ? $_POST['estadocivil'] : '';
		$naturalidade  = (isset($_POST['naturalidade'])) ? $_POST['naturalidade'] : '';
		$grauinstrucao  = (isset($_POST['grauinstrucao'])) ? $_POST['grauinstrucao'] : '';
		$profissao  = (isset($_POST['profissao'])) ? $_POST['profissao'] : '';
		$email = (isset($_POST['email'])) ? $_POST['email'] : '';
		$lider  = (isset($_POST['lider'])) ? $_POST['lider'] : '';
		$idmacro  = (isset($_POST['idmacro'])) ? $_POST['idmacro'] : '';
		$foto_atual		  = (isset($_POST['foto_atual'])) ? $_POST['foto_atual'] : '';
		$status    		  = (isset($_POST['status'])) ? $_POST['status'] : '';
		$grupo    		  = (isset($_POST['grupo'])) ? $_POST['grupo'] : '';

		// Valida os dados recebidos
		$mensagem = '';
		if ($acao == 'editar' && $idmembro == ''):
		    $mensagem .= '<li>ID do registros desconhecido.</li>';
	    endif;

		// Verifica se foi solicitada a inclusão de dados
		if ($acao == 'incluir'):

			$nome_foto = 'padrao.jpg';
			if(isset($_FILES['foto']) && $_FILES['foto']['size'] > 0):  

				$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
			    $extensao = strtolower(end(explode('.', $_FILES['foto']['name'])));

			     // Validamos se a extensão do arquivo é aceita
			    if (array_search($extensao, $extensoes_aceitas) === false):
			       echo "<h1>Extensão Inválida!</h1>";
			       exit;
			    endif;
 
			     // Verifica se o upload foi enviado via POST   
			     if(is_uploaded_file($_FILES['foto']['tmp_name'])):  
			             
			          // Verifica se o diretório de destino existe, senão existir cria o diretório  
			          if(!file_exists("fotos")):  
			               mkdir("fotos");  
			          endif;  
			  
			          // Monta o caminho de destino com o nome do arquivo  
			          $nome_foto = date('dmY') . '_' . $_FILES['foto']['name'];  
			            
			          // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
			          if (!move_uploaded_file($_FILES['foto']['tmp_name'], 'fotos/'.$nome_foto)):  
			               echo "Houve um erro ao gravar arquivo na pasta de destino!";  
			          endif;  
			     endif;  
			endif;

			$sql = 'INSERT INTO cadmembro (nome,rg,cpf,data,endereco,numero,complemento,bairro,cep,telefone,celular,estadocivil,naturalidade,grauinstrucao,profissao,email,lider,idmacro,status,grupo)
			VALUES(:nome,:rg,:cpf,:data,:endereco,:numero,:complemento,:bairro,:cep,:telefone,:celular,:estadocivil,:naturalidade,:grauinstrucao,:profissao,:email,:lider,:idmacro,:status,:grupo)';

			$stm = $conexao->prepare($sql);
			$stm->bindValue(':nome', $nome);
			$stm->bindValue(':rg', $rg);
			$stm->bindValue(':cpf', $cpf);
			$stm->bindValue(':data', $data);
			$stm->bindValue(':endereco', $endereco);
			$stm->bindValue(':numero', $numero);
			$stm->bindValue(':complemento', $complemento);
			$stm->bindValue(':bairro', $bairro);
			$stm->bindValue(':cep', $cep);
			$stm->bindValue(':telefone', $telefone);
			$stm->bindValue(':celular', $celular);
			$stm->bindValue(':estadocivil', $estadocivil);
			$stm->bindValue(':naturalidade', $naturalidade);
			$stm->bindValue(':grauinstrucao', $grauinstrucao);
			$stm->bindValue(':profissao', $profissao);
			$stm->bindValue(':email', $email);
			$stm->bindValue(':lider', $lider);
			$stm->bindValue(':idmacro', $idmacro);	
			$stm->bindValue(':status', $status);
			$stm->bindValue(':grupo', $grupo);
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=lista_membro.php'>";
		endif;


		// Verifica se foi solicitada a edição de dados
		if ($acao == 'editar'):

			if(isset($_FILES['foto']) && $_FILES['foto']['size'] > 0): 

				// Verifica se a foto é diferente da padrão, se verdadeiro exclui a foto antiga da pasta
				if ($foto_atual <> 'padrao.jpg'):
					unlink("../fotos/" . $foto_atual);
				endif;

				$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
			    $extensao = strtolower(end(explode('.', $_FILES['foto']['name'])));

			     // Validamos se a extensão do arquivo é aceita
			    if (array_search($extensao, $extensoes_aceitas) === false):
			       echo "<h1>Extensão Inválida!</h1>";
			       exit;
			    endif;
 
			     // Verifica se o upload foi enviado via POST   
			     if(is_uploaded_file($_FILES['foto']['tmp_name'])):  
			             
			          // Verifica se o diretório de destino existe, senão existir cria o diretório  
			          if(!file_exists("fotos")):  
			               mkdir("fotos");  
			          endif;  
			  
			          // Monta o caminho de destino com o nome do arquivo  
			          $nome_foto = date('dmY') . '_' . $_FILES['foto']['name'];  
			            
			          // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
			          if (!move_uploaded_file($_FILES['foto']['tmp_name'], '../fotos/'.$nome_foto)):  
			               echo "Houve um erro ao gravar arquivo na pasta de destino!";  
			          endif;  
			     endif;
			else:

			 	$nome_foto = $foto_atual;

			endif;

			$sql = 'UPDATE cadmembro SET nome=:nome, rg=:rg, cpf=:cpf, data=:data, endereco=:endereco, numero=:numero, complemento=:complemento, bairro=:bairro, cep=:cep,telefone=:telefone, celular=:celular, estadocivil=:estadocivil, naturalidade=:naturalidade,grauinstrucao=:grauinstrucao, profissao=:profissao, lider=:lider, idmacro=:idmacro, email=:email, status=:status, foto=:foto, grupo=:grupo ';
			$sql .= 'WHERE idmembro = :idmembro';

			$stm = $conexao->prepare($sql);
			$stm->bindValue(':nome', $nome);
			$stm->bindValue(':rg', $rg);
			$stm->bindValue(':cpf', $cpf);
			$stm->bindValue(':data', $data);
			$stm->bindValue(':endereco', $endereco);
			$stm->bindValue(':numero', $numero);
			$stm->bindValue(':complemento', $complemento);
			$stm->bindValue(':bairro', $bairro);
			$stm->bindValue(':cep', $cep);
			$stm->bindValue(':telefone', $telefone);
			$stm->bindValue(':celular', $celular);
			$stm->bindValue(':estadocivil', $estadocivil);
			$stm->bindValue(':naturalidade', $naturalidade);
			$stm->bindValue(':grauinstrucao', $grauinstrucao);
			$stm->bindValue(':profissao', $profissao);
			$stm->bindValue(':email', $email);
			$stm->bindValue(':lider', $lider);
			$stm->bindValue(':idmacro', $idmacro);
			$stm->bindValue(':status', $status);
			$stm->bindValue(':grupo', $grupo);
			$stm->bindValue(':foto', $nome_foto);
			$stm->bindValue(':idmembro', $idmembro);
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro editado com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao editar registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=lista_membro.php'>";
		endif;


		// Verifica se foi solicitada a exclusão dos dados
		if ($acao == 'excluir'):

			// Captura o nome da foto para excluir da pasta
			$sql = "SELECT foto FROM cadmembro WHERE id = :id AND foto <> 'padrao.jpg'";
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':id', $id);
			$stm->execute();
			$discipulo = $stm->fetch(PDO::FETCH_OBJ);

			if (!empty($discipulo) && file_exists('../fotos/'.$discipulo->foto)):
				unlink("../fotos/" . $discipulo->foto);
			endif;

			// Exclui o registro do banco de dados
			$sql = 'DELETE FROM tab_discipulo WHERE id = :id';
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':id', $id);
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro excluído com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao excluir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=lista_membro.php'>";
		endif;
		?>

	</div>
</body>
</html>