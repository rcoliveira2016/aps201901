<?php 
session_start();
include('../conexao.php');


$nomeCompleto = $_POST['nomeCompleto'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$senhacrip = md5($senha);
$niveisacesso = $_POST['niveisacesso'];


$sql = "INSERT INTO cadusuario (nomeCompleto, email, senha, niveisacesso ) 
		VALUES ('$nomeCompleto','$email', '$senhacrip', '$niveisacesso')";


$resultado = mysqli_query($conn,$sql);

if($resultado){

	echo "Usuario Cadastro com Sucesso!";
}else{
	echo "Erro no cadastro do Usuario!";
}

 ?>