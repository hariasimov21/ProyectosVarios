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
  <title>Admin - Ordenes</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/datepicker3.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="js/datatable/dataTable.bootstrap.min.css">

</head>

  <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span></button>
        <a class="navbar-brand" href="#"><span>Virtual</span>Waiter</a>
      </div>
    </div>

  </nav>
  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
      <div class="profile-userpic">
        <img src="https://www.soporte.ipn.mx/assets/images/cau-profile-default.png" alt="">
      </div>
      <div class="profile-usertitle">
        <div class="profile-usertitle-name"><?php echo $nom;?></div>
        <div class="profile-usertitle-status"></span><?php echo $tip;?></div>
      </div>
      <div class="clear"></div>
    </div>
    <ul class="nav menu">
      <li><a href="index.php"><em class="fa fa-cutlery">&nbsp;</em> Lista de Platos</a></li>
      <li><a href="registrar_pro.php"><em class="fa fa-cutlery">&nbsp;</em> Agregar Plato</a></li>
      <li class="parent active"><a data-toggle="collapse" href="#sub-item-1">
        <em class="fa fa-navicon">&nbsp;</em> Ordenes <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
        </a>
        <ul class="children collapse" id="sub-item-1">
          <li><a href="ordenes_totales.php">Lista de ordenes</a></li>
                <?php
                  $sql = mysqli_query($con, "SELECT DISTINCT estado FROM orden;");
                  while($row = mysqli_fetch_array($sql)){
                                    echo '<li><a href="ordenes_totales.php?est='.$row['estado'].'">'.$row['estado'].'</a>
                                    </li>';
                  }
                  ?>
        </ul>
      </li>
      <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
        <em class="fa fa-navicon">&nbsp;</em> Sugerencias <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
        </a>
        <ul class="children collapse" id="sub-item-2">
          <li><a href="sugerencias_totales.php">Lista de sugerencias</a></li>
                <?php
                  $sql = mysqli_query($con, "SELECT DISTINCT estado FROM sugerencia;");
                  while($row = mysqli_fetch_array($sql)){
                                    echo '<li><a href="sugerencias_totales.php?est='.$row['estado'].'">'.$row['estado'].'</a>
                                    </li>';
                  }
                  ?>
        </ul>
      <li><a href="usuarios.php"><em class="fa fa-user">&nbsp;</em> Lista de Usuarios</a></li>
      <li><a href="reportes.php"><em class="fa fa-bar-chart">&nbsp;</em>Generar Reportes</a></li>
      <li><a href="detalle_adm.php"><em class="fa fa-id-badge">&nbsp;</em> Modificar Datos</a></li>      
      <li><a href="routers/cerrar_sesion.php"><em class="fa fa-power-off">&nbsp;</em> Cerrar Sesion</a></li>
    </ul>
  </div>


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
              <td>1</td>
              <td>2</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>01</td>
              <td>02</td>
            </tr>
          </tbody>
        </table>

          <?php
          if(isset($_GET['est'])){
            $est = $_GET['est'];
          }
          else{
            $est = '%';
          }
          $sql = mysqli_query($con, "SELECT * FROM orden WHERE estado LIKE '$est';");
          echo '<div class="row">
                <div>';
          while($row = mysqli_fetch_array($sql))
          {
            $est = $row['estado'];
            $ecu = $row['revocar'];
            echo '
                <div class="form-group">
                <table class="table">
                  <tbody>
                  <tr class="bg-primary">
                    <td><label>Id Pedido</label></td>
                    <td><label>Fecha</label></td>
                    <td><label>Pago</label></td>
                    <td><label>Estado</label></td>
                  </tr>
                  <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['fecha'].'</td>
                    <td>'.$row['tipopago'].'</td>
                    <td>'.($ecu ? $est : '
                        <form method="post" action="routers/editar_orden.php">
                          <input type="hidden" value="'.$row['id'].'" name="id">
                        <select name="est">
                        <option value="Orden lista y en espera" '.($est=='Orden lista y en espera' ? 'selected' : '').'>Orden lista y en espera</option>
                        <option value="Orden Entregada" '.($est=='Orden Entregada' ? 'selected' : '').'>Orden Entregada</option>
                        <option value="Orden Cancelada" '.($est=='Orden Cancelada' ? 'selected' : '').'>Orden Cancelada</option>
                        <option value="Orden en proceso" '.($est=='Orden en proceso' ? 'selected' : '').'>Orden en proceso</option>               
                        </select>
                        ').'</p>
                      </strong>
                      </td>';
            $oid = $row['id'];
            $uid = $row['usuario'];
            $sql1 = mysqli_query($con, "SELECT * FROM ordendetalle WHERE orden = $oid;");
            $sql3 = mysqli_query($con, "SELECT * FROM usuario WHERE id = $uid;");
              while($row3 = mysqli_fetch_array($sql3))
              {
              echo '
              </tr>
                  <tr class="bg-primary">
                    <td><label>Nombre</label></td>
                    <td><label>Direccion</label></td>
                    <td><label>Contacto</label></td>
                    <td><label>Correo</label></td>
                  </tr>
                  <tr>              
                    <td>'.$row3['nombre'].'</td>
                    <td>'.$row['direccion'].'</td>
                    <td>'.($row3['contacto'] == '' ? '' : '<p>'.$row3['contacto'].'').'
                    </td>
                    <td>'.($row3['email'] == '' ? '' : '<p>'.$row3['email'].'</p>').'</strong>
                    </td>
                  </tr>
                  <tr class="bg-primary"> 
                    <td colspan="4"><label>Acotacion/Nota</label></td>
                  </tr>
                  <tr>
                    <td colspan="4">'.(!empty($row['detalle']) ? '<p>'.$row['detalle'].'</p>' : '').'</td>
                  </tr>
                  <tr class="bg-primary">
                     <td><label>Id Producto</label></td>
                     <td><label>Nombre</label></td>
                     <td><label>Cantidad</label></td>
                     <td><label>Precio</label></td> 
                  </tr>';             
            }
            while($row1 = mysqli_fetch_array($sql1))
            {
              $uid = $row1['producto'];
              $sql2 = mysqli_query($con, "SELECT * FROM productos WHERE id = $uid;");
              while($row2 = mysqli_fetch_array($sql2))
                $inom = $row2['nombre'];
              echo '
                    <tr>
                      <td>#'.$row1['id'].'</td>
                      <td>'.$inom.'</td>
                      <td>'.$row1['cantidad'].'</td>
                      <td>'.$row1['precio'].'</td>
                    </tr>
                    ';}                    
                if(!$ecu){
                echo '
                    <tr>
                      <td colspan="3">
                      <button class="btn btn-md btn-primary" type="submit" name="action">Cambiar estado
                      </button>
                        </form>
                      <td class="bg-danger">'.$row['total'].'</td>
                    </tr>
                  </tbody>
                  </table>';
                };
          }
          ?>
          </ul>
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
    <script src="js/bootstrap/js/bootstrap.min.js"></script>
  <script src="js/datatable/jquery.dataTables.min.js"></script>
  <script src="js/datatable/dataTable.bootstrap.min.js"></script>

 <script>
  $(document).ready(function(){
      $('#myTable').DataTable({
            "responsive": "true",
        "language": {
            "lengthMenu": "Ver _MENU_ ordenes por pagina",
            "zeroRecords": "No se encontro ninguna orden :c",
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