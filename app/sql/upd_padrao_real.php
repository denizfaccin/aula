<?php

$id_unidade = $_POST["id_unidade"];
$data = $_POST["data"];

// VARIÁVEIS --> (hora)(1 a 4)_(serviço)

// VAVIÁVEIS HORA 1
$hora1_1 = $_POST["hora1_1"];   
$hora1_2 = $_POST["hora1_2"];   
$hora1_3 = $_POST["hora1_3"];   
$hora1_4 = $_POST["hora1_4"];   
$hora1_5 = $_POST["hora1_5"];   
$hora1_6 = $_POST["hora1_6"];   
$hora1_7 = $_POST["hora1_7"];   
$hora1_8 = $_POST["hora1_8"];   
$hora1_9 = $_POST["hora1_9"];   
$hora1_10 = $_POST["hora1_10"]; 
$hora1_11 = $_POST["hora1_11"]; 
$hora1_12 = $_POST["hora1_12"]; 

// VARIÁVEIS HORA 2 - SE NÃO DEFINIDAS, ATRIBUIR ZERO
$hora2_1 = isset($_POST["hora2_1"]) ? $_POST["hora2_1"] : '00:00:00';
$hora2_2 = isset($_POST["hora2_2"]) ? $_POST["hora2_2"] : '00:00:00';
$hora2_3 = isset($_POST["hora2_3"]) ? $_POST["hora2_3"] : '00:00:00';
$hora2_4 = isset($_POST["hora2_4"]) ? $_POST["hora2_4"] : '00:00:00';
$hora2_5 = isset($_POST["hora2_5"]) ? $_POST["hora2_5"] : '00:00:00';
$hora2_6 = isset($_POST["hora2_6"]) ? $_POST["hora2_6"] : '00:00:00';
$hora2_7 = isset($_POST["hora2_7"]) ? $_POST["hora2_7"] : '00:00:00';
$hora2_8 = isset($_POST["hora2_8"]) ? $_POST["hora2_8"] : '00:00:00';
$hora2_9 = isset($_POST["hora2_9"]) ? $_POST["hora2_9"] : '00:00:00';
$hora2_10 = isset($_POST["hora2_10"]) ? $_POST["hora2_10"] : '00:00:00';
$hora2_11 = isset($_POST["hora2_11"]) ? $_POST["hora2_11"] : '00:00:00';
$hora2_12 = isset($_POST["hora2_12"]) ? $_POST["hora2_12"] : '00:00:00';

// VARIÁVEIS HORA 3 - SE NÃO DEFINIDAS, ATRIBUIR ZERO
$hora3_1 = isset($_POST["hora3_1"]) ? $_POST["hora3_1"] : '00:00:00';
$hora3_2 = isset($_POST["hora3_2"]) ? $_POST["hora3_2"] : '00:00:00';
$hora3_3 = isset($_POST["hora3_3"]) ? $_POST["hora3_3"] : '00:00:00';
$hora3_4 = isset($_POST["hora3_4"]) ? $_POST["hora3_4"] : '00:00:00';
$hora3_5 = isset($_POST["hora3_5"]) ? $_POST["hora3_5"] : '00:00:00';
$hora3_6 = isset($_POST["hora3_6"]) ? $_POST["hora3_6"] : '00:00:00';
$hora3_7 = isset($_POST["hora3_7"]) ? $_POST["hora3_7"] : '00:00:00';
$hora3_8 = isset($_POST["hora3_8"]) ? $_POST["hora3_8"] : '00:00:00';
$hora3_9 = isset($_POST["hora3_9"]) ? $_POST["hora3_9"] : '00:00:00';
$hora3_10 = isset($_POST["hora3_10"]) ? $_POST["hora3_10"] : '00:00:00';
$hora3_11 = isset($_POST["hora3_11"]) ? $_POST["hora3_11"] : '00:00:00';
$hora3_12 = isset($_POST["hora3_12"]) ? $_POST["hora3_12"] : '00:00:00';

// VARIÁVEIS HORA 4
$hora4_1 = $_POST["hora4_1"];
$hora4_2 = $_POST["hora4_2"];
$hora4_3 = $_POST["hora4_3"];
$hora4_4 = $_POST["hora4_4"];
$hora4_5 = $_POST["hora4_5"];
$hora4_6 = $_POST["hora4_6"];
$hora4_7 = $_POST["hora4_7"];
$hora4_8 = $_POST["hora4_8"];
$hora4_9 = $_POST["hora4_9"];
$hora4_10 = $_POST["hora4_10"];
$hora4_11 = $_POST["hora4_11"];
$hora4_12 = $_POST["hora4_12"];

