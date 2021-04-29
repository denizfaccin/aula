<?php

for ($p = 1; $p <= 12; $p++) {
  $id_situacaoreal = $_POST['id_situacaoreal_' . $p];
    
  $hora_inicio = isset($_POST['hora_inicio_' . $p]) ? $_POST['hora_inicio_' . $p] : '00:00:00';
  
  $hora_fim = isset($_POST['hora_fim_' . $p]) ? $_POST['hora_fim_' . $p] : '00:00:00';

  $sql = "UPDATE situacaoreal SET `hora_inicio`='$hora_inicio', `hora_fim`='$hora_fim' WHERE `id_situacaoreal`='$id_situacaoreal' ";
  

 if ($conn->query($sql) !== TRUE){
    echo "Erro: ".$conn->error;
    die;
  } 

}
  
$id_vaga_med_enf = $_POST['id_vaga_med_enf'];
$id_vaga_odonto = $_POST['id_vaga_odonto'];
$id_observacoes = $_POST['id_observacoes'];
$vaga_med_enf = $_POST['vaga_med_enf'];
$vaga_odonto = $_POST['vaga_odonto'];
$observacoes = $_POST['observacoes'];


$sql_update_medenf = "UPDATE situacaoreal_alosaude SET `vaga_med_enf`='$vaga_med_enf' WHERE `id_situacaoreal_alosaude`='$id_vaga_med_enf' ";
$sql_update_odonto = "UPDATE situacaoreal_alosaude SET `vaga_odonto`='$vaga_odonto' WHERE `id_situacaoreal_alosaude`='$id_vaga_odonto' ";
$sql_update_obs = "UPDATE situacaoreal_obs SET `observacoes`='$observacoes' WHERE `id_obs`='$id_observacoes' ";

if (($conn->query($sql_update_medenf) !== TRUE)
  ||($conn->query($sql_update_odonto) !== TRUE)
  ||($conn->query($sql_update_obs) !== TRUE)){
 echo "Erro: ".$conn->error; 
 die;
} else {
  header('location: /aula/?message=Alteração realizada com sucesso!');
  die;
}