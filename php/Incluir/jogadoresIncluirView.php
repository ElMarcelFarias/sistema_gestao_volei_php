<div class="modal fade" id="newJogadoresModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cadastro de Jogadores</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="material-icons ">close</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="newJogadoresForm" method="POST">
                <div class="modal-body">
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jogadores_add_nome">Nome</label>
                                <input type="text" class="form-control" name="jogadores_add_nome" id="jogadores_add_nome" style="text-transform: uppercase;">
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jogadores_add_sobrenome">Sobrenome</label>
                                <input type="text" class="form-control" name="jogadores_add_sobrenome" id="jogadores_add_sobrenome" style="text-transform: uppercase;">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jogadores_add_whatssap">Telefone (Whatssap)</label>
                                <input type="text" class="form-control" name="jogadores_add_whatssap" id="jogadores_add_whatssap" style="text-transform: uppercase;">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jogadores_add_cpf">CPF</label>
                                <input type="text" class="form-control cpf" name="jogadores_add_cpf" id="jogadores_add_cpf" style="text-transform: uppercase;">
                            </div>
                        </div>
                        

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jogadores_add_cep">CEP</label>
                                <input type="text" class="form-control" name="jogadores_add_cep" id="jogadores_add_cep" onblur="preencherEndereco(this.value)" style="text-transform: uppercase;">
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jogadores_add_cidade">Cidade</label>
                                <input type="text" class="form-control" name="jogadores_add_cidade" id="jogadores_add_cidade">
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jogadores_add_bairro">Bairro</label>
                                <input type="text" class="form-control" name="jogadores_add_bairro" id="jogadores_add_bairro">
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jogadores_add_rua">Rua</label>
                                <input type="text" class="form-control" name="jogadores_add_rua" id="jogadores_add_rua">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jogadores_add_numero">Número</label>
                                <input type="text" class="form-control" name="jogadores_add_numero" id="jogadores_add_numero" maxlength="6" style="text-transform: uppercase;">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jogadores_add_sexo">Sexo</label>
                                <select name="jogadores_add_sexo" id="jogadores_add_sexo" class="custom-select">
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jogadores_add_altura">Altura</label>
                                <input type="text" class="form-control" name="jogadores_add_altura" id="jogadores_add_altura" maxlength="3" style="text-transform: uppercase;">
                            </div>
                        </div>


                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="jogadores_add_data_nascimento">Data de Nascimento</label>
                                <input type="date" class="form-control" name="jogadores_add_data_nascimento" id="jogadores_add_data_nascimento">
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
    $(document).ready(function () { 
        var cpf = $('#jogadores_add_cpf');
        cpf.mask('000.000.000-00', {reverse: false});

        var cep = $('#jogadores_add_cep');
        cep.mask('00000-000', {reverse: false});
        
        var altura = $('#jogadores_add_altura');
        altura.mask('0,00', {reverse: false});

        var telefone = $('#jogadores_add_whatssap');
        telefone.mask('(00) 00000-0000', {reverse: false});
    });



    $(function(){
        //Executa a requisição quando o campo username perder o foco
        $('#jogadores_add_cpf').blur(function()
        {
            var cpf = $('#jogadores_add_cpf').val().replace(/[^0-9]/g, '').toString();

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

                    $('#jogadores_add_cpf').val('');
                    $('#jogadores_add_cpf').focus();
                }
            }
            
        });
    });

    //API VIA CEP 
    function preencherEndereco(cep){
        $('#jogadores_add_cidade').val('');
        $('#jogadores_add_bairro').val('');
        $('#jogadores_add_rua').val('');

        $.getJSON("https://viacep.com.br/ws/"+cep+"/json/?callback=?", function(dados) {
            if (!("erro" in dados)) {       
                $("#jogadores_add_rua").val(dados.logradouro);
                $("#jogadores_add_bairro").val(dados.bairro);
                $("#jogadores_add_cidade").val(dados.localidade);                                
            }else {                        
                Swal.fire(
                        'Erro',
                        'CEP não encontrado! Preencha o endereço manualmente.',
                        'error'
                        )
            }
        });
    }

    // Adicionar um campo, via AJAX SweetAlerts2
    $(document).ready(function(){
        $("#newJogadoresForm").submit(function(e){
            e.preventDefault();

            var jogadores_nome = $("#jogadores_add_nome").val(); 
            var jogadores_sobrenome = $("#jogadores_add_sobrenome").val();
            var jogadores_cpf = $("#jogadores_add_cpf").val();
            var jogadores_cep = $("#jogadores_add_cep").val();
            var jogadores_cidade = $("#jogadores_add_cidade").val();
            var jogadores_bairro = $("#jogadores_add_bairro").val();
            var jogadores_rua = $("#jogadores_add_rua").val();
            var jogadores_numero = $("#jogadores_add_numero").val();
            var jogadores_sexo = $("#jogadores_add_sexo").val();
            var jogadores_altura = $("#jogadores_add_altura").val();
            var jogadores_data_nascimento = $("#jogadores_add_data_nascimento").val();
            var jogadores_whatssap = $("#jogadores_add_whatssap").val();

            
            if(jogadores_whatssap == '' ||jogadores_nome == '' || jogadores_sobrenome == '' || jogadores_cpf == ''  || jogadores_cep == '' || jogadores_cidade == ''  || jogadores_bairro == '' || jogadores_rua == '' || jogadores_numero == '' || jogadores_sexo == '' || jogadores_altura == '' || jogadores_data_nascimento == '') {
                Swal.fire(
                    'Erro',
                    'Por favor, preencha os campos corretamente!',
                    'error'
                    )
            } else {
                $.ajax({
                    url: 'Incluir/jogadoresIncluir.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    cache: false,
                    success:function(data){
                        $('#newJogadoresModal').hide();
                        Swal.fire({
                            title: 'Success',
                            text: 'Jogador adicionado com sucesso!',
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