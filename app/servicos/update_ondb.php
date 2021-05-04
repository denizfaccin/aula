<?php

for ($p = 1; $p <= 12; $p++) {
  $id_situacaoreal = $_POST['id_situacaoreal_' . $p];

  $hora1 = isset($_POST['hora1_' . $p]) ? $_POST['hora1_' . $p] : '00:00:00';
  $hora2 = isset($_POST['hora2_' . $p]) ? $_POST['hora2_' . $p] : '00:00:00';
  $hora3 = isset($_POST['hora3_' . $p]) ? $_POST['hora3_' . $p] : '00:00:00';
  $hora4 = isset($_POST['hora4_' . $p]) ? $_POST['hora4_' . $p] : '00:00:00';

  $sql = "UPDATE situacaoreal SET `hora_1`='$hora1', `hora_2`='$hora2', `hora_3`='$hora3', `hora_4`='$hora4' WHERE `id_situacaoreal`='$id_situacaoreal' ";
  
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
  header('location: /susconnect/?message=Alteração realizada com sucesso!');
  die;
}