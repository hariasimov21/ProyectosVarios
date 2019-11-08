<?php
include 'includes/conectar.php';
include 'includes/billetera.php';

$tipop = $_POST['tipop'];
$tc = $_POST['tc'];
$pidd = $_POST['pid'];

$continuar = 0;
$tot = 0;
if($_SESSION['usuarioc']==session_id())
{
    if($_POST['tipop'] == 'Billetera'){
    $_POST['cc'] = str_replace('-', '', $_POST['cc']);
    $_POST['cc'] = str_replace(' ', '', $_POST['cc']); 
    $_POST['cvv'] = (int)str_replace('-', '', $_POST['cvv']);
    $sql1 = mysqli_query($con, "SELECT * FROM billeteradetalle where billetera = $bid");
    while($row1 = mysqli_fetch_array($sql1)){
      $nta = $row1['numerotargeta'];
      $cvv = $row1['cvv'];
      if($nta == $_POST['cc'] && $cvv==$_POST['cvv'])
      $continuar=1;
      else
        header("location:index.php");
    }
    }
    else
      $continuar=1;
}

$result = mysqli_query($con, "SELECT * FROM usuario where id = $uid");
while($row = mysqli_fetch_array($result)){
  $nom = $row['nombre'];
  $cont = $row['contacto'];
}

if($continuar){
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
</head>

<body>

<?php include('routers/navbar_usu.php');?>

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#">
          <em class="fa fa-home"></em>
        </a></li>
        <li>Realizar Pedido</li>
        <li>Metodo de pago</li>
        <li class="active">Confirmar Pedido</li>
      </ol>
    </div>
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Confirmar y finalizar pedido</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
          <div class="col-md-12">
          <div class="panel-body">
    
    <?php

      echo '
      <div class="col-md-6">
          <div class="form-group">
      <label>Datos productos :</label>


      <table class="table table-bordered">
      <tr class="bg-info" align="center">
        <td>ID</td>
        <td>Nombre</td>
        <td>Cantidad</td>
        <td>Precio</td>
      </tr>';
    
  foreach ($_POST as $key => $value)
  {
    if(is_numeric($key)){   
    $result = mysqli_query($con, "SELECT * FROM productos WHERE id = $key");
    while($row = mysqli_fetch_array($result))
      {
        $pre = $row['precio'];
        $inom = $row['nombre'];
        $pid = $row['id'];
      }
      if ($value==0) {
          continue;
      } else {
        $pre = $value*$pre;         
      }
      
          echo '
          <tr>
            <td>#'.$pid.'</td>
            <td>'.$inom.'</td>
            <td>'.$value.'</td>
            <td>$'.$pre.'.-</td>
          </tr>';
      $tot = $tot + $pre;
    }
  }
          echo '
          <tr>
            <td class="bg-info" align="center" colspan="3">TOTAL NUEVOS PRODUCTOS :</td>
            <td class="bg-success">$'.$tot.'.-</td>
          </tr>
          <tr>
            <td class="bg-info" align="center" colspan="3">TOTAL FINAL SIN NUEVOS PRODUCTOS :</td>          
            <td class="bg-success">$'.$tc.'.</td>
          </tr>
          <tr>
            <td class="bg-info" align="center" colspan="3">NUEVO TOTAL :</td>          
            <td class="bg-danger">$'.($tc+$tot).'.</td>
          </tr>
        </table>
</div>
        </div>';

  if(!empty($_POST['des'])){
    echo '

      <div class="col-md-6">
          <div class="form-group">
        <label>Acotacion :</label>
        <table class="table table-bordered">
          <tr class="bg-info" align="center">
            <td>Nueva Acotacion</td>
          </tr>
          <tr>
            <td>'.$_POST['des'].'</td>
          </tr>
        </table>
        </div>
      </div>';
  }

  if(trim($_POST['tipop']) == 'Billetera'){
  echo '

      <div class="col-md-6">
          <div class="form-group">
        <label>Acotacion :</label>
        <table class="table table-bordered">
          <tr class="bg-info" align="center">
            <td>Dinero Total</td>
            <td>Despues de la Compra</td>
          </tr>
          <tr>
            <td class="alert alert-success" >$'.$din.'.-</td>
            <td class="bg-danger">$'.($din-$tc).'.-</td>
          </tr>
        </table>
        </div>
      </div>';
  }
  ?>


<form action="routers/orden_rprod.php" method="post">
    <?php
    foreach ($_POST as $key => $value)
    {
      if(is_numeric($key)){
        echo '<input type="hidden" name="'.$key.'" value="'.$value.'">';
      }
    }
    ?>

    <input type="hidden" name="tpago" value="
    <?php echo $_POST['tpago'];?>">
    
    <?php  
      if (isset($_POST['des'])){ 
        echo'<input type="hidden" name="des" value="'.$_POST['des'].'">';
      }
    ?>

    <?php 
    if(trim($_POST['tipop']) == 'Billetera')
      {
       echo '<input type="hidden" name="din" value="'.($din-$tot).'">'; 
      }
    ?>

    <input type="hidden" name="nuevot" value="<?php echo ($tc+$tot); ?>">
    <input type="hidden" name="pid" value="<?php echo $pidd;?>">
    <input type="hidden" name="tot" value="<?php echo $tot;?>">

    <button class="btn btn-lg btn-primary" type="submit" name="action" 
    <?php if(trim($_POST['tipop']) == 'Billetera') 
    {
      if ($din-$tot < 0) 
        {
          echo 'disabled'; 
        }
    }
    ?>>Realizar Orden</button>
    
    </form>
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

    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script> 
    <script type="text/javascript" src="js/plugins/angular.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script> 
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <script type="text/javascript" src="js/custom-script.js"></script>
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
