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
  <title>Admin - Reportes</title>
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
        <li class="active">Reportes</li>
      </ol>
    </div>
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Reportes y Estadisticas</h1>
      </div>
    </div>
    
    <div class="panel panel-container">
      <div class="row">
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
          <div class="panel panel-teal panel-widget border-right">
            <div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
              <div class="large">              
                <?php
                  $sql = mysqli_query($con, "SELECT COUNT(id) FROM orden;");
                  $row = mysqli_fetch_array($sql);
                  echo $row['COUNT(id)'];
                ?>
              </div>
              <div class="text-muted">Ordenes Realizadas</div>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
          <div class="panel panel-blue panel-widget border-right">
            <div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
              <div class="large">
                <?php
                  $sql = mysqli_query($con, "SELECT COUNT(id) FROM sugerencia;");
                  $row = mysqli_fetch_array($sql);
                  echo $row['COUNT(id)'];
                ?>
              </div>
              <div class="text-muted">Reclamos y Sugerencias Realizadas</div>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
          <div class="panel panel-orange panel-widget border-right">
            <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
              <div class="large">
                <?php
                  $sql = mysqli_query($con, "SELECT COUNT(id) FROM usuario;");
                  $row = mysqli_fetch_array($sql);
                  echo $row['COUNT(id)'];
                ?>                
              </div>
              <div class="text-muted">Usuarios Registrados</div>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
          <div class="panel panel-red panel-widget ">
            <div class="row no-padding"><em class="fa fa-xl fa-cutlery color-red"></em>
              <div class="large">
                <?php
                  $sql = mysqli_query($con, "SELECT COUNT(id) FROM productos;");
                  $row = mysqli_fetch_array($sql);
                  echo $row[0];
                ?>                   
              </div>
              <div class="text-muted">Productos Registrados</div>
            </div>
          </div>
        </div>
      </div><!--/.row-->
    </div>

      <form method="post" action="routers/imprimir_datos.php">

 
  <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Datos Relevantes : <strong>Ordenes</strong>
        <button class="btn btn-primary pull-right" type="submit" sname="action"><span class="glyphicon glyphicon-print"></button>
          </div>
          <div class="panel-body">
          <div class="col-md-12">

    <div class="row">
      <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">
            <?php
              $sql = mysqli_query($con, "SELECT COUNT(id) FROM orden WHERE tipopago='Efectivo';");
              $row = mysqli_fetch_array($sql);
              $sql1 = mysqli_query($con, "SELECT COUNT(id) FROM orden;");
              $row1 = mysqli_fetch_array($sql1);
              $porc1 = round(((100*$row[0])/$row1[0]));
              echo 
              "<div class='easypiechart' id='easypiechart-1' data-percent='".$porc1."' ><span class='percent'>".$porc1."%</span></div>";
            ?>     

            <input type="hidden" name="cant" id="cant" value=" <?php echo $row1[0];?>">          
            <input type="hidden" name="tdato1" id="tdato1" value=" <?php echo 'ORDENES PAGADAS EN EFECTIVO'; ?>">          
            <input type="hidden" name="porcen1" id="porcen1" value=" <?php echo $porc1; ?>">
     

            <label><div class="text-muted">ORDENES PAGADAS EN EFECTIVO</div></label>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">

            <?php
              $sql = mysqli_query($con, "SELECT COUNT(id) FROM orden WHERE tipopago='Billetera';");
              $row = mysqli_fetch_array($sql);
              $sql1 = mysqli_query($con, "SELECT COUNT(id) FROM orden;");
              $row1 = mysqli_fetch_array($sql1);
              $porc2 = round(((100*$row[0])/$row1[0]));
              echo 
              "<div class='easypiechart' id='easypiechart-2' data-percent='".$porc2."' ><span class='percent'>".$porc2."%</span></div>";
            ?>     

            <input type="hidden" name="tdato2" id="tdato2" value=" <?php echo 'ORDENES PAGADAS CON BILLETERA'; ?>">          
            <input type="hidden" name="porcen2" id="porcen2" value=" <?php echo $porc2; ?>">


            <label><div class="text-muted">ORDENES PAGADAS CON BILLETERA</div></label>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">

          <?php
              $sql = mysqli_query($con, "SELECT COUNT(id) FROM orden WHERE estado='Orden Cancelada (usu)' ;");
              $row = mysqli_fetch_array($sql);
              $sql1 = mysqli_query($con, "SELECT COUNT(id) FROM orden;");
              $row1 = mysqli_fetch_array($sql1);
              $porc3 = round(((100*$row[0])/$row1[0]));
              echo 
              "<div class='easypiechart' id='easypiechart-3' data-percent='".$porc3."' ><span class='percent'>".$porc3."%</span></div>";
            ?>     

            <input type="hidden" name="tdato3" id="tdato3" value=" <?php echo 'ORDENES CANCELADAS POR EL USUARIO'; ?>">          
            <input type="hidden" name="porcen3" id="porcen3" value=" <?php echo $porc3; ?>">


            <label><div class="text-muted">ORDENES CANCELADAS POR EL USUARIO</div></label>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">

          <?php
              $sql = mysqli_query($con, "SELECT COUNT(id) FROM orden WHERE estado='Orden Cancelada (adm)' ;");
              $row = mysqli_fetch_array($sql);
              $sql1 = mysqli_query($con, "SELECT COUNT(id) FROM orden;");
              $row1 = mysqli_fetch_array($sql1);
              $porc4 = ceil(((100*$row[0])/$row1[0]));
              echo 
              "<div class='easypiechart' id='easypiechart-4' data-percent='".$porc4."' ><span class='percent'>".$porc4."%</span></div>";
            ?>     

            <input type="hidden" name="tdato4" id="tdato4" value=" <?php echo 'ORDENES CANCELADAS POR EL ADMINISTRADOR'; ?>">          
            <input type="hidden" name="porcen4" id="porcen4" value=" <?php echo $porc4; ?>">
        </form>

            <label><div class="text-muted">ORDENES CANCELADAS POR EL ADMINISTRADOR</div></label>
          </div>
        </div>
      </div>

    </div>



          </div>
          </div>
        </div>
    </div>
  </div>

  <form method="post" action="routers/imprimir_datos.php">
  <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Datos Relevantes : <strong>Usuarios</strong>
 
        <button class="btn btn-primary pull-right" type="submit" sname="action"><span class="glyphicon glyphicon-print"></button>

          </div>
          <div class="panel-body">
          <div class="col-md-12">

    <div class="row">
      <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">
            <?php
              $sql = mysqli_query($con, "SELECT COUNT(id) FROM usuario WHERE tipo='Administrador';");
              $row = mysqli_fetch_array($sql);
              $sql1 = mysqli_query($con, "SELECT COUNT(id) FROM usuario;");
              $row1 = mysqli_fetch_array($sql1);
              $porc1 = round(((100*$row[0])/$row1[0]));
              echo 
              "<div class='easypiechart' id='easypiechart-teal' data-percent='".$porc1."' ><span class='percent'>".$porc1."%</span></div>";            ?>     

            <input type="hidden" name="cant" id="cant" value=" <?php echo $row1[0];?>">          
            <input type="hidden" name="tdato1" id="tdato1" value=" <?php echo 'USUARIOS DE TIPO ADMINISTRADOR'; ?>">          
            <input type="hidden" name="porcen1" id="porcen1" value=" <?php echo $porc1; ?>">
     

            <label><div class="text-muted">USUARIOS DE TIPO ADMINISTRADOR</div></label>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">

            <?php
              $sql = mysqli_query($con, "SELECT COUNT(id) FROM usuario WHERE tipo='Usuario';");
              $row = mysqli_fetch_array($sql);
              $sql1 = mysqli_query($con, "SELECT COUNT(id) FROM usuario;");
              $row1 = mysqli_fetch_array($sql1);
              $porc2 = round(((100*$row[0])/$row1[0]));
              echo 
              "<div class='easypiechart' id='easypiechart-blue' data-percent='".$porc2."' ><span class='percent'>".$porc2."%</span></div>";
            ?>     

            <input type="hidden" name="tdato2" id="tdato2" value=" <?php echo 'USARIOS DE TIPO USUARIO'; ?>">          
            <input type="hidden" name="porcen2" id="porcen2" value=" <?php echo $porc2; ?>">

            <label><div class="text-muted">USARIOS DE TIPO USUARIO</div></label>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">

          <?php
              $sql = mysqli_query($con, "SELECT COUNT(id) FROM usuario WHERE tipo='Usuario' and verificado = 0 ;");
              $row = mysqli_fetch_array($sql);
              $sql1 = mysqli_query($con, "SELECT COUNT(id) FROM usuario;");
              $row1 = mysqli_fetch_array($sql1);
              $porc3 = round(((100*$row[0])/$row1[0]));
              echo 
              "<div class='easypiechart' id='easypiechart-orange' data-percent='".$porc3."' ><span class='percent'>".$porc3."%</span></div>";
            ?>     

            <input type="hidden" name="tdato3" id="tdato3" value=" <?php echo 'USUARIOS VERIFICADOS (QUE UTILIZAN BILLETERA)'; ?>">          
            <input type="hidden" name="porcen3" id="porcen3" value=" <?php echo $porc3; ?>">

            <label><div class="text-muted">USUARIOS VERIFICADOS (QUE UTILIZAN BILLETERA)</div></label>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">

          <?php
              $sql = mysqli_query($con, "SELECT COUNT(id) FROM usuario WHERE tipo='Usuario' and estadocuenta = 1 ;");
              $row = mysqli_fetch_array($sql);
              $sql1 = mysqli_query($con, "SELECT COUNT(id) FROM usuario;");
              $row1 = mysqli_fetch_array($sql1);
              $porc4 = ceil(((100*$row[0])/$row1[0]));
              echo 
              "<div class='easypiechart' id='easypiechart-red' data-percent='".$porc4."' ><span class='percent'>".$porc4."%</span></div>";
            ?>     

            <input type="hidden" name="tdato4" id="tdato4" value=" <?php echo 'USUARIOS CON CUENTAS BLOQUEADAS'; ?>">          
            <input type="hidden" name="porcen4" id="porcen4" value=" <?php echo $porc4; ?>">
      </form>

            <label><div class="text-muted">USUARIOS CON CUENTAS BLOQUEADAS</div></label>
          </div>
        </div>
      </div>

    </div>


          </div>
          </div>
        </div>
    </div>
  </div>

      <form method="post" action="routers/imprimir_datos.php">

  <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Datos Relevantes : <strong>Sugerencias</strong>
        
        <button class="btn btn-primary pull-right" type="submit" sname="action"><span class="glyphicon glyphicon-print"></button>

          </div>
          <div class="panel-body">
          <div class="col-md-12">

    <div class="row">
      <div class="col-xs-6 col-md-6">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">
            <?php
              $sql = mysqli_query($con, "SELECT COUNT(id) FROM sugerencia WHERE estado='Abierto';");
              $row = mysqli_fetch_array($sql);
              $sql1 = mysqli_query($con, "SELECT COUNT(id) FROM sugerencia;");
              $row1 = mysqli_fetch_array($sql1);
              $porc1 = round(((100*$row[0])/$row1[0]));
              echo 
              "<div class='easypiechart' id='easypiechart-5' data-percent='".$porc1."' ><span class='percent'>".$porc1."%</span></div>";
            ?>     
            <input type="hidden" name="cant" id="cant" value=" <?php echo $row1[0];?>">          
            <input type="hidden" name="tdato1" id="tdato1" value=" <?php echo 'EN PROCESO (ABIERTAS)'; ?>">          
            <input type="hidden" name="porcen1" id="porcen1" value=" <?php echo $porc1; ?>">
            ?>     

            <label><div class="text-muted">EN PROCESO (ABIERTAS)</div></label>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-6">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">

            <?php
              $sql = mysqli_query($con, "SELECT COUNT(id) FROM sugerencia WHERE estado='Cerrada';");
              $row = mysqli_fetch_array($sql);
              $sql1 = mysqli_query($con, "SELECT COUNT(id) FROM sugerencia;");
              $row1 = mysqli_fetch_array($sql1);
              $porc2 = round(((100*$row[0])/$row1[0]));
              echo 
              "<div class='easypiechart' id='easypiechart-6' data-percent='".$porc2."' ><span class='percent'>".$porc2."%</span></div>";
            ?>     
            <input type="hidden" name="porcen2" id="porcen2" value=" <?php echo $porc2; ?>">
            ?>     
            <input type="hidden" name="tdato2" id="tdato2" value=" <?php echo 'CERRADAS O SOLUCIONADA'; ?>">          

            <input type="hidden" name="porcen3" id="porcen3" value=" ">
            <input type="hidden" name="tdato3" id="tdato3" value=" "> 
            <input type="hidden" name="porcen4" id="porcen4" value=" ">     
            <input type="hidden" name="tdato4" id="tdato4" value=" "> 
          </form>
            <label><div class="text-muted">CERRADAS O SOLUCIONADA</div></label>
          </div>
        </div>
      </div>
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
  <script src="js/easypiechart-data2.js"></script>
  <script src="js/easypiechart-data3.js"></script>
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