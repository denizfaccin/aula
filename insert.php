<?php

$title = 'Horário padrão';
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
<h5 style="text-align: center">Definir horário padrão</h5>

<form action="insert.php" method="POST">

    <div class="row">
        <div class="col-3" style="text-align: right">
            <p>Unidade: </p>
        </div>
        <div class="col-9">
                <select name="id_unidade">
                    <option>Selecione a Unidade</option>
            
                    <?php while ($row_unidade = $result_unidade->fetch_assoc()) {?>
                        <option value="<?php echo $row_unidade['id_unidade'];?>"> 
                            <?php echo $row_unidade['nome_unidade']; ?>
                        </option>
                    <?php } ?>
                </select>
        </div>
    </div>
    
    <div class="row">
        <div class="col-3" style="text-align: right">
            <p>Definir horário padrão a patir de: </p>
        </div>
        <div class="col-9">
            <input type="date" name="data" required="required"> 
        </div>
    </div>


    <!-- Exibe inputs para os 12 serviços da tabela 'situacaoreal' -->
        <?php for ($k = 0; $k < 12; $k++){ ?>
    <div class="row">
        <div class="col-3" style="text-align: right">
            <?php echo $servico[$k + 1] ?>:
        </div>
        <div class="col-9">
            <input type="text" name="hora1_<?php echo ($k + 1);?>" required="required" placeholder="Abertura" style="max-width: 120px">
            <span> - </span>
            <input type="text" name="hora2_<?php echo ($k + 1);?>" placeholder="Início intervalo" style="max-width: 120px">
            <span> - </span>
            <input type="text" name="hora3_<?php echo ($k + 1);?>" placeholder="Fim intervalo" style="max-width: 120px">
            <span> - </span>
            <input type="text" name="hora4_<?php echo ($k + 1);?>" required="required" placeholder="Fechamento" style="max-width: 120px">
        </div>
    </div>
    <?php } ?>

    <!-- Exibe input boolean para tabela 'situacaoreal_alosaude', coluna 'vaga_med_enf' -->
    <div class="row">
        <div class="col-3" style="text-align: right">
            <?php echo $servico[13] ?>:
        </div>
        <div class="col-9">
            <input type="radio" name="alosaude_med_enf" value="1" required="required">Sim
            <span style="padding-left: 20px">
            <input type="radio" name="alosaude_med_enf" value="0" required="required">Não
        </div>
    </div>

    <!-- Exibr input boolean para tabela 'situacaoreal_alosaude' coluna 'vaga_odonto' -->
    <div class="row">
        <div class="col-3" style="text-align: right">
            <?php echo $servico[14] ?>:
        </div>
        <div class="col-9">
            <input type="radio" name="alosaude_odonto" value="1" required="required">Sim
            <span style="padding-left: 20px">
            <input type="radio" name="alosaude_odonto" value="0" required="required">Não
        </div>
    </div>

    <!-- Exibe input de texto para tabela 'situacaoreal_obs' coluna 'observacoes' -->
    <div class="row">
        <div class="col-3" style="text-align: right">
            <?php echo $servico[15] ?>:
        </div>
        <div class="col-9">
            <textarea name="observacoes" rows="3" cols="50" placeholder="Digite aqui informações complementares">
            </textarea>
        </div>
    </div>

    <br>
    
    <!--
    <div style="text-align: center">
        <input type="submit" value="Confirmar">
    </div> -->

<!-- Button trigger modal -->
    <div style="text-align: center">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Confirmar
        </button>
        <submit>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Definição de novo horário padrão</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Cadastrar o novo horário padrão para a sua Unidade?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Confirmar</button>
      </div>
    </div>
  </div>
</div>

</form>

</div>

<?php include 'footer.php' ?>
       