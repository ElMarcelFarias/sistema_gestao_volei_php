<div class="modal fade" id="newGameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cadastro de Partidas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="material-icons ">close</span>
            </button>
        </div>
            <div class="modal-body">
                <form id="newGameForm" method="POST">
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="games_add_estadio">Estádio</label>
                                        <select name="games_add_estadio" id="games_add_estadio" class="custom-select">
                                            <?php 
                                                $sql = "SELECT * FROM stadium";
                                                $query = $con->query($sql) or die($con->error);
                                                $estadioArray = array();

                                                while($a = mysqli_fetch_assoc($query)) {
                                                    array_push($estadioArray, $a);
                                                }

                                                foreach($estadioArray as $estadio) {
                                                    echo "<option value='".$estadio['id_stadium']."'>".strtoupper($estadio['stadium_name'].' - '.substr_replace(($estadio['zipcode']), '-', 5, 0))."</option>";
                                                }
                                                
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="games_add_jogador_responsavel">Jogador Responsável</label>
                                        <select name="games_add_jogador_responsavel" id="games_add_jogador_responsavel" class="custom-select">
                                            <?php 
                                                $sql = "SELECT * FROM players";
                                                $query = $con->query($sql) or die($con->error);
                                                $playersArray = array();

                                                while($a = mysqli_fetch_assoc($query)) {
                                                    array_push($playersArray, $a);
                                                }

                                                foreach($playersArray as $players) {
                                                    echo "<option value='".$players['id_players']."'>".strtoupper($players['name'].' - '.number_format($players['height']/100, 2, ',', '')).'m'."</option>";
                                                }
                                                
                                            ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="games_add_qtd_pessoas">Qtd. Pessoas</label>
                                        <input type="text" class="form-control" name="games_add_qtd_pessoas" id="games_add_qtd_pessoas">
                                    </div>
                                </div>
                                

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="games_add_preco">Preço</label>
                                        <input type="text" class="form-control" name="games_add_preco" id="games_add_preco">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="games_add_duracao">Duração Partida</label>
                                        <input type="time" class="form-control" name="games_add_duracao" id="games_add_duracao">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="games_add_data_partida">Data da Partida</label>
                                        <input type="date" class="form-control" name="games_add_data_partida" id="games_add_data_partida">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="games_add_forma_pagamento">Forma de Pagamento</label>
                                        <select name="games_add_forma_pagamento" id="games_add_forma_pagamento" class="custom-select">
                                            <option value="DINHEIRO">Dinheiro</option>
                                            <option value="BOLETO">Boleto</option>
                                            <option value="CREDITO">Crédito - Á vista</option>
                                            <option value="DEBITO">Débito</option>
                                            <option value="PIX">PIX</option>
                                        </select>
                                    </div>
                                </div>

                                

                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="material-icons align-text-bottom">close</span></button>
                        <button type="submit" class="btn btn-success text-white"><span class="material-icons align-text-bottom">done</span></button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    // Adicionar um campo, via AJAX SweetAlerts2
    $(document).ready(function(){
        $("#newGameForm").submit(function(e){
            e.preventDefault();

            var estadio = $("#games_add_estadio").val();
            var jogador_responsavel = $("#games_add_jogador_responsavel").val();
            var qtd_pessoas = $("#games_add_qtd_pessoas").val();
            var preco = $("#games_add_preco").val();
            var duracao = $("#games_add_duracao").val();
            
            if(duracao = "01:00") {
                duracao = "1"
            }else if (duracao = "02:00") {
                duracao = "2"
            } else if (duracao = "03:00") {
                duracao = "3"
            } else {
                duracao = "0";
            }

            var data_partida = $("#games_add_data_partida").val();
            var forma_pagamento = $("#games_add_forma_pagamento").val();

            
            if(estadio == '' || jogador_responsavel == '' || qtd_pessoas == '' || preco == '' || duracao == '' || data_partida == '' || forma_pagamento == '') {
                Swal.fire({
                    title: 'Error',
                    text: 'Por favor, preencha os campos corretamente!',
                    icon: 'warning'
                })
            } else {
                $.ajax({
                    url: 'Incluir/gamesIncluir.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    cache: false,
                    success:function(data){
                        $('#newGameModal').hide();
                        Swal.fire({
                            title: 'Success',
                            text: 'Partida cadastrada com sucesso!',
                            icon: 'success'
                        }).then(()=>{
                            window.location.reload();
                        })
                        
                    }
                })
            }
            

        })
    })
</script>