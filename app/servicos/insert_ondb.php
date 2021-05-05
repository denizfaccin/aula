<?php

// Depurar variável
// print_r($_POST);


$id_unidade = $_POST["id_unidade"];
$data = $_POST["data"];
$hora1_1 = $_POST["hora1_1"]; $hora2_1 = $_POST["hora2_1"]; $hora3_1 = $_POST["hora3_1"]; $hora4_1 = $_POST["hora4_1"];
$hora1_2 = $_POST["hora1_2"]; $hora2_2 = $_POST["hora2_2"]; $hora3_2 = $_POST["hora3_2"]; $hora4_2 = $_POST["hora4_2"];
$hora1_3 = $_POST["hora1_3"]; $hora2_3 = $_POST["hora2_3"]; $hora3_3 = $_POST["hora3_3"]; $hora4_3 = $_POST["hora4_3"];
$hora1_4 = $_POST["hora1_4"]; $hora2_4 = $_POST["hora2_4"]; $hora3_4 = $_POST["hora3_4"]; $hora4_4 = $_POST["hora4_4"];
$hora1_5 = $_POST["hora1_5"]; $hora2_5 = $_POST["hora2_5"]; $hora3_5 = $_POST["hora3_5"]; $hora4_5 = $_POST["hora4_5"];
$hora1_6 = $_POST["hora1_6"]; $hora2_6 = $_POST["hora2_6"]; $hora3_6 = $_POST["hora3_6"]; $hora4_6 = $_POST["hora4_6"];
$hora1_7 = $_POST["hora1_7"]; $hora2_7 = $_POST["hora2_7"]; $hora3_7 = $_POST["hora3_7"]; $hora4_7 = $_POST["hora4_7"];
$hora1_8 = $_POST["hora1_8"]; $hora2_8 = $_POST["hora2_8"]; $hora3_8 = $_POST["hora3_8"]; $hora4_8 = $_POST["hora4_8"];
$hora1_9 = $_POST["hora1_9"]; $hora2_9 = $_POST["hora2_9"]; $hora3_9 = $_POST["hora3_9"]; $hora4_9 = $_POST["hora4_9"];
$hora1_10 = $_POST["hora1_10"]; $hora2_10 = $_POST["hora2_10"]; $hora3_10 = $_POST["hora3_10"]; $hora4_10 = $_POST["hora4_10"];
$hora1_11 = $_POST["hora1_11"]; $hora2_11 = $_POST["hora2_11"]; $hora3_11 = $_POST["hora3_11"]; $hora4_11 = $_POST["hora4_11"];
$hora1_12 = $_POST["hora1_12"]; $hora2_12 = $_POST["hora2_12"]; $hora3_12 = $_POST["hora3_12"]; $hora4_12 = $_POST["hora4_12"];

//$alosaude_med_enf = $_POST["alosaude_med_enf"];
//$alosaude_odonto = $_POST["alosaude_odonto"];
//$observacoes = $_POST["observacoes"];

