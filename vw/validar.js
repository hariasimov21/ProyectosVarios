function validartexto(dato){
	var patron = /^[a-zA-ZáéíóúñÁÉÍÓÚÑ\s]*$/;
	if (dato.search(patron)) {
		return false;
	}else{
		return true;
	}}
function validarnumero(dato){
	if (!/^([0-9])*$/.test(dato)) {
		return false;
	}else{
		return true;
	}}
function validarcorreo(dato){
	var emailRegex = /^(?:[^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*|"[^\n"]+")@(?:[^<>()[\].,;:\s@"]+\.)+[^<>()[\]\.,;:\s@"]{2,63}$/i;
	if (!emailRegex.test(dato)) {
		return false;
	}else{
		return true;
	}}
function validarespacios(dato){

	var patron = /^\s+$/;	
	if (patron.test(dato)){
		return false;
	}else{
		return true;
	}}
function validarlargo(dato,min,max){
	if (dato.length < min || dato.length > max) {
		return false;
	}else{
		return true;
	}
}

function validarcantidad(){

	var formcantidad = document.formcantidad;

	if (formcantidad.sihayono.value > 1) {
		document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="closed" data-dismiss="alert"></a>Ingrese <strong>Numero de Targeta Correcto</strong>.</div>';
		return false;
	}else{
		document.getElementById("alerta").innerHTML = '';
	}

}


function validarorden(){

	var formorden = document.formorden;

	if (formorden.cc.disabled == false) {
		if (formorden.cc1.value != formorden.cc.value) {
			document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="closed" data-dismiss="alert"></a>Ingrese <strong>Numero de Targeta Correcto</strong>.</div>';
			formorden.cc.value = "";
			formorden.cc.focus();
			return false;
		}else{
			document.getElementById("alerta").innerHTML = '';
		}

		if (formorden.cvv1.value != formorden.cvv.value) {
			document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="closed" data-dismiss="alert"></a>Ingrese <strong>CVV (Contraseña) Correcto</strong>.</div>';
			formorden.cvv.value = "";
			formorden.cvv.focus();
			return false;
		}else{
			document.getElementById("alerta").innerHTML = '';
		}	
	}
	formorden.submit();
}


function validarregistro(){

	var formregistro = document.formregistro;

	if (formregistro.usu.value == "" || validarespacios(formregistro.usu.value)==false) {
		document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="closed" data-dismiss="alert"></a> Debe ingresar un nombre. (Espacios en blanco no validos)</div>';
		formregistro.usu.value = "";
		formregistro.usu.focus();
		return false;
	}else{
		document.getElementById("alerta").innerHTML = '';
	}

	if (formregistro.nom.value == "" || validarespacios(formregistro.nom.value)==false){
		document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="closed" data-dismiss="alert"></a> Debe ingresar un usuario. (Espacios en blanco no validos)</div>';
		formregistro.nom.value = "";
		formregistro.nom.focus();
		return false;
	}else if (validartexto(formregistro.nom.value)==false){
		document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="closed" data-dismiss="alert"></a> El campo nombre solo debe tener letras</div>';
		formregistro.nom.value = "";
		formregistro.nom.focus();
		return false;
	}else{
		document.getElementById("alerta").innerHTML = '';
	}

	if(formregistro.contra.value == "" || validarespacios(formregistro.contra.value)==false){
		document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="closed" data-dismiss="alert"></a> Debe ingresar una contraseña</div>';
		formregistro.contra.value = "";
		formregistro.contra.focus();
		return false;
	}else{
		document.getElementById("alerta").innerHTML = '';
	}

	if(formregistro.email.value == "" || validarespacios(formregistro.contra.value)==false){
		document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="closed" data-dismiss="alert"></a> Debe ingresar un correo electronico</div>';
		formregistro.email.value = "";
		formregistro.email.focus();
		return false;
	}else if (validarcorreo(formregistro.email.value)==false){
		document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="closed" data-dismiss="alert"></a> No corresponde a un correo <valido> </valido></div>';
		formregistro.email.value = "";
		formregistro.email.focus();
		return false;
	}else{
		document.getElementById("alerta").innerHTML = '';
	}

	if (formregistro.dir.value == "" || validarespacios(formregistro.contra.value)==false){
		document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="closed" data-dismiss="alert"></a> Debe ingresar una direccion</div>';
		formregistro.dir.value = "";
		formregistro.dir.focus();
		return false;
	}else{
		document.getElementById("alerta").innerHTML = '';
	}

	if (formregistro.tel.value == "" || validarespacios(formregistro.contra.value)==false){
		document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="closed" data-dismiss="alert"></a> Debe ingresar un telefono</div>';
		formregistro.tel.value = "";
		formregistro.tel.focus();
		return false;
	}else if (validarnumero(formregistro.tel.value)==false){
		document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="closed" data-dismiss="alert"></a> El campo nombre solo debe ingresar numeros</div>';
		formregistro.tel.focus();
		return false;
	}else{
		document.getElementById("alerta").innerHTML = '';
	}

	formregistro.submit();
}