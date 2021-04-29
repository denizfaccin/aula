<?php

$id_unidade = isset($_GET['id_unidade']) ? (int) $_GET['id_unidade'] : 0;
$data = isset($_GET['data']) ? $_GET['data'] : 0;

// serviços e horários da tabela situacaoreal
$sql = "SELECT `id_situacaoreal`, `data`, `nome_unidade`, `nome_servico`, date_format(`hora_inicio`, '%H:%m') AS `hora_inicio`, date_format(`hora_fim`, '%H:%m') AS `hora_fim` 
        FROM `situacaoreal` 
        INNER JOIN unidade ON unidade.id_unidade = situacaoreal.unidade 
        INNER JOIN servico ON servico.id_servico = situacaoreal.servico
        WHERE situacaoreal.unidade = '$id_unidade'
        AND situacaoreal.data = '$data'";
$result = $conn->query($sql);

// serviços do alô saúde da tabela situacaoreal_alosaude
$sql_alosaude = "SELECT `id_situacaoreal_alosaude`, `data`, `nome_unidade`, `vaga_med_enf`, `vaga_odonto`
                 FROM `situacaoreal_alosaude`
                 INNER JOIN unidade ON unidade.id_unidade = situacaoreal_alosaude.unidade
                 WHERE situacaoreal_alosaude.unidade = '$id_unidade'
                 AND situacaoreal_alosaude.data = '$data'";
$result_alosaude = $conn->query($sql_alosaude);

// observações da tabela situacaoreal_obs
$sql_observacoes = "SELECT `id_obs`, `data`, `nome_unidade`, `observacoes`
                 FROM `situacaoreal_obs`
                 INNER JOIN unidade ON unidade.id_unidade = situacaoreal_obs.unidade
                 WHERE situacaoreal_obs.unidade = '$id_unidade'
                 AND situacaoreal_obs.data = '$data'";
$result_observacoes = $conn->query($sql_observacoes);

// lista de unidades para usar no select unidade
$sql_unidade = "SELECT * FROM `unidade` ORDER BY `nome_unidade`";
$result_unidade = $conn->query($sql_unidade);

// lista de serviços - não implementado no Index, somente no Insert
$sql_servicos = "SELECT `nome_servico` FROM `servico`";
$result_servicos = $conn->query($sql_servicos);