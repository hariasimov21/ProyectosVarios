<?php
	function generateRow(){
		$contents = '';
        include_once('../includes/conectar.php');
		$sql = "SELECT * FROM productos";

		$query = $con->query($sql);
		while($row = $query->fetch_assoc()){
			$contents .= "
			<tr>
				<!--<td hidden>".$row['id']."</td>-->
				<td>".$row['nombre']."</td>
				<td>".$row['precio']."</td>
				<td>".($row['disponibilidad'] ? 'No Disponible' : 'Disponible')."</td>
        <td>".$row['descripcion']."</td>
      </tr>
			";
		}

		return $contents;
	}

	require_once('../js/tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Datos de todos los platos");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
    $content = '';  
    $content .= '
        <h5>VIRTUALWAITER - PLATOS Y PRODUCTOS</h5>
      	<h2 align="center">DETALLE DE LOS PLATOS REGISTRADOS.</h2>
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
        <!--<th width="5%" >ID</th>-->
				<th width="20%">Todos los Plato/Producto</th>
				<th width="15%">Precio por Unidad</th>
        <th width="20%">
        Disponibilidad</th>
        <th width="45%">Descripcion</th>
           </tr>  
      ';  
    $content .= generateRow();  
    $content .= '</table>
            <h6 align="center">COPYRIGHT © JUAN MANSILLA / JAIME DIAZ / DAVID MORALES ESTUDIANTES AIEP - PUERTO MONTT</h6>';  
    $pdf->writeHTML($content);  
    $pdf->Output('js/members.pdf', 'I');
	
?>