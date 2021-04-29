<?php

$title = 'Incluir';
include 'header.php'; 

// Identifica se o formulário foi enviado e insere os dados
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
    include 'app/servicos/insert_ondb.php';
}

// Lista Unidades
$sql_unidade = "SELECT * FROM `unidade` ORDER BY `nome_unidade`";
$result_unidade = $conn->query($sql_unidade);

// Lista serviços
$sql_servico = "SELECT `nome_servico` FROM `servico`";
$result_servico = $conn->query($sql_servico);

// Atribui cada nomes de serviço a um array
$i = 1;
while ($row_servico = $result_servico->fetch_assoc()){
    $servico[$i] = $row_servico['nome_servico'];
    $i++;
}
?>


<div class="container" style="max-width: 960px!important">
<h5>Incluir</h5>

<form action="insert.php" method="POST">

    <p>Data:
        <input type="date" name="data" required="required">
    </p>

    <p>Unidade:
        <select name="id_unidade">
            <option>Selecione a Unidade</option>
    
            <?php while ($row_unidade = $result_unidade->fetch_assoc()) {?>
                <option value="<?php echo $row_unidade['id_unidade'];?>"> 
                    <?php echo $row_unidade['nome_unidade']; ?>
                </option>
            <?php } ?>
        </select>
    </p>
            
    <!-- Exibe inputs para os 12 serviços da tabela 'situacaoreal' -->
        <?php for ($k = 0; $k < 12; $k++){ ?>
    <div class="row">
        <div class="col-4" style="text-align: right">
            <?php echo $servico[$k + 1] ?>:
        </div>
        <div class="col-8">
            <input type="text" name="hora_inicio_<?php echo ($k + 1);?>" required="required">
            <span> às </span>    
            <input type="text" name="hora_fim_<?php echo ($k + 1);?>" required="required">
        </div>
    </div>
    <?php } ?>

    <!-- Exibe input boolean para tabela 'situacaoreal_alosaude', coluna 'vaga_med_enf' -->
    <div class="row">
        <div class="col-4" style="text-align: right">
            <?php echo $servico[13] ?>:
        </div>
        <div class="col-8">
            <input type="radio" name="alosaude_med_enf" value="1" required="required">Sim
            <span style="padding-left: 20px">
            <input type="radio" name="alosaude_med_enf" value="0" required="required">Não
        </div>
    </div>

    <!-- Exibr input boolean para tabela 'situacaoreal_alosaude' coluna 'vaga_odonto' -->
    <div class="row">
        <div class="col-4" style="text-align: right">
            <?php echo $servico[14] ?>:
        </div>
        <div class="col-8">
            <input type="radio" name="alosaude_odonto" value="1" required="required">Sim
            <span style="padding-left: 20px">
            <input type="radio" name="alosaude_odonto" value="0" required="required">Não
        </div>
    </div>

    <!-- Exibe input de texto para tabela 'situacaoreal_obs' coluna 'observacoes' -->
    <div class="row">
        <div class="col-4" style="text-align: right">
            <?php echo $servico[15] ?>:
        </div>
        <div class="col-8">
            <textarea name="observacoes" rows="3" cols="50" placeholder="Digite aqui informações complementares">
            </textarea>
        </div>
    </div>

   <input type="submit" value="Cadastrar">

</form>

</div>

<?php include 'footer.php' ?>
       