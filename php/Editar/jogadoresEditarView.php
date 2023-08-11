<?php

include_once '../conexaoBanco.php';

if(isset($_REQUEST['id'])){

    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM players WHERE id_players = '$id'";
    $query = $con->query($sql) or die($con->error);
    $row = $query->fetch_assoc();

    
    $nome = $row['name'];
    $nomeCompleto = explode(" ", $nome);
    $count = count($nomeCompleto);

    $text = "";
    for($i = 1; $i < $count; $i++) {
        $text = $text . $nomeCompleto[$i]. " ";  
    
    }        
    

    $cpf = $row['cpf'];
    $cep = $row['zipcode'];
    $cidade = $row['city'];
    $bairro = $row['neighborhood'];
    $rua = $row['street'];
    $numero = $row['number'];
    $sexo = $row['gender'];
    $dataNascimento = $row['birthdate'];
    $altura = $row['height'];
    $telefone = $row['whatssap'];
}
?>

<div class="modal fade" id="editarJogadoresModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edição de Jogadores</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="material-icons ">close</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="editarJogadoresForm" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="jogadores_edit_id" name="jogadores_edit_id" value="<?= $id?>">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jogadores_edit_nome">Nome</label>
                                <input type="text" class="form-control" name="jogadores_edit_nome" id="jogadores_edit_nome" value="<?=$nomeCompleto[0]?>" style="text-transform: uppercase;">
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jogadores_edit_sobrenome">Sobrenome</label>
                                <input type="text" class="form-control" name="jogadores_edit_sobrenome" id="jogadores_edit_sobrenome" value="<?=$text?>" style="text-transform: uppercase;">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jogadores_edit_whatssap">Telefone (Whatssap)</label>
                                <input type="text" class="form-control" name="jogadores_edit_whatssap" id="jogadores_edit_whatssap" value="<?=$telefone?>" style="text-transform: uppercase;">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jogadores_edit_cpf">CPF</label>
                                <input type="text" class="form-control cpf" name="jogadores_edit_cpf" id="jogadores_edit_cpf" value="<?=$cpf?>" style="text-transform: uppercase;">
                            </div>
                        </div>
                        

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jogadores_edit_cep">CEP</label>
                                <input type="text" class="form-control" name="jogadores_edit_cep" id="jogadores_edit_cep" value="<?=$cep?>" onblur="preencherEndereco(this.value)" style="text-transform: uppercase;">
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jogadores_edit_cidade">Cidade</label>
                                <input type="text" class="form-control" name="jogadores_edit_cidade" value="<?=$cidade?>" id="jogadores_edit_cidade">
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jogadores_edit_bairro">Bairro</label>
                                <input type="text" class="form-control" name="jogadores_edit_bairro" value="<?=$bairro?>" id="jogadores_edit_bairro">
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jogadores_edit_rua">Rua</label>
                                <input type="text" class="form-control" name="jogadores_edit_rua" value="<?=$rua?>" id="jogadores_edit_rua">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jogadores_edit_numero">Número</label>
                                <input type="text" class="form-control" name="jogadores_edit_numero" value="<?=$numero?>" id="jogadores_edit_numero" maxlength="6" style="text-transform: uppercase;">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jogadores_edit_sexo">Sexo</label>
                                <select name="jogadores_edit_sexo" id="jogadores_edit_sexo" class="custom-select">
                                    <option value="M" <?= $sexo == "M"? "selected": ''?>>Masculino</option>
                                    <option value="F" <?= $sexo == "F"? "selected": ''?>>Feminino</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jogadores_edit_altura">Altura</label>
                                <input type="text" class="form-control" name="jogadores_edit_altura" id="jogadores_edit_altura" value="<?=$altura?>" maxlength="3" style="text-transform: uppercase;">
                            </div>
                        </div>


                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="jogadores_edit_data_nascimento">Data de Nascimento</label>
                                <input type="date" class="form-control" name="jogadores_edit_data_nascimento" value="<?=$dataNascimento?>" id="jogadores_edit_data_nascimento">
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

    
    //máscaras de cpf e cep
    $(document).ready(function () { 
        
        var cpf = $('#jogadores_edit_cpf');
        cpf.mask('000.000.000-00', {reverse: false});

        var cep = $('#jogadores_edit_cep');
        cep.mask('00000-000', {reverse: false});

        var altura = $('#jogadores_edit_altura');
        altura.mask('0,00', {reverse: false});

        var telefone = $('#jogadores_edit_whatssap');
        telefone.mask('(00) 00000-0000', {reverse: false});
    });


    //validação cpf
    $(function(){
    //Executa a requisição quando o campo username perder o foco
    $('#jogadores_edit_cpf').blur(function()
        {
            var cpf = $('#jogadores_edit_cpf').val().replace(/[^0-9]/g, '').toString();

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

                    $('#jogadores_edit_cpf').val('');
                    $('#jogadores_edit_cpf').focus();
                }
            }
            
        });
    });

    //API VIA CEP 
    function preencherEnderecoEditAlunos(cep){
        $('#jogadores_edit_cidade').val('');
        $('#jogadores_edit_bairro').val('');
        $('#jogadores_edit_rua').val('');

        $.getJSON("https://viacep.com.br/ws/"+cep+"/json/?callback=?", function(dados) {
            if (!("erro" in dados)) {       
                $("#jogadores_edit_rua").val(dados.logradouro);
                $("#jogadores_edit_bairro").val(dados.bairro);
                $("#jogadores_edit_cidade").val(dados.localidade);                                
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
        $("#editarJogadoresForm").submit(function(e){
            e.preventDefault();

            var jogadores_nome = $("#jogadores_edit_nome").val(); 
            var jogadores_sobrenome = $("#jogadores_edit_sobrenome").val();
            var jogadores_cpf = $("#jogadores_edit_cpf").val();
            var jogadores_cep = $("#jogadores_edit_cep").val();
            var jogadores_cidade = $("#jogadores_edit_cidade").val();
            var jogadores_bairro = $("#jogadores_edit_bairro").val();
            var jogadores_rua = $("#jogadores_edit_rua").val();
            var jogadores_numero = $("#jogadores_edit_numero").val();
            var jogadores_sexo = $("#jogadores_edit_sexo").val();
            var jogadores_altura = $("#jogadores_edit_altura").val();
            var jogadores_data_nascimento = $("#jogadores_edit_data_nascimento").val();
            var jogadores_whatssap = $("#jogadores_edit_whatssap").val();

            
            if(jogadores_whatssap == '' ||jogadores_nome == '' || jogadores_sobrenome == '' || jogadores_cpf == ''  || jogadores_cep == '' || jogadores_cidade == ''  || jogadores_bairro == '' || jogadores_rua == '' || jogadores_numero == '' || jogadores_sexo == '' || jogadores_altura == '' || jogadores_data_nascimento == '') {
                Swal.fire(
                    'Erro',
                    'Por favor, preencha os campos corretamente!',
                    'error'
                    )
            } else {

                Swal.fire({
                    title: 'Realmente quer fazer isto?',
                    text: "Você irá editar um registro do Jogador!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, editar!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'Editar/editarJogador.php',
                            type: 'POST',
                            cache: false, 
                            data: $(this).serialize(),
                            success:function(){
                                Swal.fire({
                                    title: 'Success',
                                    icon: 'success',
                                    text: 'Jogador editado com sucesso!'
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