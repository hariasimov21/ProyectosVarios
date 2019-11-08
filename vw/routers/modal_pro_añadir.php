<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        	<div id="alerta"></div>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Agregar un nuevo ADM</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="routers/registro_r.php" name="addform">
				<div class="row form-group">
					<div class="col-sm-6">
						<input 
		                  class="form-control" 
		                  placeholder="Usuario" 
		                  name="usu" id="usu" type="text" 
		                  minlength="5" maxlength="11" 
		                  required pattern="[A-Za-z0-9]+" 
		                  title="Letras Minusculas y números. Tamaño mínimo: 5. Tamaño máximo: 11"
		                />
					</div>
					<div class="col-sm-6">
		 				<input 
		                  class="form-control" 
		                  placeholder="Nombre" 
		                  name="nom" id="nom" type="text" 
		                  minlength="5" maxlength="11" 
		                  required pattern="[^0-9][A-Za-z0-9]+" 
		                  title="Solo letras. Tamaño mínimo: 5. Tamaño máximo: 11"
		                />
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-6">
		                <input
		                  class="form-control" 
		                  placeholder="Contraseña" 
		                  name="contra" id="contra" type="password" 
		                  minlength="6" maxlength="15" 
		                  required pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" 
		                  title="Contraseña (mayúsculas, minúsculas, números / caracteres especiales y 8 caracteres como mínimo y tamaño máximo 15)"
		                />
					</div>
					<div class="col-sm-6">
						<input type="email" placeholder="Correo Electronico" class="form-control" name="email" id="email" required>
					</div>
				</div>				
				<div class="row form-group">
					<div class="col-sm-6">
						<input type="number" placeholder="Contacto" class="form-control" name="tel" id="tel" required>
					</div>
					<div class="col-sm-6">
						<input type="text" placeholder="Direccion" class="form-control" name="dir" id="dir" required>
					</div>
				</div>	
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar nuevo ADM</a>
			</form>
            </div>

        </div>
    </div>
</div>

