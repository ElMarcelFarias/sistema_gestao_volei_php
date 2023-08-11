<?php include_once 'conexaoBanco.php';?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.18/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/basestyle/style.css">
    <script src="../assets/js/lib/jquery.min.js"></script>
    <script src="../assets/js/lib/moment.min.js"></script>
    <script src="../assets/js/datatables/DataTables-1.11.5/css/dataTables.bootstrap4.css"></script>
    <script src="../assets/css/dataTables.responsive.css"></script>

    
    <title>Gestão Vôlei | ADM</title>
</head>
<body>
    <!-- Pre Loader-->
    <div class="loader-wrapper">
        <div class="spinner">
          <svg viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
            <circle class="length" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="28"></circle>
          </svg>
          <svg viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
            <circle fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="28"></circle>
          </svg>
          <svg viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
            <circle fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="28"></circle>
          </svg>
          <svg viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
            <circle fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="28"></circle>
          </svg>
        </div>
    </div>

    <section class="wrapper">
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <nav class="navbar navbar-dark bg-primary">
              <a class="navbar-brand m-0 py-2 brand-title" href="#">Gestão Vôlei</a>
              <span></span>
              <a class="navbar-brand py-2 material-icons toggle-sidebar" href="#">menu</a>
            </nav>

            <nav class="navigation">
              <ul>
                  <li class="active"><a href="index.html" data-toggle="modal" data-target="#newGameModal" title="Adicionar novo Jogo"><span class="nav-icon material-icons">add</span> Cadastro novo Jogo!</a></li>
                  
                  <!-- ARRUMAR OS LINKS DEPOIS -->
                  <li class="active" title="Cadastro de Alunos"><a><span class="nav-icon material-icons ">sports_volleyball</span> Partidas </a>
                  </li>
                  <li title="Cadastro de Jogadores"><a href="indexJogadores.php"><span class="nav-icon material-icons ">sports_handball</span>Jogadores </a>
                  </li>
                  <li title="Cadastro de Estádios"><a href="newCadFuncionarios.php"><span class="nav-icon material-icons ">stadium</span> Estádios </a>
                  </li>
                  <li title="Cadastro de Usuários"><a href="newCadPlanos.php"><span class="nav-icon material-icons ">group_add</span> Usuarios </a>
                  </li>
                  
              </ul>
                  
              </ul>

              <label title="Documentação"><span>Ajuda para Administradores<span></label>
              <ul>
                  <li><a href="https://github.com/ElMarcelFarias/sa_academia" title="Documentação" target="_blank"><span class="nav-icon material-icons">school</span> Documentação</a></li>
                  <li><form action="gerarPDF.php"><button type="" class="btn text-center" style="background-color: transparent; color: #6c757d;"><span class="ml-1 mr-2 nav-icon material-icons">picture_as_pdf</span>Gerar PDF</button></form></li>
                  <li><a href="efetuarLogout.php"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg> Logout
                      </a>
                  </li>
              </ul>
            </nav>

          </aside>

        <div class="content-area">
          <div class="content-wrapper">

            <div class="row page-tilte align-items-center">
              <div class="col-md-auto">
                <a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
                <h1 class="weight-300 h3 title"><span class="nav-icon material-icons ">sports_volleyball</span> Partidas </h1>
              </div> 
              <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
                <div class="controls d-flex justify-content-center justify-content-md-end">
                  
                </div>
              </div>
            </div> 

            <div class="content">
                
                <table id="example" class="table table-striped mb-4 bg-white table-bordered">
                <thead>
                    <tr>
                        <th>Estádio</th>
                        <th>Qtd. Jogadores</th>
                        <th>Jogador Responsável</th>
                        <th>Preço</th>
                        <th>Data</th>
                        <th>Duração</th>
                        <th>Pagamento</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                    $sql = "SELECT s.stadium_name as stadium_name, p.name as name_checked ,g.* FROM 
                                stadium as s inner join games as g on s.id_stadium = id_stadiumfk inner join 
                                players as p on p.id_players = g.id_playersfk 
                            WHERE g.status = 'A'";
                    
                    $query = $con->query($sql) or die($con->error);

                    while($row = $query->fetch_assoc()){
                        ?>

                        <tr>
                            <td><?= strtoupper($row['stadium_name'])?></td>
                            <td><?= strtoupper($row['quantity_peaple'])?></td>
                            <td><?= strtoupper($row['name_checked'])?></td>
                            <td><?= strtoupper($row['price'])?></td>
                            <td><?= date('d/m/Y', strtotime($row['game_date'])) ?></td>
                            <td><?= strtoupper($row['game_duration']).'hr'?></td>
                            <td><?= strtoupper($row['payment'])?></td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm deleteGame" id="<?= $row['id_game']?>"><span class="material-icons align-text-bottom">delete</span></button>
                                <button type="button" class="btn btn-warning btn-sm editarGame" id="<?=$row['id_game']?>"><span class="material-icons align-text-bottom">edit</span></button>
                            </td>
                        </tr> 
                        <?php
                    }

                    ?>

                </tbody>
                    
            </table>

          </div>
            <footer class="footer">
              <p class="text-muted m-0"><small class="float-right">Feito por <span class="material-icons md-16 text-danger align-middle">favorite</span> by Marcel Farias </small><small >Gestão Vôlei © 2023 </small></p>
            </footer>

          </div>
        </div>
    </section>
    <?php require 'Incluir/gamesIncluirView.php'; ?>


    <div id="modal_edit"></div>

    <script src="../assets/js/lib/moment.min.js"></script>
    <script src="../assets/js/lib/jquery.min.js"></script>
    <script src="../assets/js/datatables/DataTables-1.11.5/js/jquery.dataTables.js"></script>
    <script src="../assets/js/datatables/DataTables-1.11.5/js/dataTables.bootstrap4.js"></script>
    <script src="../assets/js/lib/popper.min.js"></script>
    <script src="../assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="../assets/js/chosen-js/chosen.jquery.js"></script>
    <script src="../assets/js/custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.18/sweetalert2.all.min.js"></script>

