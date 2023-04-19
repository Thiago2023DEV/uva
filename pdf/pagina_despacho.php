<!DOCTYPE html>
<?php
     if (!isset($_SESSION)) session_start();
        
    
     if (!isset($_SESSION['niveis_acesso_id'])) {
              session_destroy();
              header("Location:/projeto_atualizado/validar/login.php");
    }
    include_once("../conexao/conexao.php");

?>
<html>
<head>
	<title>Despacho</title>
</head>
<body>
    <?php
        $id_despacho = filter_input(INPUT_GET, 'id_despacho', FILTER_SANITIZE_NUMBER_INT);
        //echo $id_despacho;

        $result_despacho = "SELECT  * FROM tb_despacho
                            INNER JOIN tb_itens ON tb_itens.id_despacho = $id_despacho
                            INNER JOIN tb_atas ON (tb_atas.id_despacho = $id_despacho) AND (tb_despacho.id_despacho = $id_despacho)";
        $resultado_despacho = mysqli_query($conn, $result_despacho);
        $row_despacho = mysqli_fetch_assoc($resultado_despacho);

        //ITENS
        $result_itens = "SELECT I.item, I.descricao, I.uf, I.qtd, I.preco_unitario, I.preco_total, A.ata FROM tb_itens AS I INNER JOIN tb_atas AS A ON I.id_ata = A.id_ata AND I.id_despacho = '$id_despacho'";
        $resultado_itens = mysqli_query($conn, $result_itens);

        //TOTAL ITENS
        $query_total = "SELECT SUM(preco_total) AS total FROM tb_itens WHERE id_despacho = '$id_despacho' ";
        $resultado_query_total = mysqli_query($conn, $query_total);
        $row_query_total = mysqli_fetch_assoc($resultado_query_total);

        //ATAS
        $query_atas = "SELECT DISTINCT A.ata, A.cnpj, A.nome_empresa, I.preco_total, A.vigencia FROM tb_itens AS I INNER JOIN tb_atas AS A ON I.id_ata = A.id_ata AND I.id_despacho = '$id_despacho' ";
        $resultado_query_atas = mysqli_query($conn, $query_atas);

        //DATA
        $numero_dia = date('w')*1;
        $dia_mes = date('d');
        $numero_mes = date('m')*1;
        $ano = date('Y');
        $dia = array('Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado');
        $mes = array('', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');        
    ?>
	<p align="center">
        <strong> <a href="pagina.php"></a>ESCOLA NAVAL</strong>
    </p>
<p align="center">
    <strong>DESPACHO</strong>
</p>
<p>
    As Atas de Registro de Preços (ARP) do Pregão Eletrônico nº <strong><?php echo $row_despacho['pregao_eletronico'];?></strong> do <strong><?php echo $row_despacho['orgao'] ?> - UASG <?php echo $row_despacho['uasg'] ?> </strong>tem a sua gênese na Intenção de Registro de Preços (IRP) <strong><?php echo $row_despacho['irp']; ?></strong>.
</p>
<p>
     <strong><?php echo $row_despacho['orgao'] ?></strong>UASG gerenciadora e participante, além de registrar a participação da <strong>Escola Naval </strong>no <strong>Termo de Referência, </strong>evidenciou a mesma no Sistema Integrado de Administração de Serviços Gerais (SIASG-net).
</p>
<p>
    Essa decisão do Órgão Gerenciador permite a utilização do subsistema SISME
    – Minuta de Empenho do SIASG na participação desta Escola.
</p>
<p>
    O quadro abaixo visa evidenciar a participação e os itens não
    homologados/cancelados.
</p>
<p>
    <table border="1" cellspacing="0" cellpadding="0" width="666">
        <thead>
            <tr>
                <td width="61" align="center"><strong>ITEM</strong></td>
                <td width="274" align="center"><strong>DESCRIÇÃO</strong></td>
                <td width="47" align="center"><strong>UF</strong></td>
                <td width="57" align="center"><strong>QTDE</strong></td>
                <td width="66" align="center"><strong>PU em R$</strong></td>
                <td width="95" align="center"><strong>PT em R$</strong></td>
                <td width="66" align="center"><strong>ATA</strong></td>
            </tr>
        </thead>
        <tbody>
             <?php while($row_despacho_itens = mysqli_fetch_assoc($resultado_itens)){ ?>
            <tr>
                <td width="61" align="center"><?php echo $row_despacho_itens['item']; ?></td>
                <td width="274" align="center"><?php echo $row_despacho_itens['descricao']; ?></td>
                <td width="47" align="center"><?php echo $row_despacho_itens['uf']; ?></td>
                <td width="57" align="center"><?php echo $row_despacho_itens['qtd']; ?></td>
                <td width="95" align="center"><?php echo $row_despacho_itens['preco_unitario']; ?></td>
                <td width="95" align="center"><?php echo $row_despacho_itens['preco_total']; ?></td>
                <td width="66" align="center"><?php echo $row_despacho_itens['ata']; ?></td>
            </tr>
            <?php } ?>
            <tr>
                <td width="506" colspan="5" align="center"><strong>TOTAL</strong></td>
                <td rowspan="2" width="95" align="center" colspan="2"><?php echo $row_query_total['total']?></td>
            </tr>
        </tbody>
    </table>
    <br/>
</p>
Observação:
<br><br> 
Item não homologado e/ou cancelado.
<br><br>
As Atas supramencionadas apresentam os seguintes valores e vigências:
<br><br>

<table border="1" cellspacing="0" cellpadding="0" width="663">
    <thead>
        <tr>
            <td width="96" align="center"><strong>Nº DA ATA</strong></td>
            <td width="382" align="center"><strong>ATAS</strong></td>
            <td width="120" align="center"><strong>VALOR EM R$</strong></td>   
            <td width="91" align="center"><strong>VIGÊNCIA</strong></td>    
        </tr>
    </thead>
    <tbody>
        <?php while($row_query_atas = mysqli_fetch_assoc($resultado_query_atas)){ ?>
            <tr>
                <td width="96" align="center"><?php echo $row_query_atas['ata'] ?></td>
                <td width="382" align="center"><?php echo $row_query_atas['cnpj']. ' / '.$row_query_atas['nome_empresa'] ?></td>
                <td width="94" align="center"><?php echo $row_query_atas['preco_total'] ?></td>
                <td width="91" align="center"><?php echo date('d/m/Y',strtotime($row_query_atas['vigencia'])); ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<br>
<p>
    <p align="right">
        Rio de Janeiro, RJ., <?php echo $dia_mes ?> de <?php echo $mes[$numero_mes]?> de <?php echo $ano ?>. 
    </p>
    <br>
    <p align="center">
        WAGNER EMYGDIO RIBEIRO
        <br>
        Capitão de Mar e Guerra (RM1-IM)
        <br>
        Assessor de Licitações e Contratos
    </p>

</body>
</html>