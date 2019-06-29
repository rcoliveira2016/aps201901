<?php 
require '../conexao.php';

$presencas = $_POST['listaDiscipulos'];

$adicionados = array();

foreach ($presencas as $presenca) {
  $idmembro = $presenca['id'];
  $data = $presenca['data'];
  $tipoPresenca = $presenca['presenca'];
  
  $sql = "INSERT INTO `cadcelulograma` (`idmembro`,  `datapresenca`, `presenca`) VALUES ('$idmembro', '$data', '$tipoPresenca')";
  
  if (mysqli_query($conn,$sql)) {
    $adicionados[] = $presenca;
  }
}

echo json_encode($adicionados);

?>