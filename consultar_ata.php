<!DOCTYPE html>
<?php
    if (!isset($_SESSION)) session_start();
        
    
     if (!isset($_SESSION['niveis_acesso_id'])) {
              session_destroy();
              header("Location:/projeto_atualizado/validar/login.php");
    }
    include_once("./conexao/conexao.php");

?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Consultar</title>
        <link href="css/styles.css" rel="stylesheet" />
        <!--<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />-->
        <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>-->
        <script src="js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
       <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">ATAS DE REGISTRO</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group"></div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">ATAS DE REGISTRO</div>
                            <a class="nav-link" href="/projeto_atualizado/index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Home
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Cadastrar
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/projeto_atualizado/cadastrar/cadastrar_ata.php">ATA</a>
                                    <a class="nav-link" href="/projeto_atualizado/cadastrar/cadastrar_itens_escolha_ata.php">ITENS</a>
                                    <a class="nav-link" href="/projeto_atualizado/cadastrar/cadastrar_despacho_irp.php">DESPACHO</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ata12" aria-expanded="false" aria-controls="ata12">
                               <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Ata
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="ata12" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/projeto_atualizado/consultar_ata.php">Consultar</a>
                                    <a class="nav-link" href="/projeto_atualizado/excluir/excluir_atas.php">Excluir</a>
                                </nav>
                            </div>
                            
                             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#itens" aria-expanded="false" aria-controls="itens">
                                <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>

                                Itens
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="itens" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/projeto_atualizado/consultar.php">Consultar</a>
                                </nav>
                            </div>

                             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#despacho" aria-expanded="false" aria-controls="despacho">
                                <div class="sb-nav-link-icon"><i class="fab fa-buromobelexperte"></i></div>
                                Despacho
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="despacho" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/projeto_atualizado/consultar_despacho.php">Consultar</a>
                                    <a class="nav-link" href="/projeto_atualizado/excluir/excluir_despacho.php">Excluir</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#usu" aria-expanded="false" aria-controls="usu">
                               <div class="sb-nav-link-icon"><i class="fas fa-audio-description"></i></div>
                                Usuários
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="usu" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/projeto_atualizado/cadastrar/cadastrar_usuario.php">Cadastrar</a>
                                </nav>
                            </div>                      
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Escola Naval</div>
                    </div>
                </nav>
            </div>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Consultar</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Consultar</li>
                        </ol>

                         <?php
                          //  $result_itens = "SELECT DISTINCT A.id_ata,A.ata, A.uasg, A.vigencia, A.pdf, I.id_item FROM tb_itens AS I INNER JOIN tb_atas AS A ON (I.id_ata = A.id_ata); ";

                             $result_itens = "SELECT DISTINCT id_ata, ata, uasg, pdf, vigencia FROM tb_atas   ";
                            $resultado_itens = mysqli_query($conn, $result_itens);

                        ?>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr align="center">
                                                <th>ATA</th>
                                                <th>VIGÊNCIA</th>
                                                <th>UASG</th>
                                                <th>PDF</th>
                                                <th>Editar </th>
                                                <th>Excluir</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr align="center">
                                                <th>ATA</th>
                                                <th>VIGÊNCIA</th>
                                                <th>UASG</th>
                                                <th>PDF</th>
                                                <th>Editar </th>
                                                <th>Excluir</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                             <?php while($row_usuario = mysqli_fetch_assoc($resultado_itens)){ ?>
                                                <tr>
                                                    <td align="center"><?php echo "". $row_usuario['ata']. ""; ?></td>
                                                    <td align="center"><?php echo "". date('d/m/Y',strtotime($row_usuario['vigencia'])). ""; ?></td>
                                                    <td align="center"><?php echo "". $row_usuario['uasg']. ""; ?></td>
                                                    <td align="center"><a href="<?php 
                                                        if(!$row_usuario['pdf'] == ""){
                                                    echo "/projeto_atualizado/cadastrar/upload/". $row_usuario['pdf']. "";} ?>">PDF</a></td>
                                                    <td align="center"><?php echo "<a href='/projeto_atualizado/editar/editar_ata.php?id_ata=".$row_usuario['id_ata']."'> Editar </a><br><hr>";?></td>
                                                    <td align="center"><?php echo "<a href='/projeto_atualizado/excluir/excluir_itens.php?id_ata=" . $row_usuario['id_ata'] ."'> Excluir </a><br><hr>";?></td>
                                                    
                                                </tr>
                                             <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                
            </div>
        </div>
        
        <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>-->
        <script src="js/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>

        <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>-->
        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

        <script src="js/scripts.js"></script>

        <!--<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>-->
        <script src="js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        
        <!--<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>-->
        <script src="js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
