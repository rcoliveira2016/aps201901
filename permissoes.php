<?php 
if (session_status() == PHP_SESSION_NONE) session_start();

if(!isset($_SESSION['niveisacesso']))
    header("location: ../index.php");

$doze = 'Doze';
$lider = 'Lider';
$comprometido = 'Comprometido';

$_niveisacesso = $_SESSION['niveisacesso'];

$_permissaoCadastro = array($doze, $lider);
$_permissaoCelulograma = array($doze, $lider, $comprometido);
$_permissaoRelatorios = array($doze, $lider);
$_permissaoEstudosCelula = array($doze, $lider, $comprometido);
$_permissaoUsuario = array($doze);

function verficar_permissao($permissaoTela)
{
    if(!in_array($GLOBALS['_niveisacesso'], $permissaoTela))
        header("location: administrativo.php");
}

?>