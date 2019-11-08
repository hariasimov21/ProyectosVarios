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
        <li class="active">Ordenes</li>
      </ol>
    </div>
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Listado de ordenes</h1>
      </div>
    </div>

    <?php include('routers/alertas.php');?>

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
          <div class="col-md-12">
          <div class="panel-body">

            <table id="myTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <td><label>id</label></td>
                  <td><label>Mesa</label></td>
                  <td><label>Fecha</label></td>
                  <td><label>Pago</label></td>
                  <td><label>Estado</label></td>
                  <td><label>Detalle</label></td>
                  <td><label>Detalle</label></td>
                </tr>
              </thead>
              <tbody>
          <?php
                  $est = "";
                  $id = ""; 
                  if(isset($_GET['est'])){
                    $est = $_GET['est'];
                  }

                  if(isset($_GET['id'])){
                    $id = $_GET['id'];
                  }else{
                    $id = '%';
                  } 



  if ($est != "") {
      $sql = mysqli_query($con, "SELECT * FROM orden WHERE usuario = $uid AND estado LIKE '$est';");
  }else if ($id != "") {
      $sql = mysqli_query($con, "SELECT * FROM orden WHERE id = $id;");                    
  }

  if ($id == "%" && $est == ""){
      $sql = mysqli_query($con, "SELECT * FROM orden WHERE usuario = $uid;");                    
  };

  while($row = mysqli_fetch_array($sql)){
            $est = $row['estado'];
            echo '

          <tr>
            <td class="alert alert-success"><label>'.$row['id'].'</label></td>';


            if ($row['mesa']=='1') {
                echo '<td class="alert alert-warning">Sin Mesa</td>';
            } else {
                echo '<td class="alert alert-info">'.($row['mesa']-1).'</td>';
          } 
            echo '
            <td>'.$row['fecha'].'</td>
            <td>'.$row['tipopago'].'</td>
            <td>'.($est=='Orden Cancelada (adm)' ? 'Orden Cancelada (adm)<a href="sugerencias.php"><br>(Contacte con ADM)</a> ' : $est).'
            '.(!empty($row['detalle']) ? '
            <td>
                '.$row['detalle'].'' : '').'
            </td>
            <td><a href="#edit_'.$row['id'].'" class="btn btn-md btn-primary" data-toggle="modal">Ver detalle</a>
            </td>
          </tr>';
          
        include('routers/modal_ped_1.php'); }?>
        
        </tbody>
          </table>
          </div>
          </div>
          </div>
        </div>
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
};
  </script>
   <script src="js/jquery/jquery.min.js"></script>
  <script src="js/datatable/jquery.dataTables.min.js"></script>
  <script src="js/datatable/dataTable.bootstrap.min.js"></script>

 <script>
  $(document).ready(function(){
      $('#myTable').DataTable({
            "responsive": "true",
        "language": {
            "lengthMenu": "Ver _MENU_ entradas por pagina",
            "zeroRecords": "No se encontro ninguna coincidencia :c",
            "info": "Pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontraron coincidencias",
            "infoFiltered": "(de un total de _MAX_ de registros)",
            "search": "Filtrar por _INPUT_",
            "searchPlaceholder": "usuario, fecha...",

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
			header("location:ordenes_totales.php");		
		}
		else{
			header("location:login.php");
		}
	}
?>