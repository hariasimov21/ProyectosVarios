<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">DATOS DEL PEDIDO</h4></center>
            </div>
            <div class="modal-body">
		
				<div class="form-group">
						<label>Datos del Usuario:</label>
						<?php 
							echo '
								<ul class="list-group">
								  <li class="list-group-item">
								  <label>Nombre de usuario:</label> '.$row3['nombre'].'.</li>
								  <li class="list-group-item">
								  <label>Direccion:</label> '.$row3['direccion'].'.</li>
								  <li class="list-group-item">
								  <label>Numero de contacto:</label> '.$row3['contacto'].'.</li>
								  <li class="list-group-item">
								  <label>E-mail/Correo electronico:</label> '.$row3['email'].'.</li>
								  <li class="list-group-item">
								  <label>Detalle/Acotacion:</label> '.$row['detalle'].'.</li>
								</ul>

							<label>Datos de la orden:</label>
							
							<ul class="list-group">
								';

				    while($row1 = mysqli_fetch_array($sql1))
				    {
				              $uid = $row1['producto'];
				              $sql2 = mysqli_query($con, "SELECT * FROM productos WHERE id = $uid;");
				              while($row2 = mysqli_fetch_array($sql2))
				                $inom = $row2['nombre'];
				              

									$pre=$row1['precio'];
									$ca=$row1['cantidad'];

				            echo '

								  <li class="list-group-item d-flex justify-content-between align-items-center">
								    '.$row1['id'].') <label>'.$inom.'</label>
								    <span class="badge badge-primary badge-pill">$'.$row1['precio'].'</span>
								    <span class="badge badge-primary badge-pill">x'.$row1['cantidad'].' :</span>
								    <span class="badge badge-primary badge-pill">$'.($pre/$ca).'</span>

								  </li>
				            ';}                                    
				                if(!$ecu){
				                echo '
									
								  <li class="list-group-item d-flex justify-content-between align-items-center">
								  	<label>Total del pedido|: </label>
								  	<span class="badge badge-primary badge-pill">$'.$total.'</span>
								  </li>
										';
			        };?>
					</ul>
				</div>
		    </div>
		</div>
	</div>
</diSSv>
