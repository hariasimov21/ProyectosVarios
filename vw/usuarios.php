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
  <title>Admin - Administrar Usuario  </title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="js/datatable/dataTable.bootstrap.min.css">
  <link href="css/styles.css" rel="stylesheet">
<!--  <link href="css/validar.css" rel="stylesheet"> -->

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
        <li class="active">Usuarios</li>
      </ol>
    </div>
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Todos los usuario registrados</h1>
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
          <div class="panel-heading">Lista de usuario</div>
          <div class="panel-body">
          <div class="col-md-12">

      <div class="row">
        
        <a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Registrar Administrador</a>
        
        <a href="routers/imprimir_usu.php" class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span> Descargar Datos Usuarios </a>
      </div>

      <div class="height10">
      </div>
      <form class="formValidate" id="formValidate1" method="post" action="routers/usuario_r.php" novalidate="novalidate">
            <div class="row">
              <div>
                  <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th data-field="name">Nombre</th>
                        <th data-field="price">Tipo</th>
                        <th data-field="price">Verificado</th>
                        <th data-field="price">Habilitado</th>
                        <th data-field="price">Billetera</th>           
                        <th data-field="price">Botones</th>  
                      </tr>
                    </thead>
                    <tbody>
        <?php

        $result = mysqli_query($con, "SELECT * FROM usuario");

        while($row = mysqli_fetch_array($result))
        {
          echo '<tr>
          <td>'.$row["usuario"].'</td>';              
          echo '
          <td>'.$row['tipo'].'</td>';
          echo '<td '.($row['verificado'] ? 'class="alert alert-warning"' : 'class="alert alert-success"').'>
          '.($row['verificado'] ? 'No Verificado' : 'Verificado').'</td>';  
          
          if ($row['tipo']=='Administrador') {
              echo "<td class='alert alert-danger'>
              No Aplica";
          } else {
              echo '<td '.($row['estadocuenta'] ? 'class="alert alert-warning"' : 'class="alert alert-success"').'>'.($row['estadocuenta'] ? 'No Habilitada' : 'Habilitada').'</td>';          
          }
          
          $key = $row['id'];
          $sql = mysqli_query($con,"SELECT * from billetera WHERE usuario = $key;");
          if($row1 = mysqli_fetch_array($sql)){
            $bid = $row1['id'];
            $sql1 = mysqli_query($con,"SELECT * from billeteradetalle WHERE billetera = $bid;");
            if($row2 = mysqli_fetch_array($sql1)){
              $din = $row2['dinero'];
            }
          }
          if ($row['tipo']=='Administrador') {
              echo "<td class='alert alert-danger'>
              No Aplica";
          } else {
              if ($row['verificado']==1) {
                echo "<td class='alert alert-warning'>
                No Habilitada";
              } else {
                echo '<td>
                $'.$din;              
              }
          }
          echo
          '</td>
          <td>
          <a href="#edit_'.$row['id'].'" class="btn btn-md btn-success" data-toggle="modal"><span class="glyphicon glyphicon-edit"> EDITAR</span></a>
            </button>
          </td>
          </tr>';          
                     include('routers/modal_usu_eliminar.php');
        }
        ?>
            </tbody>
          </table>
        </form>

          </div>
        </div>
      </div>
    </div>
  </div> 

} 
          </div>
        </div>
      </div>


    <?php include('routers/modal_pro_añadir.php') ?>


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
            "lengthMenu": "Ver _MENU_ usuarios por pagina",
            "zeroRecords": "No se encontro ningun usuario :c",
            "info": "Pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontraron coincidencias",
            "infoFiltered": "(de un total de _MAX_ de usuarios)",
            "search": "Filtrar por _INPUT_",
            "searchPlaceholder": "nombre, tipo...",

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