// VARIÁVEIS ALO SAÚDE
$alosaude_med_enf = $_POST["alosaude_med_enf"];
$alosaude_odonto = $_POST["alosaude_odonto"];

// SQLs PARA ATUALIZAR O HORÁRIO REAL DE $DATA ATÉ 31/12

$sql1 = "UPDATE situacaoreal 
         SET `hora_1` = '$hora1_1', `hora_2` = '$hora2_1', `hora_3` = '$hora3_1', `hora_4` = '$hora4_1'             
         WHERE `data` >= '$data' AND `unidade` = '$id_unidade' AND `servico` = '1' AND `ocorrencia` = 0";

$sql2 = "UPDATE situacaoreal 
         SET `hora_1` = '$hora1_2', `hora_2` = '$hora2_2', `hora_3` = '$hora3_2', `hora_4` = '$hora4_2'             
         WHERE `data` >= '$data' AND `unidade` = '$id_unidade' AND `servico` = '2' AND `ocorrencia` = 0";

$sql3 = "UPDATE situacaoreal 
         SET `hora_1` = '$hora1_3', `hora_2` = '$hora2_3', `hora_3` = '$hora3_3', `hora_4` = '$hora4_3'             
         WHERE `data` >= '$data' AND `unidade` = '$id_unidade' AND `servico` = '3' AND `ocorrencia` = 0";

$sql4 = "UPDATE situacaoreal 
         SET `hora_1` = '$hora1_4', `hora_2` = '$hora2_4', `hora_3` = '$hora3_4', `hora_4` = '$hora4_4'             
         WHERE `data` >= '$data' AND `unidade` = '$id_unidade' AND `servico` = '4' AND `ocorrencia` = 0";

$sql5 = "UPDATE situacaoreal 
         SET `hora_1` = '$hora1_5', `hora_2` = '$hora2_5', `hora_3` = '$hora3_5', `hora_4` = '$hora4_5'             
         WHERE `data` >= '$data' AND `unidade` = '$id_unidade' AND `servico` = '5' AND `ocorrencia` = 0";

$sql6 = "UPDATE situacaoreal 
         SET `hora_1` = '$hora1_6', `hora_2` = '$hora2_6', `hora_3` = '$hora3_6', `hora_4` = '$hora4_6'             
         WHERE `data` >= '$data' AND `unidade` = '$id_unidade' AND `servico` = '6' AND `ocorrencia` = 0";

$sql7 = "UPDATE situacaoreal 
         SET `hora_1` = '$hora1_7', `hora_2` = '$hora2_7', `hora_3` = '$hora3_7', `hora_4` = '$hora4_7'             
         WHERE `data` >= '$data' AND `unidade` = '$id_unidade' AND `servico` = '7' AND `ocorrencia` = 0";

$sql8 = "UPDATE situacaoreal 
         SET `hora_1` = '$hora1_8', `hora_2` = '$hora2_8', `hora_3` = '$hora3_8', `hora_4` = '$hora4_8'             
         WHERE `data` >= '$data' AND `unidade` = '$id_unidade' AND `servico` = '8' AND `ocorrencia` = 0";

$sql9 = "UPDATE situacaoreal 
         SET `hora_1` = '$hora1_9', `hora_2` = '$hora2_9', `hora_3` = '$hora3_9', `hora_4` = '$hora4_9'             
         WHERE `data` >= '$data' AND `unidade` = '$id_unidade' AND `servico` = '9' AND `ocorrencia` = 0";

$sql10 = "UPDATE situacaoreal 
         SET `hora_1` = '$hora1_10', `hora_2` = '$hora2_10', `hora_3` = '$hora3_10', `hora_4` = '$hora4_10'             
         WHERE `data` >= '$data' AND `unidade` = '$id_unidade' AND `servico` = '10' AND `ocorrencia` = 0";

$sql11 = "UPDATE situacaoreal 
         SET `hora_1` = '$hora1_11', `hora_2` = '$hora2_11', `hora_3` = '$hora3_11', `hora_4` = '$hora4_11'             
         WHERE `data` >= '$data' AND `unidade` = '$id_unidade' AND `servico` = '11' AND `ocorrencia` = 0";

$sql12 = "UPDATE situacaoreal 
         SET `hora_1` = '$hora1_12', `hora_2` = '$hora2_12', `hora_3` = '$hora3_12', `hora_4` = '$hora4_12'             
         WHERE `data` >= '$data' AND `unidade` = '$id_unidade' AND `servico` = '12' AND `ocorrencia` = 0";

