<?php

$title = 'Horário padrão';
include 'template/header.php';
include 'app/sql/select_padrao.php';

// Identifica se o formulário foi enviado e insere os dados
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
    include 'app/sql/upd_padrao_real.php';
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

<div class="container" style="max-width: 750px!important">
    <h5 style="text-align: center; padding-bottom: 10px;">Alterar horário padrão</h5>

    <!-- Inicia formulário Update -->
    <form action="alterar_padrao.php" method="POST">

    <!-- Selecionar Unidade: envia id_unidade e data via GET para página atual, se data já existir, mantém -->
    <div class="row">
        <div class="col-12">
            <select name="id_unidade" 
                    class="nome_unidade"
                    value=" <?php echo $_GET['id_unidade']?> " 
                    onchange="location.href = '?id_unidade=' + this.value">  
                <option>Selecione a Unidade</option>
                <?php while ($row_unidade = $result_unidade->fetch_assoc()) {?>
                    <option value="<?php echo $row_unidade['id_unidade'];?>" 
                        <?php echo ($id_unidade == $row_unidade['id_unidade']) ? 'selected' : '' ?> >
                        <?php echo $row_unidade['nome_unidade']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    <div>
        
    <!-- Selecionar data -->
    <div class="row">
        <div class="col-12">
            <span>Alterar o horário padrão a partir de:</span>
            <input id="data" type="date" name="data">
        </div>          
    </div> 

    <!-- Exibir informações de select_padrao.php, exibir. -->
    <?php if (mysqli_num_rows($padrao) !== 0) { ?>

    
    

    <!-- Inicia looping 12 serviços, CONTADOR $N -->
    <?php $n=0; ?>
    <?php while ($row = $padrao->fetch_assoc()) { $n++; ?> <br>

    <!-- Exibe serviços e horários -->
    <div class="row box_servico">
        <div class="col-6 nome_servico">    
            <?php echo $row["nome_servico"]; ?>
        </div>
        <div class="col-6 hora_servico" style="text-align: right">
            <?php 
                if (($row['hora_1'] == '00:00') && ($row['hora_4'] == '00:00')){
                    echo 'Fechado';
                } else {
                    if (($row['hora_2'] == '00:00') && ($row['hora_3'] == '00:00')){
                        echo $row["hora_1"].' - '.$row["hora_4"];
                    } else {
                        echo $row["hora_1"] . ' - ' . $row["hora_2"] . '<br>' . $row["hora_3"] . ' - ' . $row["hora_4"];
                    }
                }
            ?>
        </div>
    </div>

    <!-- divs para editar horários -->
    <div class="row">
        <div class="col-12">
            <input type=hidden name="id_situacaoreal_<?php echo $n ?>" value="<?php echo $row['id_situacaoreal']; ?>" >

            <!-- Editar: HORA1 -->                            
            <div id="id_hora1_<?php echo $n ?>" style="display:inline">Abertura:
                <select id="select_hora1_<?php echo $n?>" name="hora1_<?php echo $n ?>" value="<?php echo $row["hora1"];?>">
                    <?php for ( $hora=7; $hora <= 22; $hora++) { $pad = ( $hora < 10 ) ? '0' : '' ?>
                        <option value="<?php echo $pad . $hora ?>:00" 
                            <?php echo ($row['hora_1'] == $pad . $hora . ':00') ? 'selected' : '' ?>><?php echo $pad . $hora ?>:00
                        </option>
                        <?php if ($hora !== 22) { ?>
                        <option value="<?php echo $pad . $hora ?>:30" 
                            <?php echo ($row['hora_1'] == $pad . $hora . ':30') ? 'selected' : '' ?>><?php echo $pad . $hora ?>:30
                        </option>
                        <?php } ?>
                    <?php } ?>
                </select>
                <span style="padding-left: 10px">
            </div>

            <!-- Editar: HORA2 -->                          
            <div id="id_hora2_<?php echo $n ?>" style="display: 
                <?php if (($row['hora_2'] == '00:00') && ($row['hora_3'] == '00:00')) { echo 'none';} else { echo 'inline';} ?> ">Início intervalo:
                <select id="select_hora2_<?php echo $n?>" 
                        name="hora2_<?php echo $n ?>" 
                        value="<?php echo $row["hora_2"];?>"
                        <?php if (($row['hora_2'] == '00:00') && ($row['hora_3'] == '00:00')) { echo 'disabled';} ?>>
                    <?php for ( $hora=7; $hora <= 22; $hora++) { $pad = ( $hora < 10 ) ? '0' : '' ?>
                        <option value="<?php echo $pad . $hora ?>:00" 
                            <?php echo ($row['hora_2'] == $pad . $hora . ':00') ? 'selected' : '' ?>><?php echo $pad . $hora ?>:00
                        </option>
                        <?php if ($hora !== 22) { ?>
                        <option value="<?php echo $pad . $hora ?>:30" 
                            <?php echo ($row['hora_2'] == $pad . $hora . ':30') ? 'selected' : '' ?>><?php echo $pad . $hora ?>:30
                        </option>
                        <?php } ?>
                    <?php } ?>
                </select>
                <span style="padding-left: 10px">
            </div>
            
            <!-- Editar: HORA3 --> 
            <div id="id_hora3_<?php echo $n ?>" style="display: 
                <?php if (($row['hora_2'] == '00:00') && ($row['hora_3'] == '00:00')) { echo 'none';} else { echo 'inline';} ?> ">Fim intervalo:
                <select id="select_hora3_<?php echo $n?>" 
                        name="hora3_<?php echo $n ?>" 
                        value="<?php echo $row["hora_3"];?>"
                        <?php if (($row['hora_2'] == '00:00') && ($row['hora_3'] == '00:00')) { echo 'disabled';} ?>>
                    <?php for ( $hora=7; $hora <= 22; $hora++) { $pad = ( $hora < 10 ) ? '0' : '' ?>
                        <option value="<?php echo $pad . $hora ?>:00" 
                            <?php echo ($row['hora_3'] == $pad . $hora . ':00') ? 'selected' : '' ?>><?php echo $pad . $hora ?>:00
                        </option>
                        <?php if ($hora !== 22) { ?>
                        <option value="<?php echo $pad . $hora ?>:30" 
                            <?php echo ($row['hora_3'] == $pad . $hora . ':30') ? 'selected' : '' ?>><?php echo $pad . $hora ?>:30
                        </option>
                        <?php } ?>
                    <?php } ?>
                </select>
                <span style="padding-left: 10px">
            </div>
            
            <!-- Editar: HORA4 --> 
            <div id="id_hora4_<?php echo $n ?>" style="display:inline"> Fechamento:
                <select id="select_hora4_<?php echo $n?>" name="hora4_<?php echo $n ?>" value="<?php echo $row["hora_4"]; ?>">
                    <?php for ( $hora=7; $hora <= 22; $hora++) { $pad = ( $hora < 10 ) ? '0' : '' ?>
                        <option value="<?php echo $pad . $hora ?>:00" 
                            <?php echo ($row['hora_4'] == $pad . $hora . ':00') ? 'selected' : '' ?>><?php echo $pad . $hora ?>:00
                        </option>
                        <?php if ($hora !== 22) { ?>
                        <option value="<?php echo $pad . $hora ?>:30" 
                            <?php echo ($row['hora_4'] == $pad . $hora . ':30') ? 'selected' : '' ?>><?php echo $pad . $hora ?>:30
                        </option>
                        <?php } ?>
                    <?php } ?>
                </select>
                <br>
            </div>
                                        
            <!--  Checkbox Intervalo -->
            <div id="checkbox_intervalo_<?php echo $n?>">
                <input id="criarIntervalo_<?php echo $n?>" type="checkbox" onchange="abre_fecha_intervalo(<?php echo $n?>)"
                    <?php if (($row['hora_2'] != '00:00') && ($row['hora_3'] != '00:00')) { echo 'checked';} ?>
                > Intervalo
            </div>

        </div>
    </div>
        
        <?php } ?> <!-- encerra looping 12 serviços -->
        
        <!-- VAGAS ALÔ SAÚDE -->
        <?php while ($row_alosaude = $padrao_alosaude->fetch_assoc()){ ?> <br>        
            
            <!-- Exibe vagas Médico/Enfermeiro -->
            <div class="row">
                <div class="col-6 nome_servico">    
                    <span>Alô Saúde Med/Enf:</span>
                </div>
                <div class="col-6 hora_servico" style="text-align: right">
                    <?php 
                        if ($row_alosaude["vaga_med_enf"] == 0) {
                            echo 'Não';
                        } else {
                            echo 'Sim';
                        } ?>
                </div>
            </div>

            <!-- Edita vagas Médico/Enfermeiro -->
                <div class="row">
                    <div class="col-6">
                        <input type="radio" <?php echo ($row_alosaude["vaga_med_enf"] == 1) ? 'checked' : '';?> name="alosaude_med_enf" value="1" required="required">Sim
                        <span style="padding-left: 20px">
                        <input type="radio" <?php echo ($row_alosaude["vaga_med_enf"] == 0) ? 'checked' : '';?> name="alosaude_med_enf" value="0" required="required">Não
                        <span style="padding-left: 20px">
                    </div>
                </div>
            <br>

            <!-- Exibe vagas Odonto -->
            <div class="row">
                <div class="col-6 nome_servico">
                    <span>Alô Saúde Odonto: </span>
                </div>
                <div class="col-6 hora_servico" style="text-align: right">
                <?php 
                        if ($row_alosaude["vaga_odonto"] == 0) {
                            echo 'Não';
                        } else {
                            echo 'Sim';
                        } ?>
                </div>
            </div>

            <!-- Edita vagas Odonto -->
                <div class="row">
                    <div class="col-6">
                        <input type="radio" <?php echo ($row_alosaude["vaga_odonto"] == 1) ? 'checked' : '';?> name="alosaude_odonto" value="1" required="required">Sim
                        <span style="padding-left: 20px">
                        <input type="radio" <?php echo ($row_alosaude["vaga_odonto"] == 0) ? 'checked' : '';?> name="alosaude_odonto" value="0" required="required">Não
                        <span style="padding-left: 20px">
                    </div>
                </div>
        <?php } ?>
            

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

    <!-- Encerra IF de leitura do Banco de Dados -->
    <?php } ?>

<?php $conn->close();?>

<!-- Funções -->
<script>      

    function abre_fecha_intervalo(n) {

        var h2 = document.getElementById('select_hora2_' + n);
        var h3 = document.getElementById('select_hora3_' + n);
        var criarIntervalo = document.getElementById('criarIntervalo_' + n);
        var div_hora2 = document.getElementById('id_hora2_' + n);
        var div_hora3 = document.getElementById('id_hora3_' + n);
        var checkbox_intervalo = document.getElementById('checkbox_intervalo_' + n);

        if (criarIntervalo.checked === false) {
            h2.setAttribute('disabled', 'disabled');
            h3.setAttribute('disabled', 'disabled');
            div_hora2.style.display = "none";
            div_hora3.style.display = "none";
            checkbox_intervalo.style.display = "inline";

        } else {
            h2.removeAttribute('disabled');
            h3.removeAttribute('disabled');
            div_hora2.style.display = "inline";
            div_hora3.style.display = "inline";
            checkbox_intervalo.style.display = "inline";
        }
    }           

    
</script>

<?php include 'template/footer.php' ?>