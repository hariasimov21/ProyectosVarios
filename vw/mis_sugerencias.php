<?php
include 'includes/conectar.php';
include 'includes/billetera.php';

	if($_SESSION['usuarioc']==session_id())
	{
		?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Usuario - Realizar Ordenes</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/datepicker3.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>

<body>

<?php include('routers/navbar_usu.php');?>

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Realizar Sugerencias</li>
      </ol>
    </div>
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Realiza tu sugerencia o reclamo</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
          <div class="col-md-12">
          <div class="panel-body">
          <div class="panel-body">

      <form class="formValidate" name="sugerencias" id="formValidate" method="post" action="routers/añadir_sugerencia.php">

      <div class="col-md-6">
          <div class="form-group">
            <label for="">Asunto :</label>
            <input class="form-control" name="asu" id="asu" type="text" minlength="15" maxlength="50" required>
            <p>* Minimo 15 caracteres y maximo 50.</p>
          </div>
        </div>

      <div class="col-md-6">
          <div class="form-group">
            <label for="">Tipo :</label>
            <select class="form-control input-lg" name="tip" id="tip" onChange="comprobarOption()" required>
                <option value="" selected>Seleccionar tipo</option>
                <option value="Sugerencias">Enviar una sugerencias</option>
                <option value="Reclamos">Enviar un reclamo</option>
                <option value="Errores Web">Reportar error en la pagina web</option>
                <option value="Problemas de Pago">Reportar error en un pago</option>
                <option value="Solicitudes Verificacion">Solicitar Verificacion</option>
                <option value="Otro">Otro</option>        
            </select>
              <p>* Si no sabe como categorizarlo seleccione "Otro".</p>
          </div>
      </div>

      <div class="col-md-12">
          <div class="form-group">
            <label for="">Descripcion : </label>
            <textarea class="form-control" type="textarea" name="des" id="des" rows="10" cols="30" 
             minlength="20" maxlength="2000" required></textarea>
            <input type="hidden" value="<?php echo $uid;?>" name="uid">
            <p>* Minimo 20 caracteres y maximo 2000</p>
          </div>
      </div>

      <div class="col-md-3">
          <div class="form-group">
            <button class="btn btn-lg btn-primary col-md-12" type="submit" name="action">Enviar</button>
          </div>
      </div>

      </form>

          </div>
          </div>
          </div>
        </div>
      </div>
    </div>  

  <div class="col-sm-12">
      <p class="back-link">Copyright © Juan Mansilla/Jaime Diaz/David Morales <a href="https://www.aiep.cl">Estudiantes AIEP - Puerto Montt</a></p>
  </div>

    <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/chart.min.js"></script>
  <script src="js/chart-data.js"></script>
  <script src="js/easypiechart.js"></script>
  <script src="js/easypiechart-data.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/custom.js"></script>
  <script>
    window.onload = function () {
  var chart1 = document.getElementById("line-chart").getContext("2d");
  window.myLine = new Chart(chart1).Line(lineChartData, {
  responsive: true,
  scaleLineColor: "rgba(0,0,0,.2)",
  scaleGridLineColor: "rgba(0,0,0,.05)",
  scaleFontColor: "#c5c7cc"
  });
};
  </script>

<script>
  function comprobarOption(){
    var opcion = document.sugerencias.tip.options.value;
    var ver = "Solicitudes Verificacion";
    if(opcion == ver) document.sugerencias.des.disabled = true;
    else document.sugerencias.des.disabled = false;
  };
</script>

</body>

</html>
<?php
	}
	else
	{
		if($_SESSION['adminc']==session_id())
		{
			header("location:sugerencias.php");		
		}
		else{
			header("location:login.php");
		}
	}
?>