$sql13_14 = "UPDATE situacaoreal_alosaude
         SET `vaga_med_enf` = '$alosaude_med_enf', `vaga_odonto` = '$alosaude_odonto'
         WHERE `data` >= '$data' AND `unidade` = '$id_unidade' AND `ocorrencia` = 0";


// SQLs: SE JÁ EXISTIR UM HORÁRIO PADRÃO NO DIA INFORMADO, FAZER O UPDATE. SE NÃO EXISTIR, FAZER INSERT DE NOVO HORÁRIO PADRÃO.
$sql_buscapadrao = "SELECT * FROM situacaopadrao WHERE `unidade` = '$id_unidade' AND `servico` = '1' AND `data_inicial` = '$data' ";
$result_buscapadrao = $conn->query($sql_buscapadrao);
  
if (mysqli_num_rows($result_buscapadrao) > 0) {

    $sql_update_padrao1 = "UPDATE situacaopadrao
      SET `hora_1` = '$hora1_1', `hora_2` = '$hora2_1', `hora_3` = '$hora3_1', `hora_4` = '$hora4_1'             
      WHERE `data_inicial` = '$data' AND `unidade` = '$id_unidade' AND `servico` = '1' ";
      $update_padrao1 = $conn->query($sql_update_padrao1);
      
    $sql_update_padrao2 = "UPDATE situacaopadrao
      SET `hora_1` = '$hora1_2', `hora_2` = '$hora2_2', `hora_3` = '$hora3_2', `hora_4` = '$hora4_2'             
      WHERE `data_inicial` = '$data' AND `unidade` = '$id_unidade' AND `servico` = '2' ";
      $update_padrao2 = $conn->query($sql_update_padrao2);

    $sql_update_padrao3 = "UPDATE situacaopadrao
      SET `hora_1` = '$hora1_3', `hora_2` = '$hora2_3', `hora_3` = '$hora3_3', `hora_4` = '$hora4_3'             
      WHERE `data_inicial` = '$data' AND `unidade` = '$id_unidade' AND `servico` = '3' ";
      $update_padrao3 = $conn->query($sql_update_padrao3);

    $sql_update_padrao4 = "UPDATE situacaopadrao
      SET `hora_1` = '$hora1_4', `hora_2` = '$hora2_4', `hora_3` = '$hora3_4', `hora_4` = '$hora4_4'             
      WHERE `data_inicial` = '$data' AND `unidade` = '$id_unidade' AND `servico` = '4' ";
      $update_padrao4 = $conn->query($sql_update_padrao4);

    $sql_update_padrao5 = "UPDATE situacaopadrao
      SET `hora_1` = '$hora1_5', `hora_2` = '$hora2_5', `hora_3` = '$hora3_5', `hora_4` = '$hora4_5'             
      WHERE `data_inicial` = '$data' AND `unidade` = '$id_unidade' AND `servico` = '5' ";
      $update_padrao5 = $conn->query($sql_update_padrao5);

    $sql_update_padrao6 = "UPDATE situacaopadrao
      SET `hora_1` = '$hora1_6', `hora_2` = '$hora2_6', `hora_3` = '$hora3_6', `hora_4` = '$hora4_6'             
      WHERE `data_inicial` = '$data' AND `unidade` = '$id_unidade' AND `servico` = '6' ";
      $update_padrao6 = $conn->query($sql_update_padrao6);

    $sql_update_padrao7 = "UPDATE situacaopadrao
      SET `hora_1` = '$hora1_7', `hora_2` = '$hora2_7', `hora_3` = '$hora3_7', `hora_4` = '$hora4_7'             
      WHERE `data_inicial` = '$data' AND `unidade` = '$id_unidade' AND `servico` = '7' ";
      $update_padrao7 = $conn->query($sql_update_padrao7);

    $sql_update_padrao8 = "UPDATE situacaopadrao
      SET `hora_1` = '$hora1_8', `hora_2` = '$hora2_8', `hora_3` = '$hora3_8', `hora_4` = '$hora4_8'             
      WHERE `data_inicial` = '$data' AND `unidade` = '$id_unidade' AND `servico` = '8' ";
      $update_padrao8 = $conn->query($sql_update_padrao8);

    $sql_update_padrao9 = "UPDATE situacaopadrao
      SET `hora_1` = '$hora1_9', `hora_2` = '$hora2_9', `hora_3` = '$hora3_9', `hora_4` = '$hora4_9'             
      WHERE `data_inicial` = '$data' AND `unidade` = '$id_unidade' AND `servico` = '9' ";
      $update_padrao9 = $conn->query($sql_update_padrao9);

    $sql_update_padrao10 = "UPDATE situacaopadrao
      SET `hora_1` = '$hora1_10', `hora_2` = '$hora2_10', `hora_3` = '$hora3_10', `hora_4` = '$hora4_10'             
      WHERE `data_inicial` = '$data' AND `unidade` = '$id_unidade' AND `servico` = '10' ";
      $update_padrao10 = $conn->query($sql_update_padrao10);

    $sql_update_padrao11 = "UPDATE situacaopadrao
      SET `hora_1` = '$hora1_11', `hora_2` = '$hora2_11', `hora_3` = '$hora3_11', `hora_4` = '$hora4_11'             
      WHERE `data_inicial` = '$data' AND `unidade` = '$id_unidade' AND `servico` = '11' ";
      $update_padrao11 = $conn->query($sql_update_padrao11);

    $sql_update_padrao12 = "UPDATE situacaopadrao
      SET `hora_1` = '$hora1_12', `hora_2` = '$hora2_12', `hora_3` = '$hora3_12', `hora_4` = '$hora4_12'             
      WHERE `data_inicial` = '$data' AND `unidade` = '$id_unidade' AND `servico` = '12' ";
      $update_padrao12 = $conn->query($sql_update_padrao12);

    $sql_update_alo = "UPDATE situacaopadrao_alosaude SET `vaga_med_enf` = '$alosaude_med_enf', `vaga_odonto` = '$alosaude_odonto'
                       WHERE `data_inicial` = '$data' AND `unidade` = '$id_unidade' ";
                       $update_alo = $conn->query($sql_update_alo);
    
  } else {
    $sql_insert_padrao = "INSERT INTO situacaopadrao (`data_inicial`, `unidade`, `servico`, `hora_1`, `hora_2`, `hora_3`, `hora_4`) 
      VALUES 
        ('$data', '$id_unidade', '1', '$hora1_1', '$hora2_1', '$hora3_1', '$hora4_1'),
        ('$data', '$id_unidade', '1', '$hora1_2', '$hora2_2', '$hora3_2', '$hora4_2'),
        ('$data', '$id_unidade', '1', '$hora1_3', '$hora2_3', '$hora3_3', '$hora4_3'),
        ('$data', '$id_unidade', '1', '$hora1_4', '$hora2_4', '$hora3_4', '$hora4_4'),
        ('$data', '$id_unidade', '1', '$hora1_5', '$hora2_5', '$hora3_5', '$hora4_5'),
        ('$data', '$id_unidade', '1', '$hora1_6', '$hora2_6', '$hora3_6', '$hora4_6'),
        ('$data', '$id_unidade', '1', '$hora1_7', '$hora2_7', '$hora3_7', '$hora4_7'),
        ('$data', '$id_unidade', '1', '$hora1_8', '$hora2_8', '$hora3_8', '$hora4_8'),
        ('$data', '$id_unidade', '1', '$hora1_9', '$hora2_9', '$hora3_9', '$hora4_9'),
        ('$data', '$id_unidade', '1', '$hora1_10', '$hora2_10', '$hora3_10', '$hora4_10'),
        ('$data', '$id_unidade', '1', '$hora1_11', '$hora2_11', '$hora3_11', '$hora4_11'),
        ('$data', '$id_unidade', '1', '$hora1_12', '$hora2_12', '$hora3_12', '$hora4_12')";
    $insert_padrao = $conn->query($sql_insert_padrao); 
    
    $sql_insert_alo = "INSERT INTO situacaopadrao_alosaude (`data_inicial`, `unidade`, `vaga_med_enf`, `vaga_odonto`)
                       VALUES ('$data', '$id_unidade', '$alosaude_med_enf', '$alosaude_odonto')";
                       $insert_alo = $conn->query($sql_insert_alo);
  }

  
if (($conn->query($sql1) === TRUE)
  &&($conn->query($sql2) === TRUE)
  &&($conn->query($sql3) === TRUE)
  &&($conn->query($sql4) === TRUE)
  &&($conn->query($sql5) === TRUE)
  &&($conn->query($sql6) === TRUE)
  &&($conn->query($sql7) === TRUE)
  &&($conn->query($sql8) === TRUE)
  &&($conn->query($sql9) === TRUE)
  &&($conn->query($sql10) === TRUE)
  &&($conn->query($sql11) === TRUE)
  &&($conn->query($sql12) === TRUE)
  &&($conn->query($sql13_14) === TRUE)) {
    header('location: /susconnect/?message=Cadastro realizado com sucesso!');
    die;
}   else {    
    echo "Error: " . $sql1 . "<br>" . $conn->error;
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}


$conn->close(); 