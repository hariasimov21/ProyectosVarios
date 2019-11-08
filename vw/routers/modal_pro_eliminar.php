<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">EDITAR PRODUCTOS/PLATOS</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="routers/c_editar_pro.php">
				<input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
				<div class="row form-group">
					<div class="col-sm-6">
						<label class="control-label modal-label">Nombre:</label>
						<input type="text" class="form-control" name="nombre" minlength="5" maxlength="30" value="<?php echo $row['nombre']; ?>" required>
					</div>
					<div class="col-sm-6">
						<label class="control-label modal-label">Precio:</label>
						<input type="number" class="form-control" min="500" max="30000" name="precio" value="<?php echo $row['precio']; ?>" required>
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-6">
					<label class="control-label modal-label">Categoria :</label>
					<?php $ip = $row['disponibilidad']; ?>
					<select name="categoria" class="form-control" required>
						<option value="">Seleccione categoria</option>
						<?php 
							$sql1 = "SELECT * FROM categoria";
							$query1 = $con->query($sql1);		

							foreach ($query1 as $key) {
								echo "<option ";

								if ($row['categoria']==$key['id']) {
									echo "selected";
								} else {
									echo "";
								}

								echo " value=".$key['id'].">".$key['categoria']."</option>";
							};
						?>
					</select>
					</div>
					<div class="col-sm-6">
						<label class="control-label modal-label">Stock:</label>
					<?php $op = $row['disponibilidad']; ?>
					<select name="disponibilidad" class="form-control" required>
						<option value="">Seleccione disponibilidad</option>
						<option value="0" <?php if ($op==0) { echo 'selected'; };?>>Disponible</option>
						<option value="1" <?php if ($op==1) { echo 'selected'; };?>>No Disponible</option>
					</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-12">
						<label class="control-label modal-label">Imagen :</label>
						<input type="text" class="form-control" name="imagen" value="<?php echo $row['imagen']; ?>">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-12">
						<label class="control-label modal-label">Descripcion :</label>
						<textarea class="form-control" cols="10" rows="6" minlength="20" maxlength="2000" name="descripcion" required><?php echo $row['descripcion']; ?></textarea>
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

<!-- Delete
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Member</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Delete</p>
				<h2 class="text-center"><?php echo $row['firstname'].' '.$row['lastname']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>
-->