<?php
include 'includes/conectar.php';
	if($_SESSION['adminc']==session_id())
	{
		?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Usuario - Agregar Producto</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/datepicker3.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>

<body>

<?php include('routers/navbar_adm.php');?>

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Registro Producto</li>
      </ol>
    </div>
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Registro plato / producto</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
          <div class="col-md-12">
          <div class="panel-body">
          <form class="formValidate" id="formValidate1" method="post" action="routers/añadir_producto.php">

          <?php
                echo '
            <div class="col-md-6">


             <div class="form-group" >
                  <label>Categoria Producto :</label>
                  <select class="form-control input-lg" name="catego" id="catego" required>
                <option value="" selected>Seleccionar una categoria</option>

                  ';

                  $rcat = mysqli_query($con, "SELECT * FROM categoria");

                  foreach ($rcat as $rowc) {
                    echo '
                    <option value="'.$rowc['id'].'">
                    '.$rowc['categoria'].'
                    </option>';
                  };

                  echo
                  '</select>
                </div>  

                <div class="form-group">
                  <label>Imagen/Foto</label> (Url) :
                  <input class="form-control" id="ima" name="ima" type="url" placeholder="Ej : www.imagen.com/imagen.png" required>
                  <p>* Maximo 1000 caracteres.</p>
                </div>

            </div>

            <div class="col-md-6">
                
                <div class="form-group">
                  <label>Nombre Producto</label>
                  <input class="form-control" id="nom" name="nom" type="text" minlength="5" maxlength="30" placeholder="Ej : Coca Cola" required>
                  <p>* Minimo 5 caracteres y maximo 40.</p>
                </div>            

                <div class="form-group">
                  <label>Precio </label> (Por unidad) <label>:</label>
                  <input class="form-control" id="pre" name="pre" type="number" placeholder="Ej : 3000" min="500" max="30000" required>  
                  <p>* Minimo $500 y maximo $30000.</p>                
                </div>
  

          </div>  

            <div class="col-md-12">

                <div class="form-group">
                  <label>Descripcion</label>
                  <textarea class="form-control" id="descr" name="descr" rows="7" minlength="20" maxlength="2000" placeholder="Ingrese descripcion para producto"></textarea>
                  * Minimo 20 caracteres y maximo 2000
                </div>             

            </div>

            <div class="col-md-3">

                <div class="form-group">
                   <button class="btn btn-lg btn-primary col-md-12" type="submit" name="action">Añadir Producto</button>                 
                </div> 
            
            </div>


            </div>

              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div> ';
              ?>
            </table>
            </form>                   
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-12">
        <p class="back-link">Copyright © Juan Mansilla/Jaime Diaz/David Morales <a href="https://www.aiep.cl">Estudiantes AIEP - Puerto Montt</a></p>
    </div>

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
    |};
    </script>
    <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <script type="text/javascript" src="js/custom-script.js"></script>

</body>

</html>
<?php
	}
	else
	{
		if($_SESSION['usuarioc']==session_id())
		{
			header("location:index.php");		
		}
		else{
			header("location:login.php");
		}
	}
?>