<?php

$title = 'SUS Connect';
include 'header.php'; 
include 'app/servicos/show_ondb.php';

// Se método POST, fazer incluir update.php
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
    include 'app/servicos/update_ondb.php';
}
?>

<!-- Se houver mensagem via GET, exibir -->
<?php if ( isset($_GET['message']) ) { ?>
    <p class="info_message"><?php echo $_GET['message'] ?></p>
<?php } ?>

 
    <div class="container" style="max-width: 750px!important">
        
        <div class="row" style="padding-bottom: 10px; border-bottom: 1px solid gray;" >
            
            <!-- Selecionar Unidade: envia id_unidade e data via GET para página atual, se data já existir, mantém -->
            <div class="col-7">
                <select name="id_unidade" 
                        class="nome_unidade"
                        value=" <?php echo $_GET['id_unidade']?> " 
                        onchange="location.href = '?id_unidade=' + this.value + '&data=' + '<?php if ( isset($_GET['data']) ) { echo $_GET['data'];} else { echo date('Y-m-d'); } ?>'">  
                    <option>Selecione a Unidade</option>
                    <?php while ($row_unidade = $result_unidade->fetch_assoc()) {?>
                        <option value="<?php echo $row_unidade['id_unidade'];?>" 
                            <?php echo ($id_unidade == $row_unidade['id_unidade']) ? 'selected' : '' ?> >
                            <?php echo $row_unidade['nome_unidade']; ?>
                        </option>
                    <?php } ?>
                </select>
               
                <!-- Botão para exibir/ocultar a edição -->
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" 
                        aria-controls="update1 update2 update3 update4 update5 update6 update7 update8 update9 update10 update11 update12 update13 update14 update15 botao_alterar" 
                        style="background-color: white; border: 0;">
                    <img src="assets/img/edit.png" class="icon_update">
                </button>
            </div>

            <!-- Selecionar data -->
            <div class="col-5" style="text-align: right">
                <span class="date_nav" onclick="previousDay()"><</span>
                <input id="data" 
                    type="date" 
                    name="data" 
                    value="<?php echo $_GET['data']?>"
                    onchange="location.href = '?id_unidade=' + '<?php echo $_GET['id_unidade']?>' + '&data=' + this.value">
                <span class="date_nav" onclick="nextDay()">></span>
            </div>          
        </div> 

        <!-- Se tiver algum resultado em show_ondb.php, exibir. Erro: ao abrir página, ainda não tem unidade/data -->
        <?php if (mysqli_num_rows($result) !== 0) { ?>

        <!-- Inicia formulário Update -->
        <form action="index.php" method="POST">
        <?php $n=0; ?>

        <!-- Inicia looping 12 serviços -->
        <?php while ($row = $result->fetch_assoc()) { $n++; ?> <br>
            
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

            <!-- divs ocultas para editar horários -->
                <div class="collapse multi-collapse" id="update<?php echo $n?>">
                    <div class="row card card-body">
                        <div class="col-12">
                            <input type=hidden name="id_situacaoreal_<?php echo $n ?>" value="<?php echo $row['id_situacaoreal']; ?>" >

                            <!-- Editar: HORA1 -->                            
                            <div id="id_hora1_<?php echo $n ?>" style="display: 
                            <?php if (($row['hora_1'] == '00:00') && ($row['hora_4'] == '00:00')) { echo 'none';} else { echo 'inline';} ?> ">Abertura:
                                <select id="select_hora1_<?php echo $n?>" 
                                        name="hora1_<?php echo $n ?>" 
                                        value="<?php echo $row["hora1"];?>"
                                        <?php if (($row['hora_1'] == '00:00') && ($row['hora_4'] == '00:00')) { echo 'disabled';} ?>>
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
                            <div id="id_hora4_<?php echo $n ?>" style="display: 
                            <?php if (($row['hora_1'] == '00:00') && ($row['hora_4'] == '00:00')) { echo 'none';} else { echo 'inline';} ?> ">Fechamento:
                                <select id="select_hora4_<?php echo $n?>" 
                                        name="hora4_<?php echo $n ?>" 
                                        value="<?php echo $row["hora_4"]; ?>"
                                        <?php if (($row['hora_1'] == '00:00') && ($row['hora_4'] == '00:00')) { echo 'disabled';} ?>>
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
                                <br><br>
                            </div>
                            
                            <!-- Checkbox Fechado -->
                            <input id="fecharUnidade_<?php echo $n?>" 
                                   type="checkbox"       
                                   onchange="config_horarios(<?php echo $n?>)"
                                   <?php if (($row['hora_1'] == '00:00') && ($row['hora_4'] == '00:00')) { echo 'checked';} ?>
                                   > Fechado
                            <span style="padding-left: 20px">
                            
                            <!-- Checkbox Intervalo -->
                            <div id="checkbox_intervalo_<?php echo $n?>" style="display: 
                                <?php if (($row['hora_1'] == '00:00') && ($row['hora_4'] == '00:00')) { echo 'none';} else { echo 'inline';}?>">
                                <input id="criarIntervalo_<?php echo $n?>" 
                                   type="checkbox"
                                   onchange="config_horarios(<?php echo $n?>)"
                                   <?php if (($row['hora_2'] != '00:00') && ($row['hora_3'] != '00:00')) { echo 'checked';} ?>
                                   > Intervalo
                            </div>
                            <span style="padding-left: 20px">

                            <!-- Checkbox Repetir -->
                            <input id="repetirHorario_<?php echo $n?>" 
                                   type="checkbox"
                                   onchange="repetirHorario(this, <?php echo $n?>)"
                                   > Repetir  
                        </div>
                    </div>
                </div> <!-- encerra bloco oculto da edição -->
        <?php } ?> <!-- encerra looping 12 serviços -->
        
        <!-- VAGAS ALÔ SAÚDE -->
        <?php while ($row_alosaude = $result_alosaude->fetch_assoc()){ ?> <br>        
            
            <!-- Exibe vagas Médico/Enfermeiro -->
            <div class="row box_servico">
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
            <div class="collapse multi-collapse" id="update13">
                <div class="row card card-body">
                    <div class="col-6">
                        <input type=hidden name="id_vaga_med_enf" value="<?php echo $row_alosaude['id_situacaoreal_alosaude']; ?>" >
                        <input type="radio" 
                               <?php echo ($row_alosaude["vaga_med_enf"] == 1) ? 'checked' : '';?>
                               name="vaga_med_enf" value="1" required="required">Sim
                        <span style="padding-left: 20px">
                        <input type="radio" 
                               <?php echo ($row_alosaude["vaga_med_enf"] == 0) ? 'checked' : '';?>
                               name="vaga_med_enf" value="0" required="required">Não
                        <span style="padding-left: 20px">
                    </div>
                </div>
            </div>
            <br>

            <!-- Exibe vagas Odonto -->
            <div class="row box_servico">
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
            <div class="collapse multi-collapse" id="update14">
                <div class="row card card-body">
                    <div class="col-6">
                        <input type=hidden name="id_vaga_odonto" value="<?php echo $row_alosaude['id_situacaoreal_alosaude']; ?>" >
                        <input type="radio" 
                               <?php echo ($row_alosaude["vaga_odonto"] == 1) ? 'checked' : '';?>
                               name="vaga_odonto" value="1" required="required">Sim
                        <span style="padding-left: 20px">
                        <input type="radio" 
                               <?php echo ($row_alosaude["vaga_odonto"] == 0) ? 'checked' : '';?>
                               name="vaga_odonto" value="0" required="required">Não
                        <span style="padding-left: 20px">
                    </div>
                </div>
            </div>

        <?php } ?>

        <!-- Exibe observações -->
        <?php while ($row_observacoes = $result_observacoes->fetch_assoc()){ ?> <br>
            <div class="row box_servico">
                <div class="col-6 nome_servico">
                    <span>Observações: </span>
                </div>
                <div class="col-6 hora_servico" style="text-align: right">
                    <?php echo $row_observacoes["observacoes"]; ?>
                </div>
            </div>

            <!-- Edita observações -->
            <div class="collapse multi-collapse" id="update15">
                <div class="row card card-body">
                    <div class="col-6">
                        <input type=hidden name="id_observacoes" value="<?php echo $row_observacoes['id_obs']; ?>">
                        <textarea name="observacoes" rows="3" cols="50"><?php echo $row_observacoes['observacoes']; ?></textarea>
                    </div>
                </div>
            </div>
            

        <?php } ?>

        <br>
        <div class="collapse multi-collapse" id="botao_alterar">
            <input type="submit" value="Alterar">
        </div>

        </form>


    </div>
    

<!-- Encerra IF de leitura do Banco de Dados -->
<?php } else { 
    if (isset($_GET['id_unidade'])){
    echo 'Não há registros na data selecionada.';}
    } ?>
