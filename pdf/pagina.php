<?php	

    if (!isset($_SESSION)) session_start();
        
    
     if (!isset($_SESSION['niveis_acesso_id'])) {
              session_destroy();
              header("Location:/projeto_atualizado/validar/login.php");
    }
    include_once("../conexao/conexao.php");


    $id_despacho = filter_input(INPUT_GET, 'id_despacho', FILTER_SANITIZE_NUMBER_INT);
    $uasg = filter_input(INPUT_GET, 'uasg', FILTER_SANITIZE_NUMBER_INT);
                           // echo $id_item;

    

    $result_despacho = "SELECT  * FROM tb_despacho
     INNER JOIN tb_itens ON tb_itens.id_despacho = $id_despacho
     INNER JOIN tb_atas ON (tb_atas.id_despacho = $id_despacho) AND (tb_despacho.id_despacho = $id_despacho)";

    //$result_despacho = "SELECT * FROM tb_despacho,tb_atas,tb_itens WHERE (tb_itens.id_despacho = '$id_despacho') and (tb_atas.id_despacho = '$id_despacho'); ";

    $resultado_despacho = mysqli_query($conn, $result_despacho);

    $row_despacho = mysqli_fetch_assoc($resultado_despacho);




    // DADOS DA TABELA
    $html = '<tbody>';  
    $html .= '<tr>';
    $html .= ' <td width="61" align="center"> </td>';
    $html .= ' <td width="61" align="center"> </td>';
     


    $result_itens = "SELECT I.item, I.descricao, I.uf, I.qtd, I.preco_unitario, I.preco_total, A.ata FROM tb_itens AS I INNER JOIN tb_atas AS A ON I.id_ata = A.id_ata AND I.id_despacho = '$id_despacho'";

    $resultado_itens = mysqli_query($conn, $result_itens);

    while($row_despacho_itens = mysqli_fetch_assoc($resultado_itens)){
       
        $html .= '<tr><td align="center">'.$row_despacho_itens['item'] . "</td>";
        $html .= '<td colspan="2" >'.$row_despacho_itens['descricao'] . "</td>";
      
        $html .= '<td align="center">'.$row_despacho_itens['uf'] . "</td>";
        $html .= '<td align="center">'.$row_despacho_itens['qtd'] . "</td>";
        $html .= '<td align="center">'.$row_despacho_itens['preco_unitario'] . "</td>";
        $html .= '<td align="center">'.$row_despacho_itens['preco_total'] . "</td>";
        $html .= '<td align="center">'.$row_despacho_itens['ata'] . "</td></tr>";    
    }
    $html .= '</tr>';
    $html .= '</tbody>';
   
//---------------------------------------------------------------------------------------------
    //DADOS DA SOMA
    $query_total = "SELECT SUM(preco_total) AS total FROM tb_itens WHERE id_despacho = '$id_despacho' ";
    $resultado_query_total = mysqli_query($conn, $query_total);
    $row_query_total = mysqli_fetch_assoc($resultado_query_total);
//-------------------------------------------------------------------------------------------------

// ATAS

    $html_ata = '<tbody>';  
   
    

    $query_atas = "SELECT DISTINCT A.ata, A.cnpj, A.nome_empresa, I.preco_total, A.vigencia FROM tb_itens AS I INNER JOIN tb_atas AS A ON I.id_ata = A.id_ata AND I.id_despacho = '$id_despacho' ";

    $resultado_query_atas = mysqli_query($conn, $query_atas);

    while($row_query_atas = mysqli_fetch_assoc($resultado_query_atas)){
         $html_ata .= '<tr><td align="center">'.$row_query_atas['ata'] . "</td>";
         $html_ata .= '<td align="center" >'.$row_query_atas['cnpj']. '/'.$row_query_atas['nome_empresa']. "</td>";
         $html_ata .= '<td align="center">'.$row_query_atas['preco_total'] . "</td>";
         $html_ata .= '<td align="center">'.date('d/m/Y',strtotime($row_query_atas['vigencia'])) . "</td></tr>";
    }

    
    $html_ata .= '</tbody>';

