<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        	<div id="alerta"></div>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Agregar nueva MESA</h4></center>
            </div>
            <?php 
			    $sql1 = mysqli_query($con, "SELECT COUNT(id) FROM mesa;");
			    $row1 = mysqli_fetch_array($sql1);
			?>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="routers/registro_mesa.php" name="addform">
				<div class="row form-group">
					<div class="col-sm-6">
						<input class="form-control" name="mesa" value="Mesa <?php
						 	echo $row1[0];
						  ?>" type="text" disabled/>
					</div>
				    <div class="col-sm-6">
                    <input type="hidden" name="idm" name="idm" value="<?php echo ($row1[0]+1) ?> ">
                    <select name='disponibilidad' id='disponibilidad' class="form-control input-lg">
                      <option value='0'>Disponible</option>
                      <option value='1'>No Disponible</option>
                    </select>
                    </div>
                </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar nueva MESA</a>
			</form>
            </div>

        </div>
    </div>
</div>