<?php $conn->close();?>

<!-- Funções -->
<script>      

    function confirmExclusion(event){
        if (!confirm("Você confirma a exclusão deste registro?")) {
            event.preventDefault()
        }
    }

    function nextDay(){
        document.location.href= '?id_unidade=' + '<?php echo $_GET['id_unidade']?>' + '&data=' + '<?php echo date('Y-m-d', strtotime('+1 days', strtotime($_GET['data'])))?>';
    }

    function previousDay(){
        document.location.href= '?id_unidade=' + '<?php echo $_GET['id_unidade']?>' + '&data=' + '<?php echo date('Y-m-d', strtotime('-1 days', strtotime($_GET['data'])))?>';
    }

    function config_horarios(n) {

        var h1 = document.getElementById('select_hora1_' + n);
        var h2 = document.getElementById('select_hora2_' + n);
        var h3 = document.getElementById('select_hora3_' + n);
        var h4 = document.getElementById('select_hora4_' + n);
        var fecharUnidade = document.getElementById('fecharUnidade_' + n);
        var criarIntervalo = document.getElementById('criarIntervalo_' + n);
        var div_hora1 = document.getElementById('id_hora1_' + n);
        var div_hora2 = document.getElementById('id_hora2_' + n);
        var div_hora3 = document.getElementById('id_hora3_' + n);
        var div_hora4 = document.getElementById('id_hora4_' + n);
        var checkbox_intervalo = document.getElementById('checkbox_intervalo_' + n);

        // Unidade fechada: desabilita e esconde 4 horários (BD recebe como 00:00:00)
        if (fecharUnidade.checked) { 
            h1.setAttribute('disabled', 'disabled');
            h2.setAttribute('disabled', 'disabled');
            h3.setAttribute('disabled', 'disabled');
            h4.setAttribute('disabled', 'disabled');
            criarIntervalo.removeAttribute('checked');
            div_hora1.style.display = "none";
            div_hora2.style.display = "none";
            div_hora3.style.display = "none";
            div_hora4.style.display = "none";
            checkbox_intervalo.style.display = "none";

        } else {

            // Unidade aberta sem intervalo: habilita horário inicial e horário final. Desabilita e esconde horários intervalo (BD recebe como 00:00:00).
            if (criarIntervalo.checked === false) {
                h1.removeAttribute('disabled');
                h2.setAttribute('disabled', 'disabled');
                h3.setAttribute('disabled', 'disabled');
                h4.removeAttribute('disabled');
                div_hora1.style.display = "inline";
                div_hora2.style.display = "none";
                div_hora3.style.display = "none";
                div_hora4.style.display = "inline";
                checkbox_intervalo.style.display = "inline";
            
            } else {

                // Unidade aberta com intervalo: habilita 4 horários, exibe horários intervalo
                h1.removeAttribute('disabled');
                h2.removeAttribute('disabled');
                h3.removeAttribute('disabled');
                h4.removeAttribute('disabled');
                div_hora1.style.display = "inline";
                div_hora2.style.display = "inline";
                div_hora3.style.display = "inline";
                div_hora4.style.display = "inline";
                checkbox_intervalo.style.display = "inline";
            }
        }           
    }
    
</script>

<?php include 'footer.php' ?>