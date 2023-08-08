<?php

include_once '../conexaoBanco.php';

if(isset($_REQUEST['id'])){

    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM games WHERE id_game = '$id'";
    $query = $con->query($sql) or die($con->error);
    $row = $query->fetch_assoc();

    
    $estadiofk = $row['id_stadiumfk'];
    $jogador_responsavelfk = $row['id_playersfk'];
    $qtd_pessoas = $row['quantity_peaple'];
    $preco = $row['price'];
    $duracao = $row['game_duration'];
    $data_partida = $row['game_date'];
    $forma_pagamento = $row['payment'];
    

}

?>

<div class="modal fade" id="editarGameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edição da Partida</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="material-icons ">close</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="editarGameForm" method="POST">
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="hidden" value="<?= $id?>" name="games_edit_id" id="games_edit_id">
                                    <label for="games_edit_estadio">Estádio</label>
                                    <select name="games_edit_estadio" id="games_edit_estadio" class="custom-select">
                                        <?php
                                            $sql = "SELECT * FROM stadium";
                                            $query = $con->query($sql) or die($con->error);
                                            $estadioArray = array();

                                            while($a = mysqli_fetch_assoc($query)) {
                                                array_push($estadioArray, $a);
                                            }

                                            foreach($estadioArray as $estadio) {
                                                if($estadiofk == $estadio) {
                                                    echo "<option value='".$estadio['id_stadium']."' selected>".strtoupper($estadio['stadium_name'].' - '.substr_replace(($estadio['zipcode']), '-', 5, 0))."</option>"; 
                                                } 
                                                echo "<option value='".$estadio['id_stadium']."'>".strtoupper($estadio['stadium_name'].' - '.substr_replace(($estadio['zipcode']), '-', 5, 0))."</option>";
                                                
                                            }

                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="games_edit_jogador_responsavel">Jogador Responsável</label>
                                    <select name="games_edit_jogador_responsavel" id="games_edit_jogador_responsavel" class="custom-select">
                                        <?php 
                                            $sql = "SELECT * FROM players";
                                            $query = $con->query($sql) or die($con->error);
                                            $playersArray = array();

                                            while($a = mysqli_fetch_assoc($query)) {
                                                array_push($playersArray, $a);
                                            }

                                            foreach($playersArray as $players) {
                                                if($jogador_responsavelfk == $players) {
                                                    echo "<option value='".$players['id_players']."' selected>".strtoupper($players['name'].' - '.number_format($players['height']/100, 2, ',', '')).'m'."</option>";
                                                }
                                                echo "<option value='".$players['id_players']."'>".strtoupper($players['name'].' - '.number_format($players['height']/100, 2, ',', '')).'m'."</option>";
                                            }
                                                
                                        ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="games_edit_qtd_pessoas">Qtd. Pessoas</label>
                                    <input type="text" class="form-control" name="games_edit_qtd_pessoas" id="games_edit_qtd_pessoas" value="<?php echo $qtd_pessoas; ?>">
                                </div>
                            </div>
                            

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="games_edit_preco">Preço</label>
                                    <input type="text" class="form-control" name="games_edit_preco" id="games_edit_preco" value="<?php echo $preco; ?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="games_edit_duracao">Duração Partida</label>
                                    <input type="time" class="form-control" name="games_edit_duracao" id="games_edit_duracao" value="<?php echo $duracao; ?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="games_edit_data_partida">Data da Partida</label>
                                    <input type="date" class="form-control" name="games_edit_data_partida" id="games_edit_data_partida" value="<?php echo $data_partida; ?>">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="games_edit_forma_pagamento">Forma de Pagamento</label> 
                                    <select name="games_edit_forma_pagamento" id="games_edit_forma_pagamento" class="custom-select">
                                        <option value='DINHEIRO' <?= $sexo == "DINHEIRO"? "selected": ''?>>Dinheiro</option>
                                        <option value='BOLETO'  <?= $sexo == "BOLETO"? "selected": ''?>>Boleto</option>
                                        <option value='CREDITO' <?= $sexo == "CREDITO"? "selected": ''?>>Crédito - Á vista</option>
                                        <option value='DEBITO' <?= $sexo == "DEBITO"? "selected": ''?>>Débito</option>
                                        <option value='PIX' <?= $sexo == "PIX"? "selected": ''?>>PIX</option>
                                    </select>
                                </div>
                            </div>

                            

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="material-icons align-text-bottom">close</span></button>
                        <button type="submit" class="btn btn-success"><span class="material-icons align-text-bottom">done</span></button>
                    </div>

                    </div>
                </form>

            </div>
          </div>
        </div>
    </div>






