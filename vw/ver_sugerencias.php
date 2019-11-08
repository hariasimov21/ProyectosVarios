<?php
include 'includes/conectar.php';
include 'includes/billetera.php';
$continuar=0;
if($_SESSION['usuarioc']==session_id())
{
		$sid = $_GET['id'];
		$sql1 = "SELECT * FROM sugerencia where usuario = $uid AND id = $sid AND not disponibilidad;";
		if(mysqli_num_rows(mysqli_query($con,$sql1))>0){
			$row  = $con->query($sql1)->fetch_assoc();
			$tips = $row['tipo'];
			$asu = $row['asunto'];
			$desc = $row['descripcion'];
			$fec = $row['fecha'];
			$est = $row['estado'];
			$continuar=1;
		}
		else
			$continuar = 0;	
}
if($continuar){
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Usuario - Sugerencias</title>
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
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">

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
            
            <div class="panel panel-blue">


              <?php 
                echo '
                
                <div class="panel-heading dark-overlay">Sugerencia N° '.$sid.' - <strong> '.$asu.'</strong>
                <form align="right" method="post" action="routers/estado_sugerencia.php">
                     <input type="hidden" name="sid" value="'.$sid.'">               
                    <input type="hidden" name="est" value="'.($est != 'Cerrado' ? 'Cerrado' : 'Abierto').'">
                    <button class="btn btn-lg btn-success" type="submit" name="action">'
                    .($est != 'Cerrado' ? 'Cerrado<i class="mdi-navigation-close"></i>' : 'ReAbrir<i class="mdi-navigation-check"></i>').'
                    </button>
                </form>

                </div>
                <div class="panel-body">
                    <strong>Id de la sugerencia: </strong> '.$sid.'
                    <br><strong>Estado de la sugerencia: </strong> '.$est.'
                    <br><strong>Tipo de sugerencia: </strong>'.$tips.'
                    <br><strong>Detalle: </strong>'.$desc.'
                </div>
              </div>

      <div class="panel panel-default chat">
          <div class="panel-body">
                ';


                echo '<ul id="issues-collection" class="collection">';
                $sql1 = mysqli_query($con, "SELECT * from sugerenciadetalle WHERE sugerencia = $sid;");
                while($row1 = mysqli_fetch_array($sql1)){
                  $sql2 = "SELECT * FROM usuario WHERE id = ".$row1['usuario'].";";
                  if(mysqli_num_rows(mysqli_query($con,$sql2))>0){
                    $row2  = $con->query($sql2)->fetch_assoc();
                    $nom = $row2['nombre'];
                    $role1 = $row2['tipo'];                   
                  }
                  echo '
                <ul>
              <li class="left clearfix"><span class="chat-img pull-left">
                <img src="'.$row2['foto'].'" alt="User Avatar" class="img-circle" width="60" height="60" />
                </span>
                <div class="chat-body clearfix">
                  <div class="header"><strong class="primary-font">'.$role1.' - '.$nom. '</strong> <small class="text-muted">'.$row1['fecha'].'</small></div>
                  <p>'.$row1['descripcion'].'.</p>
                </div>
              </li>
            </ul>';
                }
              if($est != 'Cerrado'){
                 echo '
              <form class="formValidate" method="post" action="routers/mensaje_sugerencia.php" class="col s12">  
                  <input type="hidden" name="tip" value="'.$tip.'">
                  <input type="hidden" name="sid" value="'.$sid.'">
                </div>
                <div class="panel-footer">
                  <div class="input-group">
                    <input name="sug" id="btn-input" type="text" class="form-control input-md" placeholder="Escribe tu respuesta aqui..." / required><span class="input-group-btn">
                      <button class="btn btn-primary btn-md" id="btn-chat" type="submit" name="action">Enviar la respuesta</button>
                  </span></div>
          </div>
        </div>
              </form>';}?>
            </div>
          </div>
        </div>                          
      </div>
    </div>
  </div>
</body>

 
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
    <script type="text/javascript" src="js/custom-script.js"></script>
</body>

</html>
<?php
	}
	else
	{
		if($_SESSION['adminc']==session_id())
		{
			header("location:ver_sugerencias.php?id=".$_GET['id']);		
		}
		else{
			header("location:login.php");
		}
	}
?>