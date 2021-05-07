<?php

$id_unidade = isset($_GET['id_unidade']) ? (int) $_GET['id_unidade'] : 0;


// data do último update --- FALTA TESTAR
$busca_datamax = "SELECT max(`data_inicial`) FROM `situacaopadrao` 
                  WHERE `unidade` = '$id_unidade' 
                  AND `servico` = '1' 
                  AND `data_inicial` >= '2021-05-01' 
                  AND `data_inicial` <= CURRENT_DATE ";
$result_datamax = $conn->query($busca_datamax);
$datamax_value = $result_datamax->fetch_assoc();
$data_max = $datamax_value['max(`data_inicial`)'];


// serviços e horários da tabela situacaoreal
$situacaopadrao = "SELECT `id_situacaopadrao`, `data_inicial`, `unidade`, `nome_unidade`, `nome_servico`, 
                           date_format(`hora_1`, '%H:%m') AS `hora_1`, date_format(`hora_4`, '%H:%m') AS `hora_4`,
                           date_format(`hora_2`, '%H:%m') AS `hora_2`, date_format(`hora_3`, '%H:%m') AS `hora_3`
        FROM `situacaopadrao`
        INNER JOIN unidade ON unidade.id_unidade = situacaopadrao.unidade 
        INNER JOIN servico ON servico.id_servico = situacaopadrao.servico
        WHERE situacaopadrao.unidade = '$id_unidade' AND `data_inicial` = '$data_max'"; 
$padrao = $conn->query($situacaopadrao);

// serviços do alô saúde da tabela situacaoreal_alosaude
$situacaopadrao_alosaude = "SELECT `id_situacaopadrao_alosaude`, `data_inicial`, `nome_unidade`, `vaga_med_enf`, `vaga_odonto`
                 FROM `situacaopadrao_alosaude`
                 INNER JOIN unidade ON unidade.id_unidade = situacaopadrao_alosaude.unidade
                 WHERE situacaopadrao_alosaude.unidade = '$id_unidade' ";
$padrao_alosaude = $conn->query($situacaopadrao_alosaude);



