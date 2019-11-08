<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">EDITAR USUARIOS</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="routers/usuario_r.php">
				<input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Nombre:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre']; ?>" disabled>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Tipo:</label>
					</div>
					<div class="col-sm-10">
						<?php 
          			echo 
          			'<select name="'.$row['id'].'_role" class="form-control">
                      <option value="Administrador"'.($row['tipo']=='Administrador' ? 'selected' : '').'>Administrador</option>
                      <option value="Usuario"'.($row['tipo']=='Usuario' ? 'selected' : '').'>Usuario</option>
                    </select>';
						 ?>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Disponibilidad:</label>
					</div>
					<div class="col-sm-10">

					<?php 
 					echo '<select name="'.$row['id'].'_verified" class="form-control">
                      <option value="1"'.($row['verificado'] ? 'selected' : '').'>No Verificado</option>
                      <option value="0"'.(!$row['verificado'] ? 'selected' : '').'> Verificado</option>
                    </select>';  
					 ?>

					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Estado Cuenta:</label>
					</div>
					<div class="col-sm-10">
					
					<?php 

         			echo '<select name="'.$row['id'].'_deleted" class="form-control">
                      <option value="1"'.($row['estadocuenta'] ? 'selected' : '').'>Desabilitado</option>
                      <option value="0"'.(!$row['estadocuenta'] ? 'selected' : '').' >Habilitado</option>
                    </select>';

					 ?>

					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Billetera:</label>
					</div>
					<div class="col-sm-10">

				<?php
		          echo '<input id="din" name="'.$row['id'].'_balance" type="number" value="'.$din.'" class="form-control" max="200000" min="2000">'; 
				?>

					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Modificar</a>
			</form>
            </div>
        </div>
    </div>
</div>
