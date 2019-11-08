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
  <title>Admin - Administrar Platos</title>
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
        <li class="active">Productos</li>
      </ol>
    </div>
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Administrar Productos</h1>
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

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Todos los registros</div>
          <div class="panel-body">
          <div class="col-md-12">

      <div class="row">
        <a href="registrar_pro.php"class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Registrar Plato o Producto</a>
        <a href="routers/imprimir_pro.php" class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span> Descargar Datos de los Platos</a>
      </div>
      <div class="height10">
      </div>
      <div class="row">
        <table id="myTable" class="table table-bordered table-striped">
          <thead>
            <th hidden>id</th>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Disponibilidad</th>
            <th>Descripcion</th>
            <th>Categoria</th>            
            <th>Botones</th>
          </thead>
          <tbody>
            <?php
              include_once('includes/conectar.php');

              $sql = "SELECT * FROM productos";
              $query = $con->query($sql);

              $sql1 = "SELECT * FROM categoria";
              $query1 = $con->query($sql1);

              $d="";
              $c="";

              while($row = $query->fetch_assoc()){

                if ($row['disponibilidad']==1) {
                  $d = "No Disponible";
                } else {
                  $d = "Disponible";             
                };

                foreach ($query1 as $key1) {
                  if ($key1['id'] == $row['categoria']) {
                    $c = $key1['categoria'];
                    break;
                  };
                };    

                echo 
                "<tr>
                  <td hidden>".$row['id']."</td>
                  <td>
                  <img src=".$row['imagen']." width=100 height=100 />
                  </td>
                  <td>".$row['nombre']."</td>
                  <td>".$row['precio']."</td>
                  <td ".($d=="Disponible" ? 'class="alert alert-success"' : 'class="alert alert-warning"').">".$d."</td>
                  <td>".$row['descripcion']."</td>
                  <td>".$c."</td>
                  <td>
                    <a href='#edit_".$row['id']."' class='btn btn-md btn-success' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Editar
                    </a>
                  </td>

                </tr>";
                     include('routers/modal_pro_eliminar.php');
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
    if($_SESSION['usuarioc']==session_id())
    {
      header("location:index.php");   
    }
    else{
      header("location:login.php");
    }
  }
?>