<script>

<?php if(isset($_GET['return'])) { ?>

    Swal.fire(
            'Erro',
            'Você não tem permissão para acessar esse cadastro!',
            'error'
            )

<?php } ?>


//DataTables script 
$(document).ready(function() {
    $('#example').DataTable({
        language: {
            lengthMenu: 'Páginas disponiveis _MENU_ ',
            zeroRecords: 'Nada encontrado, desculpe!',
            info: 'Página _PAGE_ de _PAGES_',
            infoEmpty: 'Não há registros disponíveis',
            infoFiltered: '(filtrando de _MAX_ total regristros)',
            search: 'Pesquisar',
                "paginate": {
                "first":      "Primeira",
                "last":       "Last",
                "next":       "Próxima",
                "previous":   "Anterior"
            },
        },
    });
    
} );


//Função para edição 
$(document).on('click', '.editarGame', function(){
    var id = $(this).attr('id');

    $("#modal_edit").html('');
    $.ajax({
        url: 'Editar/gamesEditarView.php',
        type: 'POST',
        cache: false,
        data: {id:id},
        success:function(data){
            $("#modal_edit").html(data);
            $("#editarGameModal").modal('show');
        }
    })
    

})


//Deletar registro. 
$(document).on('click', '.deleteGame', function(){
    var id = $(this).attr('id');

    Swal.fire({
        title: 'Realmente quer fazer isto?',
        text: "A partida será deletada permanentemente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, deletar!'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'Excluir/gamesDeletar.php',
                type: 'POST',
                data: {id:id},
                success:function(data){
                    Swal.fire({
                        title: 'Success',
                        icon: 'success',
                        text: 'Partida deletada com sucesso!'
                    }).then(()=>{
                        window.location.reload();
                    })
                }

            })
        }
        })
})

</script>
</body>
</html>