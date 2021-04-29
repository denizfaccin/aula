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

    <div class="container" style="max-width: 960px!important">
        <div class="row" style="height: 40px;">
            
            <!-- SELECIONAR UNIDADE -->
            <div class="col-6">
                <!-- ao selecionar unidade, envia id_unidade e data via GET para a página atual. Se data já selecionada, mantém. -->
                <select name="id_unidade" 
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

               
                <!-- botão para exibir/ocultar a edição -->
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" 
                        aria-controls="update1 update2 update3 update4 update5 update6 update7 update8 update9 update10 update11 update12 update13 update14 update15 botao_alterar" 
                        style="background-color: white; border: 0;">

                    <img src="assets/img/edit.png" class="icon">
                </button>
            </div>

            <!-- SELECIONAR DATA. Quando unidade é selecionada, mantém a data. -->
            <div class="col-6">
                <span class="date_nav" onclick="previousDay()"><</span>
                <input id="data" 
                    type="date" 
                    name="data" 
                    value="<?php echo $_GET['data']?>"
                    onchange="location.href = '?id_unidade=' + '<?php echo $_GET['id_unidade']?>' + '&data=' + this.value">
                <span class="date_nav" onclick="nextDay()">></span>
            </div>          
        </div> 

        <!-- Se tiver algum resultado em show_ondb.php, exibir. Obs: Ainda não o WHERE unidade/data)??? -->
        
        <?php if (mysqli_num_rows($result) !== 0) { ?>

        <?php //if($result){ ?>

        <!-- Exibir os 12 serviços padrão -->
        <form action="index.php" method="POST">
        <?php $n=0; ?>

        <?php while ($row = $result->fetch_assoc()) { $n++; ?> <br>
            
             <!-- lista de serviços -->                 
            <div class="row">
                <div class="col-6">    
                    <?php echo $row["nome_servico"]; ?>
                </div>
                <div class="col-6">
                    <?php 
                        if (($row['hora_inicio'] == '00:00') && ($row['hora_fim'] == '00:00')){
                            echo 'Fechado';
                        } else {
                        echo $row["hora_inicio"].' - '.$row["hora_fim"];
                        }
                    ?>
                </div>
            </div>

            <!-- divs de edição (ocultas) com id sequencial update1-12 -->
            
                <div class="collapse multi-collapse" id="update<?php echo $n?>">
                    <div class="row card card-body">
                        <div class="col-8">
                            <input type=hidden name="id_situacaoreal_<?php echo $n ?>" value="<?php echo $row['id_situacaoreal']; ?>" >
                            
                            Horário inicial:
                                <select id="hi_<?php echo $n?>" 
                                        name="hora_inicio_<?php echo $n ?>" 
                                        value="<?php echo $row["hora_inicio"];?>"
                                        <?php if (($row['hora_inicio'] == '00:00') && ($row['hora_fim'] == '00:00')) { echo 'disabled';} ?>>>
            
                                    <?php for ( $hora=7; $hora <= 22; $hora++) { $pad = ( $hora < 10 ) ? '0' : '' ?>
                                        <option value="<?php echo $pad . $hora ?>:00" 
                                            <?php echo ($row['hora_inicio'] == $pad . $hora . ':00') ? 'selected' : '' ?>><?php echo $pad . $hora ?>:00
                                        </option>
                                        <?php if ($hora !== 22) { ?>
                                            <option value="<?php echo $pad . $hora ?>:30" 
                                            <?php echo ($row['hora_inicio'] == $pad . $hora . ':30') ? 'selected' : '' ?>><?php echo $pad . $hora ?>:30
                                        </option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            
                            <span style="padding-left: 20px">
                            
                            Horário final:
                                <select id="hf_<?php echo $n?>" 
                                        name="hora_fim_<?php echo $n ?>" 
                                        value="<?php echo $row["hora_fim"]; ?>"
                                        <?php if (($row['hora_inicio'] == '00:00') && ($row['hora_fim'] == '00:00')) { echo 'disabled';} ?>>

                                        <?php for ( $hora=7; $hora <= 22; $hora++) { $pad = ( $hora < 10 ) ? '0' : '' ?>
                                        <option value="<?php echo $pad . $hora ?>:00" 
                                            <?php echo ($row['hora_fim'] == $pad . $hora . ':00') ? 'selected' : '' ?>><?php echo $pad . $hora ?>:00
                                        </option>
                                        <?php if ($hora !== 22) { ?>
                                        <option value="<?php echo $pad . $hora ?>:30" 
                                            <?php echo ($row['hora_fim'] == $pad . $hora . ':30') ? 'selected' : '' ?>><?php echo $pad . $hora ?>:30
                                        </option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>

                            <span style="padding-left: 20px">
                            
                            <!-- se checked, desabilita 2 selects -->
                            <input id="checkbox_<?php echo $n?>" 
                                   type="checkbox"       
                                   onchange="disable_selects(this, <?php echo $n?>)"
                                   <?php if (($row['hora_inicio'] == '00:00') && ($row['hora_fim'] == '00:00')) { echo 'checked';} ?>
                                   > Fechado

                            
                            <span style="padding-left: 20px">
                            
                        </div>
                    </div>
                </div>
            
        
        <?php } ?>
        
        

        
        <!-- VAGAS ALÔ SAÚDE -->
        <?php while ($row_alosaude = $result_alosaude->fetch_assoc()){ ?> <br>        
            
            <!-- EXIBE VAGAS MÉD/ENF: SIM/NÃO -->
            <div class="row">
                <div class="col-6">    
                    <span>Alô Saúde Med/Enf:</span>
                </div>
                <div class="col-6">
                    <?php 
                        if ($row_alosaude["vaga_med_enf"] == 0) {
                            echo 'Não';
                        } else {
                            echo 'Sim';
                        } ?>
                </div>
            </div>

            <!-- Update não funcional, pois update dos 12 serviços é baseado no id_situacaoreal da outra tabela -->
            <!--<form action="index.php" method="POST"> -->
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
                            <!--<input type="submit" value="Alterar"> -->
                        </div>
                    </div>
                </div>
            <br>

            <!-- EXIBE VAGAS ODONTO: SIM/NÃO -->
            <div class="row">
                <div class="col-6">
                    <span>Alô Saúde Odonto: </span>
                </div>
                <div class="col-6">
                <?php 
                        if ($row_alosaude["vaga_odonto"] == 0) {
                            echo 'Não';
                        } else {
                            echo 'Sim';
                        } ?>
                </div>
            </div>

            <!-- Update não funcional -->
            <!-- <form action="index.php" method="POST"> -->
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
                            <!-- <input type="submit" value="Alterar"> -->
                        </div>
                    </div>
                </div>

        <?php } ?>

        <!-- EXIBE OBSERVAÇÕES -->
        <?php while ($row_observacoes = $result_observacoes->fetch_assoc()){ ?> <br>
            <div class="row">
                <div class="col-6">
                    <span>Observações: </span>
                </div>
                <div class="col-6">
                    <?php echo $row_observacoes["observacoes"]; ?>
                </div>
            </div>

            <!-- Update não funcional -->
            <!--<form action="index.php" method="POST"> -->
                <div class="collapse multi-collapse" id="update15">
                    <div class="row card card-body">
                        <div class="col-6">
                            <input type=hidden name="id_observacoes" value="<?php echo $row_observacoes['id_obs']; ?>">
                            <textarea name="observacoes" rows="3" cols="50"><?php echo $row_observacoes['observacoes']; ?></textarea>
                            <!-- <input type="submit" value="Alterar"> -->
                        </div>
                    </div>
                </div>
            <!--</form>-->

        <?php } ?>

        <br>
        <div class="collapse multi-collapse" id="botao_alterar">
                <input type="submit" value="Alterar">
        </div>

        </form>


    </div>
    

<!-- FINALIZA IF -->
<?php } else { echo 'Sem informações na data selecionada.';} ?>

<?php $conn->close();?>

<!-- FUNÇÕES -->
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

    function disable_selects(checkbox, n) {
        var hi = document.getElementById('hi_' + n);
        var hf = document.getElementById('hf_' + n);
        if (checkbox.checked) { 
            hi.setAttribute('disabled', 'disabled');
            hf.setAttribute('disabled', 'disabled');
        } else {
            hi.removeAttribute('disabled');
            hf.removeAttribute('disabled');
        }

    }


   </script>

<?php include 'footer.php' ?>


<!--<div style="background: linear-gradient(to right, #0145b8, #00e5e0, #00f25e);">Teste div gradiente</div> -->

