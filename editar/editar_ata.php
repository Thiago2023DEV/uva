<!DOCTYPE html>
<?php
    if (!isset($_SESSION)) session_start();
        
    
     if (!isset($_SESSION['niveis_acesso_id'])) {
              session_destroy();
              header("Location:/projeto_atualizado/validar/login.php");
    }
    include_once("../conexao/conexao.php");
    $id_ata = filter_input(INPUT_GET, 'id_ata', FILTER_SANITIZE_NUMBER_INT);

    $result_itens = "SELECT * FROM tb_atas WHERE id_ata = '$id_ata' ";

    $resultado_itens = mysqli_query($conn, $result_itens);

    $row_itens = mysqli_fetch_assoc($resultado_itens);

?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Atas de Registro</title>

        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
        <script src="/projeto_atualizado/js/jquery.min.js"></script>
        
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>-->
        <script src="/projeto_atualizado/js/jquery.mask.min.js"></script>

        <link href="../css/styles.css" rel="stylesheet" />

        <!--<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />-->
        <link href="/projeto_atualizado/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>-->
        <script src="/projeto_atualizado/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="../index.php">ATAS DE REGISTRO</a>
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
                        <a class="dropdown-item" href="../login.php">Logout</a>
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
                            <a class="nav-link" href="../index.php">
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
                                    <a class="nav-link" href="cadastrar_ata.php">ATA</a>
                                    <a class="nav-link" href="cadastrar_itens_escolha_ata.php">ITENS</a>
                                </nav>
                            </div>


                            <a class="nav-link collapsed" href="../consultar.php" >
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-columns"></i>
                                </div>
                                Consultar
                            </a>
                            


                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Atividades
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Excluir
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                           
                                            <a class="nav-link" href="register.html">ATA</a>
                                           <a class="nav-link" href="../consultar.php">ITENS</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Registrar
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">Usuário</a>
                                        </nav>
                                    </div>
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
                        <h1 class="mt-4">CADASTRO DE ATA</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">ATA</li>
                        </ol>

                        <form method="POST" action="proc_editar_ata.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="id_ata" value="<?php echo $id_ata; ?>">
                                <label for="exampleInputEmail1">ATA</label>
                                <input type="text" name="ata" class="form-control" value="<?php echo $row_itens['ata']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">VIGÊNCIA</label>
                                <input type="date" name="vigencia" class="form-control"  value="<?php echo $row_itens['vigencia']; ?>" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">UASG</label>
                                <input type="text" name="uasg" class="form-control"  value="<?php echo $row_itens['uasg']; ?>" >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">EMPRESA</label>
                                <input type="text" name="empresa" class="form-control" id="text"   value="<?php echo $row_itens['nome_empresa']; ?>">
                                <script>
                                    document.getElementById('text').addEventListener('keyup', (ev) => {
                                        const input = ev.target;
                                        input.value = input.value.toUpperCase();
                                    });
                                </script>
                            </div>
                               
                            <div class="form-group">
                                <label for="exampleInputPassword1">CNPJ</label>
                                <input type="text" name="cnpj" class="form-control" id="cnpj"  value="<?php echo $row_itens['cnpj']; ?>" >
                               <!--CNPJ --->
                                <script type="text/javascript">
                                    $("#cnpj").mask("00.000.000/0000-00");
                                </script>
                               

                            </div>

                        
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                        

                    </div>
                </main>
                
            </div>
        </div>
        <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>-->
        <script src="../js/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>

        <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>-->
        <script src="../js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

        <script src="../js/scripts.js"></script>

        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>-->
        <script src="../js/Chart.min.js" crossorigin="anonymous"></script>

        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>

        <!--<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>-->
        <script src="../js/jquery.dataTables.min.js" crossorigin="anonymous"></script>

        <!--<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>-->
        <script src="../js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
