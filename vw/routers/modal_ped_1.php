<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">DATOS DEL PEDIDO</h4></center>
            </div>
            <div class="modal-body">
		
		<div class="form-group">
		
		<?php 
			$oid = $row['id'];
            $sql1 = mysqli_query($con, "SELECT * FROM ordendetalle WHERE orden = $oid;");
            echo '<ul class="list-group">
            	<li class="list-group-item d-flex justify-content-between align-items-center>ORDEN</li>';
            while($row1 = mysqli_fetch_array($sql1))
            {
              $pid = $row1['producto'];
              $sql2 = mysqli_query($con, "SELECT * FROM productos WHERE id = $pid;");
              while($row2 = mysqli_fetch_array($sql2)){
                $inom = $row2['nombre'];
                $aco++;
              }

			echo '
			  <li class="list-group-item d-flex justify-content-between align-items-center">
			    '.$aco.') <label>'.$inom.'</label>
          <span class="badge badge-info">$'.$row1['precio'].'</span>
          <span class="badge badge-primary badge-pill">x'.$row1['cantidad'].' </span>
          <span class="badge badge-info">$'.($row1['precio']/$row1['cantidad']).'</span>          
			    ';
              $id = $row1['orden'];
          };
          $aco = 0;
          echo "
			</li>";

        if(!preg_match('/^Orden Cancelada (usu)/', $est)){

        
        if($est == 'Orden en Espera'){ 
        	echo' 
        	<li class="list-group-item list-group-item-success">
                <label>Precio Final: </label>
            	<span class="badge badge-primary badge-pill">$'.$row['total'].'</span>
			 </li>


     <form action="agregar_prod.php" method="post">

          <input type="hidden" value="'.$row['id'].'" name="pid">
          <input type="hidden" value="'.$row['tipopago'].'" name="tpago">
          <input type="hidden" value="'.$row['total'].'" name="tot">
          
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <button class="btn btn-lg btn-success col-md-12" type="submit" name="action">Agregar productos a la orden</button>
                <p><br><br></p>
            </div>
      </form>


            <form action="routers/finalizar_orden.php" method="post">

                <input type="hidden" value="'.$id.'" name="id">
                <input type="hidden" value="Orden Cancelada (usu)" name="est">  
                <input type="hidden" value="'.$row['tipopago'].'" name="tpago">
                <input type="hidden" value="'.$row['total'].'" name="tot">

                
          <li class="list-group-item d-flex justify-content-between align-items-center">
				    <div>
                <button class="btn btn-lg btn-danger col-md-12" type="submit" name="action">Cancelar Orden</button>
                <p>* Al cancelar la orden se reenbolsara el dinero y no podras volver a reabrirla</p>
				    </div>
          </li>

            </form>

            ';
        }elseif ($est == 'Comiendo') {

              echo'
          <li class="list-group-item list-group-item-success">
                <label>Precio Final: </label>
              <span class="badge badge-primary badge-pill">Precio: $'.$row['total'].'</span>
          
          </li>
      <form action="agregar_prod.php" method="post">

          <input type="hidden" value="'.$row['id'].'" name="pid">
          <input type="hidden" value="'.$row['tipopago'].'" name="tpago">
          <input type="hidden" value="'.$row['total'].'" name="tot">
          
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <button class="btn btn-lg btn-success col-md-12" type="submit" name="action">Agregar productos a la orden</button>
                <p><br><br></p>
            </div>
      </form>


            <form action="routers/finalizar_orden.php" method="post">

                <input type="text" value="'.$id.'" name="id">
                <input type="text" value="Orden Finalizada" name="est">  
                <input type="text" value="'.$row['tipopago'].'" name="tpago">
                <input type="text" value="'.$row['total'].'" name="tot">

                
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <button class="btn btn-lg btn-danger col-md-12" type="submit" name="action">Finalizar la Orden</button>
                <p><br><br></p>
            </div>
          </li>

            </form>
          </li>';

        }else{
              echo'
        	<li class="list-group-item list-group-item-success">
			       <label>Precio Final: </label>
            <span class="badge badge-primary badge-pill"> $'.$row['total'].'</span>
            </form>
          </li>';}
        }
						 
			?>
			</ul>
				</div>
		    </div>
		</div>x 
	</div>
</div>