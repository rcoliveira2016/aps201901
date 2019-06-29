<?php
session_start();
require '../conexao.php';

    $conexao = conexao::getInstance();
    $filtros=null;
	$sql = "SELECT 
                cadmembro.nome,
                DATE_FORMAT(cadcelulograma.datapresenca, '%d/%m/%Y') as data, 
                (CASE cadcelulograma.presenca 
                    when 'p' then 'Presente'
                    when 'f' then 'Faltou'
                END) as presenca
            FROM 
                `cadcelulograma`
                INNER JOIN cadmembro on cadmembro.idmembro = cadcelulograma.idmembro ";
                
    if(!empty($_POST['lider'])){
        if(empty($filtros)) $filtros.=" where ";
        $filtros.=" cadmembro.lider = :lider ";
    }
    if(!empty($_POST['data'])){
        if(empty($filtros)) $filtros.=" where ";
        $filtros.=" cadcelulograma.datapresenca=:data ";
    }
    $sql.=$filtros;

    $stm = $conexao->prepare($sql);
    if(!empty($_POST['lider']))
        $stm->bindValue(':lider', $_POST['lider']);
    if(!empty($_POST['data']))
	    $stm->bindValue(':data', $_POST['data']);
	$stm->execute();
	$listaLideres = $stm->fetchAll(PDO::FETCH_OBJ);
    if(!is_array($listaLideres)) $listaLideres = array();
    echo json_encode($listaLideres);
?>