<script>

    //máscaras de cpf e cep
    $(document).ready(function () { 

        var cpf = $('#edit_alunos_cpf');
        cpf.mask('000.000.000-00', {reverse: false});

        var cep = $('#edit_alunos_cep');
        cep.mask('00000-000', {reverse: false});
    });


    //validação cpf
    $(function(){
    //Executa a requisição quando o campo username perder o foco
    $('#edit_alunos_cpf').blur(function()
        {
            var cpf = $('#edit_alunos_cpf').val().replace(/[^0-9]/g, '').toString();

            if( cpf.length == 11 )
            {
                var v = [];

                //Calcula o primeiro dígito de verificação.
                v[0] = 1 * cpf[0] + 2 * cpf[1] + 3 * cpf[2];
                v[0] += 4 * cpf[3] + 5 * cpf[4] + 6 * cpf[5];
                v[0] += 7 * cpf[6] + 8 * cpf[7] + 9 * cpf[8];
                v[0] = v[0] % 11;
                v[0] = v[0] % 10;

                //Calcula o segundo dígito de verificação.
                v[1] = 1 * cpf[1] + 2 * cpf[2] + 3 * cpf[3];
                v[1] += 4 * cpf[4] + 5 * cpf[5] + 6 * cpf[6];
                v[1] += 7 * cpf[7] + 8 * cpf[8] + 9 * v[0];
                v[1] = v[1] % 11;
                v[1] = v[1] % 10;

                //Retorna Verdadeiro se os dígitos de verificação são os esperados.
                if ( (v[0] != cpf[9]) || (v[1] != cpf[10]) )
                {
                    Swal.fire(
                        'Erro',
                        'Por favor, preencha um CPF válido!',
                        'error'
                        )

                    $('#edit_alunos_cpf').val('');
                    $('#edit_alunos_cpf').focus();
                }
            }
            
        });
    });

    //API VIA CEP 
    function preencherEnderecoEditAlunos(cep){
        $('#edit_alunos_cidade').val('');
        $('#edit_alunos_bairro').val('');
        $('#edit_alunos_rua').val('');

        $.getJSON("https://viacep.com.br/ws/"+cep+"/json/?callback=?", function(dados) {
            if (!("erro" in dados)) {       
                $("#edit_alunos_rua").val(dados.logradouro);
                $("#edit_alunos_bairro").val(dados.bairro);
                $("#edit_alunos_cidade").val(dados.localidade);                                
            }else {                        
                Swal.fire(
                        'Erro',
                        'CEP não encontrado! Preencha o endereço manualmente.',
                        'error'
                        )
            }
        });
    }



    $(document).ready(function(){
        $("#editarGameForm").submit(function(e){
            e.preventDefault();

            var estadio = $("#games_edit_estadio").val();
            var jogador_responsavel = $("#games_edit_jogador_responsavel").val();
            var qtd_pessoas = $("#games_edit_qtd_pessoas").val();
            var preco = $("#games_edit_preco").val();
            var duracao = $("#games_edit_duracao").val();
            var data_partida = $("#games_edit_data_partida").val();
            var forma_pagamento = $("#games_edit_forma_pagamento").val();

            
            if(estadio == '' || jogador_responsavel == '' || qtd_pessoas == '' || preco == '' || duracao == '' || data_partida == '' || forma_pagamento == '') {
                Swal.fire({
                    title: 'Error',
                    text: 'Por favor, preencha os campos corretamente!',
                    icon: 'warning'
                })
            } else {

                Swal.fire({
                    title: 'Realmente quer fazer isto?',
                    text: "Você irá editar um registro desta partida!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, editar!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'Editar/editarGame.php',
                            type: 'POST',
                            cache: false, 
                            data: $(this).serialize(),
                            success:function(){
                                Swal.fire({
                                    title: 'Success',
                                    icon: 'success',
                                    text: 'Aluno editado com sucesso!'
                                }).then(()=>{
                                    window.location.reload();
                                })
                            }
                        })
                    }
                })

                
            }

        })
    })
</script>