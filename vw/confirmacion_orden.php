<?php
include 'includes/conectar.php';
include 'includes/billetera.php';

$continuar = 0;
$tot = 0;
if($_SESSION['usuarioc']==session_id())
{
    if($_POST['tpago'] == 'Billetera'){
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
    <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/tablac.css" rel="stylesheet">
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
    

  <div class="col-md-12">
    <div class="form-group">
    
    <label>Datos del usuario y pedido :</label>
      <table class="table table-bordered">
      <tr class="bg-info" align="center">
        <td>Nombre</td>
        <td>Telefono</td>
        <td>Direccion</td>
        <td>Tipo Pago</td>
        <td>Mesa</td>
      </tr>
    <?php
        $tipop=$_POST['tpago'];

  $col = "";
  if ($tipop == 'Billetera') {
    $col = 'col-md-6';
  } else {
    $col = 'col-md-12';
  };

        $mesa=$_POST['mes'];
        echo '
      <tr align="center">
        <td>'.$nom.'</td>
        <td>'.$cont.'</td>
        <td>'.htmlspecialchars($_POST['dir']).'</td>
        <td>'.$tipop.'</td>
        ';

        if ($mesa=="") {
            echo '<td>No Mesa</td>';        
        } else {
            echo '<td>Mesa '.$mesa.'</td>';        
        }
        

        echo '
      </tr>';

      echo '
      </table>
    </div>
    </div>';
    
     if(!empty($_POST['des'])){
    echo '
  <div class="col-md-12">
    <div class="form-group">

        <table class="table table-bordered">
          <tr class="bg-info" align="center">
            <td>Acotacion</td>
          </tr>
          <tr>
            <td>'.$_POST['des'].'</td>
          </tr>
        </table>

      </div>
    </div>';
  } 

  echo
  '<div class="'.$col.'">
    <div class="form-group">

      <label>Datos productos :</label>

      <div class="table-wrapper-scroll-y my-custom-scrollbar">
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
      $pre = $value*$pre;
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
            <td class="bg-info" align="center" colspan="3">Total final de la compra :</td>
            <td class="bg-danger">$'.$tot.'.-</td>
          </tr>
        </table>

      </div>

      </div>
    </div>';

  if($tipop == 'Billetera'){
  echo '

  <div class="col-md-6">
    <div class="form-group">

      <label>Billetera :</label>

      <div class="table-wrapper-scroll-y my-custom-scrollbar">

        <table class="table table-bordered">
          <tr class="bg-info" align="center"> 
            <td class="bg-info" align="center" colspan="3">Total final de la compra :</td>
          </tr>
          <tr>
            <td class="bg-danger" align="center"> <strong><h3>$'.$tot.'.-</h3></strong> </td>
          </tr>
        </table>

        <table class="table table-bordered">
          <tr class="bg-info" align="center">
            <td>Dinero Total</td>
            <td>Despues de la Compra</td>
          </tr>
          <tr>
            <td class="alert alert-success" >$'.$din.'.-</td>
            <td class="bg-danger">$'.($din-$tot).'.-</td>
          </tr>
        </table>
      
      </div>

    </div>
  </div>';
  }
  ?>


<form action="routers/orden_r.php" method="post">
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
    
    <input type="hidden" name="mesa" value="
    <?php echo $_POST['mes'];?>">

    <input type="hidden" name="dir" value="
    <?php echo htmlspecialchars($_POST['dir']);?>">
    
    <?php  
      if (isset($_POST['des'])){ 
        echo'<input type="hidden" name="des" value="'.$_POST['des'].'">';
      }
    ?>

    <?php 
    if($tipop == 'Billetera')
      {
       echo '<input type="hidden" name="din" value="'.($din-$tot).'">'; 
      }
    ?>

    <input type="hidden" name="tot" value="<?php echo $tot;?>">


  <div class="col-md-6">
    <div class="form-group">

    <button class="btn btn-lg btn-primary col-md-12" type="submit" name="action" 
    <?php if($tipop == 'Billetera') 
    {
      if ($din-$tot < 0) 
        {
          echo 'disabled'; 
        }
    }
    ?>>Realizar Orden</button>
    
    </div>
  </div>


    </form>

  <div class="col-md-6">
    <div class="form-group">
    <button class="btn btn-lg btn-danger col-md-12">Modificar Orden</button>   
    </div>
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
