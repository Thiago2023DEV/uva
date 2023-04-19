<!DOCTYPE html>
<?php
    if (!isset($_SESSION)) session_start();
        
    
     if (!isset($_SESSION['niveis_acesso_id'])) {
              session_destroy();
              header("Location:/projeto_atualizado/validar/login.php");
    }
    include_once("../conexao/conexao.php");
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Atas de Registro</title>
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
                        <h1 class="mt-4">EDITAR DESPACHO</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">DESPACHO</li>
                        </ol>
                       
                        <?php
                            $id_despacho = filter_input(INPUT_GET, 'id_despacho', FILTER_SANITIZE_NUMBER_INT);
                            $id_ata = filter_input(INPUT_GET, 'id_ata', FILTER_SANITIZE_NUMBER_INT);
                           // echo $id_item;

                            $result_despacho = "SELECT * FROM tb_despacho,tb_atas,tb_itens WHERE (tb_itens.id_despacho = '$id_despacho') and (tb_atas.id_despacho = '$id_despacho') and (tb_atas.id_ata = '$id_ata'); ";

                            $resultado_despacho = mysqli_query($conn, $result_despacho);

                            $row_despacho = mysqli_fetch_assoc($resultado_despacho);

                          
                        ?>
                        <form method="POST" action="proc_editar_despacho.php">
                            <div class="form-group">
                            <div class="card">
                                 <div class="card-body">
                                <label for="exampleInputEmail1">IRP</label>
                                <input type="text" name="id_despacho"  class="form-control" readonly value="<?php echo $row_despacho['irp'];?> ">
                                <br>
                                <label for="exampleInputEmail1">DESPACHO</label>
                               
                                <input type="text" name="id_despacho"  class="form-control" readonly value="<?php echo $row_despacho['id_despacho'];?> ">
                                <br>

                                <label for="exampleInputEmail1">ATA</label>
                                <input type="text" name="ata" class="form-control" readonly value=" <?php echo $row_despacho['ata']; ?>" >

                                <br/>

                                <label for="exampleInputEmail1">UASG</label>
                                <input type="text" name="uasg" class="form-control" readonly value="<?php echo $row_despacho['uasg']; ?>" >
                                <?php 
                                   $query_users = "SELECT COUNT(id_despacho) AS qnt_usuarios
                                                    FROM tb_itens
                                                    WHERE id_despacho='$id_despacho' ";
                                  $resultado_itens = mysqli_query($conn, $query_users);
                                   
                                            
                                   $row_user = $row_itens = mysqli_fetch_assoc($resultado_itens);
                                   //echo "Quantidade de usuário: " . $row_user['qnt_usuarios'] . "<br>";
                                
                                ?>
                                <input type="hidden" name="contador" value="<?php echo $row_user['qnt_usuarios'];?>">
                              
                            </div>
                            </div>
                                <br/>
                                 <?php 

                                    $result_itens = "SELECT * FROM tb_itens WHERE id_despacho = '$id_despacho' and id_ata = '$id_ata' ";
                                    $resultado_itens = mysqli_query($conn, $result_itens);
                                   
                                    while($row_despacho_itens = mysqli_fetch_assoc($resultado_itens)){
                                     ?>
                                <br>
                                <div class="card">
                                     <div class="card-body">
                                <label for="exampleInputEmail1">ITEM</label>
                                <input type="text" name="item[]" class="form-control"  readonly value="<?php echo $row_despacho_itens['item']; ?>">
                                <input type="hidden" name="id_item[]" value="<?php echo $row_despacho_itens['id_item']; ?>">
                                <br/>

                                <label for="exampleInputEmail1">DESCRIÇÃO</label>
                                <textarea class="form-control" name="descricao[]" rows="3"><?php echo $row_despacho_itens['descricao']; ?></textarea>
                                <br/>

                                <label for="exampleInputEmail1">UF</label>
                                <input type="text" name="uf[]" class="form-control"  value="<?php echo $row_despacho_itens['uf']; ?>">
                                <br/>

                                <label for="exampleInputEmail1">QTDE</label>
                                <input type="number" name="qtde[]" class="form-control" value="<?php echo $row_despacho_itens['qtd']; ?>">
                                <br/>

                                <label for="exampleInputEmail1">PU EM R$</label>
                                <input type="text" name="pu[]" class="form-control"  value="<?php echo $row_despacho_itens['preco_unitario']; ?>">
                                <br/>

                                <label for="exampleInputEmail1">PT EM R$</label>
                                <input type="text" name="pt[]" class="form-control" value="<?php echo $row_despacho_itens['preco_total']; ?>">
                                    </div>
                                </div>
                                <?php }?>
                                <br/>
                               
                            </div>

                            <button type="submit" class="btn btn-primary">Editar</button>
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
