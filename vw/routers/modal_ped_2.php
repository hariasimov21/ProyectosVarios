<div class="modal fade" id="edit2_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">DATOS DEL PEDIDO</h4></center>
            </div>
            <div class="modal-body">
		
				<div class="form-group">
					<div class="col-md-12">
						<label>Usuario:</label>
						<?php 
							echo'
					        <table class="table table-bordered table-striped" >
					          <tr>
					            <td>FECHA</td>
					            <td>TPAGO</td>
					            <td>EORDEN</td>
					          </tr>
					          <tr>
					            <td hidden>'.$row['id'].'</td>
					            <td>'.$row['fecha'].'</td>
					            <td>'.$row['tipopago'].'</td>
					            <td>'.($est=='Orden Cancelada Adm' ? 'Orden Cancelada Adm<a href="sugerencias.php"><br>(Contacte con ADM)</a> ' : $est).'
					            </td>
					          </tr>
					        </table>  
					        ';
						 ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-12">
						<label>Direccion:</label>
						<?php 
        echo'
        <table class="table table-bordered table-striped" >
            <tr>
              <td>ID</td>
              <td>PROD</td>
              <td>CANT</td>
              <td>PREC</td>
            </tr>';
            $oid = $row['id'];
            $sql1 = mysqli_query($con, "SELECT * FROM ordendetalle WHERE orden = $oid;");
            while($row1 = mysqli_fetch_array($sql1))
            {
              $pid = $row1['producto'];
              $sql2 = mysqli_query($con, "SELECT * FROM productos WHERE id = $pid;");
              while($row2 = mysqli_fetch_array($sql2)){
                $inom = $row2['nombre'];
              }
              echo '
            <tr>
              <td>ID: '.$row1['producto'].'</td>
              <td>'.$inom.'</td>           
              <td>'.$row1['cantidad'].'</td>
              <td>$'.$row1['precio'].'.-</td>
            </tr>';
              $id = $row1['orden'];
          };
          if(!preg_match('/^Cancelada/', $est)){
                  if($est != 'Pagada y Entregada'){
                echo 
                ' 

          <td></td>
          <td></td>
          <td></td>
          <td colspan="6">$'.$row['total'].'.-</td>
        </table>

      <form action="routers/finalizar_orden.php" method="post">
          <input type="hidden" value="'.$id.'" name="id">
          <input type="hidden" value="Cancelada" name="est">  
          <input type="hidden" value="'.$row['tipopago'].'" name="tpago">                     
        
        <table class="table table-bordered table-striped" >
          <td>                  
            <button class="btn btn-md btn-danger" type="submit" name="action">Cancelar Orden</button>
          </td>
      </form>

            ';
                }
          }else{
              echo'
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td>$'.$row['total'].'.-</td>
            </tr>
        </table>
          ';

						 ?>
					</div>
				</div>
		    </div>
		</div>
	</div>
</div>
