<?php
	require_once('../permissoes.php');
	verficar_permissao($_permissaoRelatorios);
	require '../conexao.php';

    $conexao = conexao::getInstance();
	$sql = 'SELECT nome,idmembro FROM cadmembro WHERE grupo = :lider';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':lider', 'Lider');
	$stm->execute();
	$listaLideres = $stm->fetchAll(PDO::FETCH_OBJ);
	if(!is_array($listaLideres)) $listaLideres = array();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Listagem de Macro</title>
	<link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/sistema.css" rel="stylesheet">
</head>
<body>
	<?php require_once('../templates/header.php') ?>
	<div class='container'>
		<div class="alert alert-success" style='display:none' role="alert">
			<strong>Cadastrado com Sucesso</strong>			
		</div>
		<div class="alert alert-danger" style='display:none' role="alert">
			<strong>Erro no cadastro</strong>
		</div>
		<fieldset>		
			<!-- Cabeçalho da Listagem -->
			<legend><h1>Relatório</h1></legend>

			<!-- Formulário de Pesquisa -->
			<div class="row">
				<div class="form-inline">
                    <div class="form-group">
                        <label>Lider</label>
                        <select class="form-control" name="lider" id="lider"></select>
                    </div>
                    <div class="form-group">
                        <label>Data</label>
                        <input type="date" class="form-control" id="data" maxlength="10" name="data">
                    </div>
                    <button type="submit" class="btn btn-primary pesquisar">Pesquisar</button>
                </div>
			</div>

			<!-- Link para página de cadastro -->
			
			<div class='clearfix'></div>
			<div class="row">
                <table class="table table-striped" id="tabela-lider">
                    <thead>
                        <tr class='active'>
                            <th>Nome</th>							
                            <th>Data</th>
                            <th>Presença</th>							
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
			<div>
		
		</fieldset>
	</div>
	<script src="../js/jquery.js"></script>
	<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="../js/efeitos.js"></script>
	<script>
		$(document).ready(function() {
			var listaLideres = <?=json_encode($listaLideres)?>;
            var _urlPesquisa = 'action_relatorio_lider.php';
			var _carregar = function () {
                _carregarSelectLideres();
                _carregarBtnPesquisa();                
			};
            
            var _carregarBtnPesquisa = function () {
                $('.pesquisar').on('click', function () {
                    
                    $.ajax({
						type: 'POST',
						url: _urlPesquisa,
						data: {data:$('#data').val(), lider:$('#lider').val()},
						async: true,
						cache: false,
						success: function (data) {
                            data = JSON.parse(data);
                            $('#tabela-lider tbody').empty();
                            data.forEach(function (celulograma) {
                                var tr =  $('<tr>');
                                tr.append($('<td>').html(celulograma.nome));
                                tr.append($('<td>').html(celulograma.data));
                                tr.append($('<td>').html(celulograma.presenca));
                                $('#tabela-lider tbody').append(tr)
                            })
						},
						error: function (data) {
							alert('erro '+ data)
						},
					});
                })
            }

			var _carregarSelectLideres = function () {
				$('#lider').append($('<option>', { value: '', text: 'Selecione um lider' }));

				listaLideres.forEach(function (lider) {
					$('#lider').append($('<option>', {
						value: lider.idmembro,
						text: lider.nome
					}));
				})
            }
            
			_carregar();
		});
	</script>
</body>
</html>