<?php

// Depurar variável
// print_r($_POST);


$id_unidade = $_POST["id_unidade"];
$data = $_POST["data"];
$hora_inicio_1 = $_POST["hora_inicio_1"]; $hora_fim_1 = $_POST["hora_fim_1"];
$hora_inicio_2 = $_POST["hora_inicio_2"]; $hora_fim_2 = $_POST["hora_fim_2"];
$hora_inicio_3 = $_POST["hora_inicio_3"]; $hora_fim_3 = $_POST["hora_fim_3"];
$hora_inicio_4 = $_POST["hora_inicio_4"]; $hora_fim_4 = $_POST["hora_fim_4"];
$hora_inicio_5 = $_POST["hora_inicio_5"]; $hora_fim_5 = $_POST["hora_fim_5"];
$hora_inicio_6 = $_POST["hora_inicio_6"]; $hora_fim_6 = $_POST["hora_fim_6"];
$hora_inicio_7 = $_POST["hora_inicio_7"]; $hora_fim_7 = $_POST["hora_fim_7"];
$hora_inicio_8 = $_POST["hora_inicio_8"]; $hora_fim_8 = $_POST["hora_fim_8"];
$hora_inicio_9 = $_POST["hora_inicio_9"]; $hora_fim_9 = $_POST["hora_fim_9"];
$hora_inicio_10 = $_POST["hora_inicio_10"]; $hora_fim_10 = $_POST["hora_fim_10"];
$hora_inicio_11 = $_POST["hora_inicio_11"]; $hora_fim_11 = $_POST["hora_fim_11"];
$hora_inicio_12 = $_POST["hora_inicio_12"]; $hora_fim_12 = $_POST["hora_fim_12"];

$alosaude_med_enf = $_POST["alosaude_med_enf"];
$alosaude_odonto = $_POST["alosaude_odonto"];
$observacoes = $_POST["observacoes"];

$sql1 = "INSERT INTO situacaoreal (`hora_inicio`, `hora_fim`, `unidade`, `data`, `servico`) VALUES ('$hora_inicio_1', '$hora_fim_1', '$id_unidade', '$data', '1')";
$sql2 = "INSERT INTO situacaoreal (`hora_inicio`, `hora_fim`, `unidade`, `data`, `servico`) VALUES ('$hora_inicio_2', '$hora_fim_2', '$id_unidade', '$data', '2')";
$sql3 = "INSERT INTO situacaoreal (`hora_inicio`, `hora_fim`, `unidade`, `data`, `servico`) VALUES ('$hora_inicio_3', '$hora_fim_3', '$id_unidade', '$data', '3')";
$sql4 = "INSERT INTO situacaoreal (`hora_inicio`, `hora_fim`, `unidade`, `data`, `servico`) VALUES ('$hora_inicio_4', '$hora_fim_4', '$id_unidade', '$data', '4')";
$sql5 = "INSERT INTO situacaoreal (`hora_inicio`, `hora_fim`, `unidade`, `data`, `servico`) VALUES ('$hora_inicio_5', '$hora_fim_5', '$id_unidade', '$data', '5')";
$sql6 = "INSERT INTO situacaoreal (`hora_inicio`, `hora_fim`, `unidade`, `data`, `servico`) VALUES ('$hora_inicio_6', '$hora_fim_6', '$id_unidade', '$data', '6')";
$sql7 = "INSERT INTO situacaoreal (`hora_inicio`, `hora_fim`, `unidade`, `data`, `servico`) VALUES ('$hora_inicio_7', '$hora_fim_7', '$id_unidade', '$data', '7')";
$sql8 = "INSERT INTO situacaoreal (`hora_inicio`, `hora_fim`, `unidade`, `data`, `servico`) VALUES ('$hora_inicio_8', '$hora_fim_8', '$id_unidade', '$data', '8')";
$sql9 = "INSERT INTO situacaoreal (`hora_inicio`, `hora_fim`, `unidade`, `data`, `servico`) VALUES ('$hora_inicio_9', '$hora_fim_9', '$id_unidade', '$data', '9')";
$sql10 = "INSERT INTO situacaoreal (`hora_inicio`, `hora_fim`, `unidade`, `data`, `servico`) VALUES ('$hora_inicio_10', '$hora_fim_10', '$id_unidade', '$data', '10')";
$sql11 = "INSERT INTO situacaoreal (`hora_inicio`, `hora_fim`, `unidade`, `data`, `servico`) VALUES ('$hora_inicio_11', '$hora_fim_11', '$id_unidade', '$data', '11')";
$sql12 = "INSERT INTO situacaoreal (`hora_inicio`, `hora_fim`, `unidade`, `data`, `servico`) VALUES ('$hora_inicio_12', '$hora_fim_12', '$id_unidade', '$data', '12')";
$sql13_14 = "INSERT INTO situacaoreal_alosaude (`data`, `unidade`, `vaga_med_enf`, `vaga_odonto`) VALUES ('$data', '$id_unidade', '$alosaude_med_enf', '$alosaude_odonto')";
$sql15 = "INSERT INTO situacaoreal_obs (`data`, `unidade`, `observacoes`) VALUES ('$data', '$id_unidade', '$observacoes')";



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
 && ($conn->query($sql12) === TRUE) 
 && ($conn->query($sql13_14) === TRUE)
 && ($conn->query($sql15) === TRUE)) {
    header('location: /aula/?message=Cadastro realizado com sucesso!');
    die;
}   else {    
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}

$conn->close();

  