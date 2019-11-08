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
  <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
  <link rel="stylesheet" type="text/css" href="js/datatable/dataTable.bootstrap.min.css">

</head>

<body>
  <?php include('routers/navbar_usu.php');?>

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Realizar Pedido</li>
      </ol>
    </div>
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Seleccione sus productos</h1>
      </div>
    </div>

  <?php include('routers/alertas.php');?>
  <div id="alerta"></div>

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
          <div class="col-md-12">
          <form class="formValidate" id="formValidate" method="post" action="ordenes_l.php" name="formcantidad" onsubmit="return validarcantidad();">
            <table id="myTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Imagen</th>
                  <th>Nombre</th>
                  <th>Categoria</th>
                  <th>Descripcion</th>
                  <th>Precio Unidad</th>
                  <th>Cantidad</th>
                </tr>
              </thead>  
            <tbody>
        <?php
        $result = mysqli_query($con, "SELECT * FROM productos where not disponibilidad");

        $sql1 = "SELECT * FROM categoria";
        $query1 = $con->query($sql1);
        $c="";

        foreach ($result as $row) {
          foreach ($query1 as $key1) {
            if ($key1['id'] == $row['categoria']) {
              $c = $key1['categoria'];
              break;
            };
          };    
          echo '
          <tr>
            <td>
                <img width=100 height=100 src="'.$row["imagen"].'" >
            </td>
            <td>'.$row["nombre"].'</td>
            <td>'.$c.'</td>
            <td>'.$row["descripcion"].'</td>
            <td>'.$row["precio"].'</td>
            <td>
              <input class="form-control" id="'.$row["id"].'" name="'.$row['id'].'" type="number" min="1" max="20" >
            </td>
          </tr>';
        }
        ?>
  
        </table>

      <hr>
        <label for="des" class="">Agrega una acotacion</label> (Opcional)     
        <div class="input-group">
          <input id="des" name="des" id="btn-input" type="text" class="form-control input-md" placeholder="Ejemplo 'Hamburguesa sin mayonesa...' "/><span class="input-group-btn">
          <button class="btn btn-primary btn-md" id="btn-chat" type="submit" name="action">Ordenar</button></span>
        </div>

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
  var chart2 = document.getElementById("bar-chart").getContext("2d");
  window.myBar = new Chart(chart2).Bar(barChartData, {
  responsive: true,
  scaleLineColor: "rgba(0,0,0,.2)",
  scaleGridLineColor: "rgba(0,0,0,.05)",
  scaleFontColor: "#c5c7cc"
  });
  var chart3 = document.getElementById("doughnut-chart").getContext("2d");
  window.myDoughnut = new Chart(chart3).Doughnut(doughnutData, {
  responsive: true,
  segmentShowStroke: false
  });
  var chart4 = document.getElementById("pie-chart").getContext("2d");
  window.myPie = new Chart(chart4).Pie(pieData, {
  responsive: true,
  segmentShowStroke: false
  });
  var chart5 = document.getElementById("radar-chart").getContext("2d");
  window.myRadarChart = new Chart(chart5).Radar(radarData, {
  responsive: true,
  scaleLineColor: "rgba(0,0,0,.05)",
  angleLineColor: "rgba(0,0,0,.2)"
  });
  var chart6 = document.getElementById("polar-area-chart").getContext("2d");
  window.myPolarAreaChart = new Chart(chart6).PolarArea(polarData, {
  responsive: true,
  scaleLineColor: "rgba(0,0,0,.2)",
  segmentShowStroke: false
  });
};
  </script> 

    <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <script type="text/javascript" src="js/custom-script.js"></script>
      <script src="js/jquery/jquery.min.js"></script>
  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/datatable/jquery.dataTables.min.js"></script>
  <script src="js/datatable/dataTable.bootstrap.min.js"></script>

  <script>
  $(document).ready(function(){
      $('#myTable').DataTable({
            "scrollY":        "400px",
            "scrollCollapse": "true",
            "paging":         "false",
            "responsive": "true",
        "language": {

            "lengthMenu": "Ver _MENU_ productos / platos por pagina",
            "zeroRecords": "No se encontro ningun plato / producto :c",
            "info": "Pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontraron coincidencias",
            "infoFiltered": "(de un total de _MAX_ de registros)",
            "search": "Filtrar por _INPUT_",
            "searchPlaceholder": "nombre, categoria...",

        "paginate": {
            "first":      "Primera",
            "last":       "Ultima",
            "next":       "Siguiente",
            "previous":   "Anterior"
        },

        } 
      }

      );
      $(document).on('click', '.close', function(){
        $('.alert').hide();
      })
  });



  </script>
  
</body>

</html>
<?php
	}
	else
	{
		if($_SESSION['adminc']==session_id())
		{
			header("location:pagina_adm.php");		
		}
		else{
			header("location:login.php");
		}
	}
?>