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
    <link rel="stylesheet" type="text/css" href="js/datatable/dataTable.bootstrap.min.css">

  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
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
        <li class="active">Mesas</li>
      </ol>
    </div>
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Registro Mesa</h1>
      </div>
    </div>

    <?php include('routers/alertas.php');?>

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Administrar Mesas         
            

        <a href="#addnew" data-toggle="modal" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus"></span> Registrar Mesa</a>

          </div>
          <div class="panel-body">
          <div class="col-md-12">
          <div class="panel-body">


        <table id="myTable" class="table table-bordered table-striped">
          <thead>
            <th>Mesa</th>
            <th>Disponibilidad</th>
            <th>Botones</th>
          </thead>
          <tbody>
            <?php
              include_once('includes/conectar.php');

              $sql = "SELECT * FROM mesa where id > 1";
              $query = $con->query($sql);

              while($row = $query->fetch_assoc()){
                echo 
                "<tr>
                  <td>
                  Mesa  ".($row['id']-1)."</td>
                  <td>
                  <form method='POST' action='routers/registro_m.php'>
                    <input type='hidden' name='mesa' id='mesa' value='".$row['id']."'>
                    <select name='disponibilidad' id='disponibilidad' class='form-control'>
                      <option value='0' ".($row['disponibilidad']==0 ? 'selected' : '').">Disponible</option>
                      <option value='1' ".($row['disponibilidad']==1 ? 'selected' : '').">No Disponible</option>
                    </select>
                  </td>
                  <td>
                    <button class='btn btn-md btn-primary' type='submit' name='action'>Cambiar Disponibilidad</button>
                  </td>
                  </form>

                </tr>";
              }
              ?>


            </tbody>
          <?php include('routers/modal_mes_añadir.php') ?>

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

  </div>


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

</html>

</body>

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