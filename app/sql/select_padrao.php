<?php

$id_unidade = isset($_GET['id_unidade']) ? (int) $_GET['id_unidade'] : 0;

// serviços e horários da tabela situacaoreal
$situacaopadrao = "SELECT `id_situacaopadrao`, `data_inicial`, `unidade`, `nome_unidade`, `nome_servico`, 
                           date_format(`hora_1`, '%H:%m') AS `hora_1`, date_format(`hora_4`, '%H:%m') AS `hora_4`,
                           date_format(`hora_2`, '%H:%m') AS `hora_2`, date_format(`hora_3`, '%H:%m') AS `hora_3`
        FROM `situacaopadrao` 
        INNER JOIN unidade ON unidade.id_unidade = situacaopadrao.unidade 
        INNER JOIN servico ON servico.id_servico = situacaopadrao.servico
        WHERE situacaopadrao.unidade = '$id_unidade' ";
        //AND situacaopadrao.data = '$data'";
$padrao = $conn->query($situacaopadrao);

// serviços do alô saúde da tabela situacaoreal_alosaude
$situacaopadrao_alosaude = "SELECT `id_situacaopadrao_alosaude`, `data_inicial`, `nome_unidade`, `vaga_med_enf`, `vaga_odonto`
                 FROM `situacaopadrao_alosaude`
                 INNER JOIN unidade ON unidade.id_unidade = situacaopadrao_alosaude.unidade
                 WHERE situacaopadrao_alosaude.unidade = '$id_unidade' ";
                 //AND situacaoreal_alosaude.data = '$data'";
$padrao_alosaude = $conn->query($situacaopadrao_alosaude);

