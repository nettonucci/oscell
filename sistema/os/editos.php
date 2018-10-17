<?php
require_once '../conexao.php'; 

$con = open_conexao(); 
//selectDb(); 
   //recuperar valor passado por get
$id = trim($_REQUEST['idos']);
    //buscar no banco de dados
$rs = mysqli_query($con, "SELECT * FROM os INNER JOIN clientes ON (os.idcliente = clientes.id) WHERE os.idos=".$id);

$row = mysqli_fetch_array($rs); 
$cli = $row['idcliente']; 
$sta = $row['status'];
$dte = $row['dataentrada']; 
$dts = $row['datasaida'];
$eqp = $row['equipamento'];
$def = $row['defeito'];
$obs = $row['obs']; 
$lau = $row['laudo'];
$prod = $row['idproduto'];
$qtdp = $row['qtdproduto'];
$nome = $row['nome'];

close_conexao($con); 

?>

<?php
  //verifica sessão, se está logado 
//session_start();
//if (!isset($_SESSION['user'])) //AND (!isset($_SESSION[nome])) ) 
//Header("Location: index.html");

require_once '../conexao.php';
$con = open_conexao();
$query = mysqli_query($con,"select * from estoque;");
$rs1 = mysqli_query($con,"SELECT * FROM maoobra INNER JOIN os ON (maoobra.idos = os.idos) WHERE os.idos =".$id); //rs=record set (conjunto de registros)
$rs2 = mysqli_query($con,"SELECT * FROM ospeca INNER JOIN os ON (ospeca.idos = os.idos) INNER JOIN estoque ON(ospeca.idpeca = estoque.id) WHERE os.idos=".$id); //rs=record set (conjunto de registros)
close_conexao($con);
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <title>SB Admin - Tables</title>

    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.html">Menu</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">

          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../clientes/clientes.php">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>Clientes</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../estoque/estoque.php">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Estoque</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="os.php">
            <i class="fas fa-fw fa-tags"></i>
            <span>Ordens de Serviço</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Vendas</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="os.php">Ordens de Serviço</a>
            </li>
            <li class="breadcrumb-item active">Editar OS</li>
          </ol>


          <!-- DataTables Example -->
          <form data-toggle="validator" method="post" action="valCadCli.php">
          <div class="card mb-3">
            <div class="card-header"
              <i class="fas fa-tags"></i>
              Editar OS</div>
            <div class="card-body">
              <div class="table-responsive">
               
               
                  <thead>
                  <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-det-tab" data-toggle="tab" href="#nav-det" role="tab" aria-controls="nav-det" aria-selected="true">Detalhes da OS</a>
              <a class="nav-item nav-link" id="nav-laudo-tab" data-toggle="tab" href="#nav-laudo" role="tab" aria-controls="nav-laudo" aria-selected="true">Laudo</a>
              <a class="nav-item nav-link" id="nav-pec-tab" data-toggle="tab" href="#nav-pec" role="tab" aria-controls="nav-pec" aria-selected="true">Peças</a>
              <a class="nav-item nav-link" id="nav-serv-tab" data-toggle="tab" href="#nav-serv" role="tab" aria-controls="nav-serv" aria-selected="true">Serviços</a>
              <a class="nav-item nav-link" id="nav-total-tab" data-toggle="tab" href="#nav-total" role="tab" aria-controls="nav-total" aria-selected="true">Total</a>
          </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-det" role="tabpanel" aria-labelledby="nav-home-tab">
                    <br>
                    <br>
                    <div class="col-sm-4">
                    <label>Status</label>
                    <br>
                    <input type="text" class="form-control" name="idNome" value="<?php echo $sta?>" disabled>
                      <select class="form-control" name="status" id="status"><?=$sta?>
                        <option>--</option>
                        <option value="Orçamento">Orçamento</option>
                        <option value="Aberto">Aberto</option>
                        <option value="Em Andamento">Em Andamento</option>
                        <option value="Finalizado">Finalizado</option>
                        <option value="Cancelado">Cancelado</option>
                      </select>
                    </div>
                    <br>
                    <div class="col-sm-4">
                      <label>Cliente</label>
                      <input type="text" class="form-control" name="idNome" value="<?php echo $nome?>" disabled>
                    </div>
                    <br>
                    <div class="col-sm-4">
                      <label>Data de entrada</label>
                      <input type="text" class="form-control" name="idNome" value="<?php echo $dte?>" disabled>
                    </div>
                    <br>
                    <div class="col-sm-4">
                      <label>Descrição Produto</label>
                       <textarea class="span6" name="descricaoProduto" id="descricaoProduto" cols="69" rows="5" disabled><?=$eqp?></textarea>
                    </div> 
                    <br>
                    <div class="col-sm-4">
                      <label for="defeito">Defeito</label>
                        <textarea class="span6" name="defeito" id="defeito" cols="69" rows="5" disabled><?=$def?></textarea>
                    </div>
                    <br>
                    <div class="col-sm-4">
                      <label for="Obs">Observações</label>
                        <textarea class="span6" name="defeito" id="defeito" cols="69" rows="5" disabled><?=$obs?></textarea>
                    </div>
                  </div>

                  <div class="tab-pane fade show" id="nav-laudo" role="tabpanel" aria-labelledby="nav-home-tab">
                  <br>
                    <div class="col-sm-4">
                      <label for="defeito">Laudo</label>
                        <textarea class="span6" name="defeito" id="defeito" cols="150" rows="20"><?=$lau?></textarea>
                    </div>
                    </div>

                  <div class="tab-pane fade show" id="nav-pec" role="tabpanel" aria-labelledby="nav-home-tab">
                   <br>
                   <div class="col-sm-4">
                    <label>Peça<span class="required">*</span></label>
                    <br>
                      <select class="form-control" name="idpec" id="peca">
                        <option>Selecione...</option>
 
                          <?php while($prod = mysqli_fetch_array($query)) { ?>
                              <option value="<?php echo $prod['id'] ?>"><?php echo $prod['descricao'] ?> || Quantidade: <?php echo $prod['quantidade'] ?></option>
                                <?php } ?>
                                   </select>
                    </div>
                    <br>
                    <div class="col-sm-4">
                      <label>Quantidade</label>
                      <input type="text" class="form-control" name="idNome" value="<?php echo $qtdp?>">
                    </div>
                    <br>
                    <a class="btn btn-success" href="#"> <i class="ion-plus-round"></i> Adicionar</a>
                    <br>
                    <br>


                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <div class="row col-md-7">
                      <table  class="table table-striped">
                      <tr>
                        <th widht="80" align="right">Peça</th>
                        <th widht="80" align="right">Quantidade</th>
                        <th widht="80" align="right">Valor</th>
                        <th widht="80" align="center"> </th>
                        <th></th>
                        <th></th>
                      </tr>
                      <?php while ($row = mysqli_fetch_array($rs2)) { ?> 
                      <tr>
             
                      <td><?php echo $row['descricao'] ?></td>
                      <td><?php echo $row['quantidadeos'] ?></td>
                      <td><?php echo $row['precovenda'] ?></td>

                       <td>
                          <button type="button" class="btn btn-danger" title="Deletar OS"
                          onclick="javascript:location.href='../remover/remCli.php?id=' 
                          + <?php echo $row['id'] ?> ">
                          <span class="ion-trash-a" aria-hidden="true"></span>
                          </button>                 
                      </td>                    
                      </tr>
                      <?php 
                        } ?>
                      
                      </div>
                      </table>
                    </div>







                  </div>

                  <div class="tab-pane fade show" id="nav-serv" role="tabpanel" aria-labelledby="nav-home-tab">
                  <br>
                  <div class="col-sm-4">
                      <label>Serviço realizado</label>
                      <input type="text" class="form-control" name="servico">
                    </div>
                    <br>
                    <div class="col-sm-4">
                      <label>Valor</label>
                      <input type="text" class="form-control" name="valor">
                    </div>
                    <br>
                    <a class="btn btn-success" href="#"> <i class="ion-plus-round"></i> Adicionar</a>
                    <br>
                    <br>






                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <div class="row col-md-7">
                      <table  class="table table-striped">
                      <tr>
                        <th widht="80" align="right">Serviço</th>
                        <th widht="80" align="right">Valor</th>
                        <th widht="80" align="center"> </th>
                        <th></th>
                        <th></th>
                      </tr>
                      <?php while ($row = mysqli_fetch_array($rs1)) { ?> 
                      <tr>
             
                      <td><?php echo $row['servico'] ?></td>
                      <td><?php echo $row['valor'] ?></td>

                       <td>
                          <button type="button" class="btn btn-danger" title="Deletar OS"
                          onclick="javascript:location.href='../remover/remCli.php?id=' 
                          + <?php echo $row['id'] ?> ">
                          <span class="ion-trash-a" aria-hidden="true"></span>
                          </button>                 
                      </td>                    
                      </tr>
                      <?php 
                        } ?>
                      
                      </div>
                      </table>
                    </div>
                    </div>

                    <div class="tab-pane fade show" id="nav-total" role="tabpanel" aria-labelledby="nav-home-tab">

                    </div>
                  <br>
                    </form>
                  </tbody>
                </table>
              </div>
            </div>
          </div>



        </div>
        <!-- /.container-fluid -->
        

        <!-- Sticky Footer -->
        <!-- <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Studio BlueMind 2018</span>
            </div>
          </div>
        </footer> -->

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>

  </body>

</html>