$sql1 = "INSERT INTO situacaopadrao (`unidade`, `data_inicial`, `servico`, `hora_1`, `hora_2`, `hora_3`, `hora_4`) VALUES ('$id_unidade', '$data', '1', '$hora1_1', '$hora2_1', '$hora3_1', '$hora4_1')";
$sql2 = "INSERT INTO situacaopadrao (`unidade`, `data_inicial`, `servico`, `hora_1`, `hora_2`, `hora_3`, `hora_4`) VALUES ('$id_unidade', '$data', '2', '$hora1_2', '$hora2_2', '$hora3_2', '$hora4_2')";
$sql3 = "INSERT INTO situacaopadrao (`unidade`, `data_inicial`, `servico`, `hora_1`, `hora_2`, `hora_3`, `hora_4`) VALUES ('$id_unidade', '$data', '3', '$hora1_3', '$hora2_3', '$hora3_3', '$hora4_3')";
$sql4 = "INSERT INTO situacaopadrao (`unidade`, `data_inicial`, `servico`, `hora_1`, `hora_2`, `hora_3`, `hora_4`) VALUES ('$id_unidade', '$data', '4', '$hora1_4', '$hora2_4', '$hora3_4', '$hora4_4')";
$sql5 = "INSERT INTO situacaopadrao (`unidade`, `data_inicial`, `servico`, `hora_1`, `hora_2`, `hora_3`, `hora_4`) VALUES ('$id_unidade', '$data', '5', '$hora1_5', '$hora2_5', '$hora3_5', '$hora4_5')";
$sql6 = "INSERT INTO situacaopadrao (`unidade`, `data_inicial`, `servico`, `hora_1`, `hora_2`, `hora_3`, `hora_4`) VALUES ('$id_unidade', '$data', '6', '$hora1_6', '$hora2_6', '$hora3_6', '$hora4_6')";
$sql7 = "INSERT INTO situacaopadrao (`unidade`, `data_inicial`, `servico`, `hora_1`, `hora_2`, `hora_3`, `hora_4`) VALUES ('$id_unidade', '$data', '7', '$hora1_7', '$hora2_7', '$hora3_7', '$hora4_7')";
$sql8 = "INSERT INTO situacaopadrao (`unidade`, `data_inicial`, `servico`, `hora_1`, `hora_2`, `hora_3`, `hora_4`) VALUES ('$id_unidade', '$data', '8', '$hora1_8', '$hora2_8', '$hora3_8', '$hora4_8')";
$sql9 = "INSERT INTO situacaopadrao (`unidade`, `data_inicial`, `servico`, `hora_1`, `hora_2`, `hora_3`, `hora_4`) VALUES ('$id_unidade', '$data', '9', '$hora1_9', '$hora2_9', '$hora3_9', '$hora4_9')";
$sql10 = "INSERT INTO situacaopadrao (`unidade`, `data_inicial`, `servico`, `hora_1`, `hora_2`, `hora_3`, `hora_4`) VALUES ('$id_unidade', '$data', '10', '$hora1_10', '$hora2_10', '$hora3_10', '$hora4_10')";
$sql11 = "INSERT INTO situacaopadrao (`unidade`, `data_inicial`, `servico`, `hora_1`, `hora_2`, `hora_3`, `hora_4`) VALUES ('$id_unidade', '$data', '11', '$hora1_11', '$hora2_11', '$hora3_11', '$hora4_11')";
$sql12 = "INSERT INTO situacaopadrao (`unidade`, `data_inicial`, `servico`, `hora_1`, `hora_2`, `hora_3`, `hora_4`) VALUES ('$id_unidade', '$data', '12', '$hora1_12', '$hora2_12', '$hora3_12', '$hora4_12')";

//$sql13_14 = "INSERT INTO situacaoreal_alosaude (`data`, `unidade`, `vaga_med_enf`, `vaga_odonto`) VALUES ('$data', '$id_unidade', '$alosaude_med_enf', '$alosaude_odonto')";
//$sql15 = "INSERT INTO situacaoreal_obs (`data`, `unidade`, `observacoes`) VALUES ('$data', '$id_unidade', '$observacoes')";



if (($conn->query($sql1) === TRUE) 
 && ($conn->query($sql2) === TRUE)
 && ($conn->query($sql3) === TRUE) 
 && ($conn->query($sql4) === TRUE) 
 && ($conn->query($sql5) === TRUE) 
 && ($conn->query($sql6) === TRUE) 
 && ($conn->query($sql7) === TRUE) 
 && ($conn->query($sql8) === TRUE) 
 && ($conn->query($sql9) === TRUE) 
 && ($conn->query($sql10) === TRUE) 
 && ($conn->query($sql11) === TRUE)
 && ($conn->query($sql12) === TRUE)) {
    header('location: /susconnect/?message=Cadastro realizado com sucesso!');
    die;
}   else {    
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}

$conn->close();

  