//---------------------------------------------------------------------------------------------------
    $numero_dia = date('w')*1;
    $dia_mes = date('d');
    $numero_mes = date('m')*1;
    $ano = date('Y');
    $dia = array('Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado');
    $mes = array('', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
    //echo $dia[$numero_dia] . ", " .$dia_mes . " de " . $mes[$numero_mes] . " de " . $ano . ".";


	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();

    //$html = file_get_contents('pagina_despacho.php');
    //$dompdf->loadHtml($html);

	// Carrega seu HTML
	$dompdf->load_html('
		
			<p align="center">
            <strong>ESCOLA NAVAL</strong>
            </p>
            <p align="center">
            <strong>DESPACHO</strong>
            </p>
            <p>
              As Atas de Registro de Preços (ARP) do Pregão Eletrônico nº <strong>'. $row_despacho['pregao_eletronico'] .'</strong> da <strong>'.$row_despacho['orgao'].'  - UASG '. $row_despacho['uasg'] .' </strong>tem
            a sua gênese na Intenção de Registro de Preços (IRP)   <strong>'. $row_despacho['irp'] .'  </strong>.<strong></strong>
            </p>
            <p>
                <strong>'. $row_despacho['orgao'] .'</strong>, UASG gerenciadora e participante, além de registrar
            a participação da <strong>Escola Naval </strong>no    <strong>Termo de Referência, </strong>evidenciou a mesma no Sistema
                Integrado de Administração de Serviços Gerais (SIASG-net).
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
    <table border="1" cellspacing="0" cellpadding="0">
        <thead>
             <tr>
                <td width="61" align="center">
                    <strong>ITEM</strong>
                </td>
                <td colspan="2"  width="61" align="center">
                        <strong>DESCRIÇÃO</strong>
                </td>
              
              <td width="61" align="center">
                        <strong>UF</strong>
                </td>
                <td width="61" align="center"
                        <strong>QTDE</strong>
                </td>
              <td width="61" align="center">
                        <strong>PU em R$</strong>
                </td>
               <td width="61" align="center">
                        <strong>PT em R$</strong>
                </td>
               <td width="61" align="center">
                        <strong>ATA</strong>
                </td>
            </tr>
        </thead>
        '.$html.'
         <tr>
                <td  align="center" width="506" colspan="5">
                        <strong>TOTAL</strong>
                </td>
                <td colspan="2" width="95" valign="top" align="right">'. $row_query_total['total'].'</td>
                <td></td>
                
            </tr>
    </table>
    
    <br/>
</p>
<p>
    <p>
        Observação:
    </p>
    <p>
        Item não homologado e/ou cancelado.
        <br/>
    </p>
    <p>
        As Atas supramencionadas apresentam os seguintes valores e vigências:
    </p>
</p>

    <table border="1" cellspacing="0" cellpadding="0"  width=500 height=100 align=left >
    <thead>
        <tr align="center">
            <td width="61" align="center">
                    <strong>Nº DA ATA</strong>
            </td>
           <td width="61" align="center">
                    <strong>ATAS</strong>
            </td>
            <td width="61" align="center">
                    <strong>VALOR EM R$</strong>
            </td>
           <td width="61" align="center">
                    <strong>VIGÊNCIA</strong>
                    <strong>ATÉ</strong>
            </td>
        </tr>

    </thead>
   '.$html_ata.'
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<p>
    <p align="right">
        Rio de Janeiro, RJ., '.$dia_mes.' de '.$mes[$numero_mes].' de '.$ano.'. 
    </p>
    <br>
    <p align="center">
        WAGNER EMYGDIO RIBEIRO
            <br>
        Capitão de Mar e Guerra (RM1-IM)
            <br>
        Assessor de Licitações e Contratos
    </p>
		
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_celke.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>