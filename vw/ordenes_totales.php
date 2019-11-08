x<?php
include 'includes/conectar.php';
	if($_SESSION['adminc']==session_id())
	{
		?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Ordenes</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/datepicker3.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="js/datatable/dataTable.bootstrap.min.css">
</head>

<?php include('routers/navbar_adm.php');?>

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#">
          <em class="fa fa-home"></em>
        </a>
      </li>
        <li class="active">Ordenes</li>
      </ol>
    </div>
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Todas las ordenes</h1>
      </div>
    </div>

      <div>
      <?php
        if(isset($_SESSION['error'])){
          echo
          "
          <div class='alert alert-danger text-center'>
            <button class='close'>&times;</button>
            ".$_SESSION['error']."
          </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo
          "
          <div class='alert alert-success text-center'>
            <button class='close'>&times;</button>
            ".$_SESSION['success']."
          </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      </div>

<?php include('routers/alertas.php');?>


    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Lista de ordenes</div>
          <div class="panel-body">
          <div class="col-md-12">
            <table id="myTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <td><label>id</label></td>
                  <td><label>Fecha</label></td>
                  <td><label>Pago</label></td>
                  <td><label>Estado</label></td>
                  <td><label>Nombre</label></td>
                  <td><label>Botones</label></td>
                </tr>
              </thead>

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
          $sql = mysqli_query($con, "SELECT * FROM orden WHERE estado LIKE '$est';");

                  }else if ($id != "") {
          $sql = mysqli_query($con, "SELECT * FROM orden WHERE id LIKE '$id';");
                  }

          while($row = mysqli_fetch_array($sql))
          {
            $est = $row['estado'];
            $ecu = $row['revocar'];
            $total = $row['total'];
            echo '
  
                <tr>
                  <td>'.$row['id'].'</td>
                  <td>'.$row['fecha'].'</td>
                  <td>'.$row['tipopago'].'</td>
                  <td>'.($ecu ? $est : '
                        <form method="post" action="routers/editar_orden.php">
                          <input type="hidden" value="'.$row['id'].'" name="id">
                        <select name="est" class="form-control">
                        <option value="Orden lista y en espera" '.($est=='Orden lista y en espera' ? 'selected' : '').'>Orden lista y en espera</option>
                        <option value="Orden Entregada" '.($est=='Orden Entregada' ? 'selected' : '').'>Orden Entregada</option>
                        <option value="Orden Cancelada (adm)" '.($est=='Orden Cancelada (adm)' ? 'selected' : '').'>Orden Cancelada (adm)</option>
                        <option value="Orden en proceso" '.($est=='Orden en proceso' ? 'selected' : '').'>Orden en proceso</option>               
                        </select>
                        ').'</p>
                      </strong>
                  </td>               '; 

            $oid = $row['id'];
            $uid = $row['usuario'];
            $sql1 = mysqli_query($con, "SELECT * FROM ordendetalle WHERE orden = $oid;");
            $sql3 = mysqli_query($con, "SELECT * FROM usuario WHERE id = $uid;");
              while($row3 = mysqli_fetch_array($sql3))
              {
              echo '
        
                    <td>'.$row3['nombre'].'</td>
                    <td>';
              if(!$ecu){
              echo '
                    
                      <button class="btn btn-md btn-primary" type="submit" name="action">Cambiar estado
                      </button>';
                };

              echo '

                    <a href="#edit_'.$row['id'].'" class="btn btn-md btn-success" data-toggle="modal">Ver Detalle</span></a>

                    </td>
                </form>';

                include('routers/modal_ped_modificar.php');     
                
            }

          }
          ?>
              </tbody>
            </table>
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

    <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <script type="text/javascript" src="js/custom-script.js"></script>
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


  <div class="col-sm-12">
      <p class="back-link">Copyright © Juan Mansilla/Jaime Diaz/David Morales <a href="https://www.aiep.cl">Estudiantes AIEP - Puerto Montt</a></p>
  </div>

</html>
<?php
	}
	else
	{
		if($_SESSION['uid']==session_id())
		{
			header("location:orders.php");		
		}
		else{
			header("location:login.php");
		}
	}
?>