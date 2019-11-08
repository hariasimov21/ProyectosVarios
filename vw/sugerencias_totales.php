<?php
include 'includes/conectar.php';
include 'includes/billetera.php';

	if($_SESSION['adminc']==session_id())
	{
		?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Sugerencias</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="js/datatable/dataTable.bootstrap.min.css">
  <link href="css/styles.css" rel="stylesheet">
  <style>
    .height10{
      height:10px;
    }
  </style>
</head>

<body>

<?php include('routers/navbar_adm.php');?>

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Lista de Sugerencias</li>
      </ol>
    </div>
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Responder sugerencias</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Todas las sugerencias</div>
          <div class="panel-body">
          <div class="col-md-12">
      <table id="myTable" class="table table-bordered table-striped">
              <thead>
      <tr>
        <td>Asunto</td>
        <td>Estado</td>
        <td>Sugerencia</td>
        <td>Fecha</td>
        <td>Botones</td>
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
                    $sql = mysqli_query($con, "SELECT * FROM sugerencia WHERE estado LIKE '$est';");
                  }else if ($id != "") {
                    $sql = mysqli_query($con, "SELECT * FROM sugerencia WHERE id LIKE '$id';");
                  }
                  

                  while($row = mysqli_fetch_array($sql)){


                  echo'                                      
      <tr>
          <td>
            <label for="">'.$row['asunto'].'</label>
          </td>
          <td>
            '.$row['estado'].'  
          </td>
          <td> 
            <span class="task-cat grey darken-3">'.$row['tipo'].'</span>
          </td>
          <td>
            <span>'.$row['fecha'].'</span>
          </td>
          <td>
          <a href="ver_sugerencias_adm.php?id='.$row['id'].'" class="btn btn-md btn-success col-md-12"></span> Responder</a></a>
          </td>
      </tr>
';}
                  ?>
      </tbody>
      </table>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="col-sm-12">
      <p class="back-link">Copyright © Juan Mansilla/Jaime Diaz/David Morales <a href="https://www.aiep.cl">Estudiantes AIEP - Puerto Montt</a></p>
  </div>

</body>

  <script src="js/jquery/jquery.min.js"></script>
  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/bootstrap/js/bootstrap.min.js"></script>
  <script src="js/datatable/jquery.dataTables.min.js"></script>
  <script src="js/datatable/dataTable.bootstrap.min.js"></script>

<script>
  $(document).ready(function(){
      $('#myTable').DataTable({
            "responsive": "true",
        "language": {
            "lengthMenu": "Ver _MENU_ Sugerencias / reclamos por pagina",
            "zeroRecords": "No se encontro ninguna sugerencia / reclamos :c",
            "info": "Pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontraron coincidencias",
            "infoFiltered": "(de un total de _MAX_ de registros)",
            "search": "Filtrar por _INPUT_",
            "searchPlaceholder": "fecha, estado...",

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


</html>
<?php
	}
	else
	{
		if($_SESSION['customer_sid']==session_id())
		{
			header("location:tickets.php");		
		}
		else{
			header("location:login.php");
		}
	}
?>