<?php

	function generateRow(){
		$contents = '';
        include_once('../includes/conectar.php');

        $porcen3 = $_POST['porcen3'];
        $tdato3 = $_POST['tdato3'];
        $tdato4 = $_POST['tdato4'];
        $porcen4 = $_POST['porcen4'];
        $cant = $_POST['cant'];

        $porcen1 = $_POST['porcen1'];
        $tdato1 = $_POST['tdato1'];
        $porcen2 = $_POST['porcen2'];
        $tdato2 = $_POST['tdato2'];


        if ($porcen4 == " ") {    
		$contents .= "
            <tr>
                <td>".$tdato1."</td>
                <td>".$porcen1."% (Un total de ".$cant.")</td>
            </tr>
            <tr>
                <td>".$tdato2."</td>
                <td>".$porcen2."% (Un total de ".$cant.")</td>
            </tr>
            ";  
        } else {
        $contents .= "
            <tr>
                <td>".$tdato1."</td>
                <td>".$porcen1."% (Un total de ".$cant.")</td>
            </tr>
            <tr>
                <td>".$tdato2."</td>
                <td>".$porcen2."% (Un total de ".$cant.")</td>
            </tr>
            <tr>
                <td>".$tdato3."</td>
                <td>".$porcen3."% (Un total de ".$cant.")</td>
            </tr>
            <tr>
                <td>".$tdato4."</td>
                <td>".$porcen4."% (Un total de ".$cant.")</td>
            </tr>
            ";
        }


		return $contents;
	}


	require_once('../js/tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Datos Reportes");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '20', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
    $content = '';  
    $content .= '
        <h5>VIRTUALWAITER - PLATOS Y PRODUCTOS</h5>
      	<h2 align="center">DETALLE REPORTE.</h2>
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
				<th colspan="2" align="center">DATOS SELECCIONADOS REPORTES</th>
           </tr>  
      ';  
    $content .= generateRow();  
    $content .= '</table>
            <h6 align="center">COPYRIGHT © JUAN MANSILLA / JAIME DIAZ / DAVID MORALES ESTUDIANTES AIEP - PUERTO MONTT</h6>';  
    $pdf->writeHTML($content);  
    $pdf->Output('js/members.pdf', 'I');
	
?>