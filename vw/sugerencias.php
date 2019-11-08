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
        <h1 class="page-header">Todas las ordenes</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Lista de ordenes</div>
          <div class="panel-body">
          <div class="col-md-12">

          <table id="myTable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <td>Asunto</td>
                <td>Estado</td>
                <td>Tipo</td>
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

                    $sql = mysqli_query($con, "SELECT * FROM sugerencia WHERE usuario = $uid AND estado LIKE '$est' AND not disponibilidad;");

                  }else if ($id != "") {
                    $sql = mysqli_query($con, "SELECT * FROM sugerencia WHERE usuario = $uid AND id LIKE '$id';");
                  }

									while($row = mysqli_fetch_array($sql)){								                                
					echo' 
              <tr>
                <td><a href="ver_sugerencias.php?id='.$row['id'].'">'.$row['id'].') <label>'.strtoupper($row['asunto']).'</label></td>
                <td>'.$row['estado'].'</td>
                <td>'.$row['tipo'].'</td>
                <td>'.$row['fecha'].'</td>
                <td>
                    <a href="ver_sugerencias.php?id='.$row['id'].'"><button type="button" class="btn btn-success">Ver Sugerencia</button></a>
                </td>
              </tr>

            ';
									}
									?>
            </tbody>
          </table>
          </div>
          </div>
          </div>
        </div>
      </div>
    </div>

  <div class="col-sm-12">
      <p class="back-link">Copyright © Juan Mansilla/Jaime Diaz/David Morales <a href="https://www.aiep.cl">Estudiantes AIEP - Puerto Montt</a></p>
  </div>


    <script type="text/javascript" src="js/plugins/angular.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="js/plugins/data-tables/data-tables-script.js"></script>
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <script type="text/javascript" src="js/custom-script.js"></script>
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