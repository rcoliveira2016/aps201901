<?php 
require '../conexao.php';

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
  $sql = "INSERT INTO `tab_presenca` (`nome`, `lider`, `datapresenca`, `presencadiscipulo`) VALUES  VALUES 
  					   ('{$nome}', '{$lider}', '{$datapresenca}', '{$presencadiscipulo}')";

  // Executa a consulta verificando se foi inserido com sucesso
  if (mysql_query($sql)) {
    // Incrementa o contador
    $cadastrados++;
  }
}
echo 'Presenças cadastradas: ' . $cadastrados;

 ?>