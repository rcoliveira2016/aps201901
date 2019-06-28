<?php 
session_start();
include('conexao.php');


$email = $_POST['email'];
$senha = $_POST['senha'];
$senha = md5($senha);


$result_usuario = "SELECT * FROM cadusuario WHERE email = '$email' && senha = '$senha' LIMIT 1";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$resultado = mysqli_fetch_assoc($resultado_usuario);

	if (isset($resultado)) 
	{
		$_SESSION['usuarioNome'] = $resultado['Nome'];
		$_SESSION['niveisacesso'] = $resultado['niveisacesso'];

	if($_SESSION['niveisacesso'] == "Doze"){
				header("Location: doze\administrativo.php");
		}elseif($_SESSION['niveisacesso'] == "Lider"){
				header("Location: lider\lider.php");
			}else{
				header("Location: comprometido\comprometido.php");
			}
		}
	else{	

			$_SESSION['loginErro'] = "Usuário ou senha Inválido";
			header("Location: index.php");
		}

 ?>