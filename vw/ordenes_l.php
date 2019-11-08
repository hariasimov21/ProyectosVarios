  <?php
include 'includes/conectar.php';
include 'includes/billetera.php'; 

$num=0;
foreach ($_POST as $key => $value){
    if($key == 'action' || $value == ''){
    }else{
      $num++;
    }
};

if ($num<=1) {
  header("location:index.php");    
};

$tot = 0;
	if($_SESSION['usuarioc']==session_id())
	{
$result = mysqli_query($con, "SELECT * FROM usuario where id = $uid");
while($row = mysqli_fetch_array($result)){
  $nom = $row['nombre'];	
  $dir = $row['direccion'];
  $cont = $row['contacto'];
  $ver = $row['verificado'];
}

		?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Usuario - Tipos de Pago</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/datepicker3.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  <link rel="stylesheet" href="css/tablas.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <script src="validar.js"></script>
  
</head>

<body>

<?php include('routers/navbar_usu.php');?>

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#">
          <em class="fa fa-home"></em>
        </a></li>
        <li >Realizar Pedido</li>
        <li class="active">Metodo de pago</li>
      </ol>
    </div>
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Seleccione su metodo de pago</h1>
      </div>
    </div>

<?php include('routers/alertas.php');?>
<div id="alerta"></div>

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
          <div class="col-md-12">
          <div class="panel-body">
          
          <form class="formValidate" id="formValidate" method="post" action="confirmacion_orden.php" novalidate="novalidate" name="formorden" onsubmit="return validarorden();">
            
  <?php 
    $nta =""; $cvv ="";
    $sql1 = mysqli_query($con, "SELECT * FROM billeteradetalle where billetera = $bid");
    while($row1 = mysqli_fetch_array($sql1)){
      $nta = $row1['numerotargeta'];
      $cvv = $row1['cvv'];
    };

 ?>


      <div class="col-md-6">
          <div class="form-group">
            <label class="">Metodo de Pago: </label>                
              <select class="form-control input-lg" id="tpago" name="tpago">
                <option value="Efectivo" selected>Efectivo</option>
                <option value="Billetera" <?php if(!$ver) echo 'disabled';?> >Billetera</option> 
              </select>
          </div>
        </div>

      <div class="col-md-6">
          <div class="form-group">
            <label class="">Mesa: </label>                
              <select class="form-control input-lg" name="mes" id="mes">
                <option value="1">No usar Mesa</option>
                <?php
                  $form34 = mysqli_query($con, "SELECT * FROM mesa WHERE NOT disponibilidad");
                  foreach ($form34 as $rot2) {
                    if ($rot2['id'] == 1) {
                        continue;
                    } else {
                      echo
                        '<option value="'.$rot2['id'].'">Mesa '.($rot2['id']-1).'</option>';
                      };  
                    }
                ?>
              </select>     
          </div>
        </div>

      <div class="col-md-6">
          <div class="form-group">
              <label for="cc" class="">Numero de Targeta :</label>
              <input class="form-control" name="cc" id="cc" type="text" data-error=".errorTxt2" disabled>
              <input name="cc1" id="cc1" type="text" value="<?php echo $nta; ?>" data-error=".errorTxt2" hidden>          
          </div>
        </div>

      <div class="col-md-6">
          <div class="form-group">
              <label for="cvv" class="">CVV :</label>               
              <input class="form-control" name="cvv" id="cvv" type="text" data-error=".errorTxt3" disabled>
              <input name="cvv1" id="cvv1" type="text" value="<?php echo $cvv; ?>" data-error=".errorTxt2" hidden>    
          </div>
        </div>

      <div class="col-md-6">
          <div class="form-group">
              <label for="cvv" class="">Direccion :</label>  
              <input class="form-control" name="dir" id="dir" type="text" value="<?php echo $dir;?>" data-error=".errorTxt3">
              <p>*Por defecto se muestra la direccion con la que te encuentras registrado</p>
          </div>
        </div>
  
        <input type="hidden" name="des" id="des" value="<?php echo $_POST['des'];?>">

     <div class="col-md-6">
          <div class="form-group">
              <label for="cvv" class="">Siguiente</label>  
              <button class="btn btn-lg btn-primary col-md-12" type="submit" name="action">Confirmar</button>  
          </div>
        </div>
   

            <?php
              foreach ($_POST as $key => $value){
              if($key == 'action' || $value == ''){
                continue;
              }
              echo '<input name="'.$key.'" type="hidden" value="'.$value.'">';
              }
            ?>

          </form>
    
          <?php
              echo '

          </div>
          </div>
          </div>
          </div>
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
            <label for="">Usuario :</label>
             <table class="table table-bordered">
               <tr class="bg-info" align="center">
                <td>
                  <label>Nombre</label>
                </td>
                <td>
                  <label>Contacto</label>
                </td>        
              </tr>
              <tr>
                <td>
                  '.$nom.'
                </td>
                <td>
                  '.$cont.'
                </td>
              </tr>
              </table>

            <label for="">Productos :</label>
             <table class="table table-bordered">
               <tr class="bg-info" align="center">
                <td>
                  <label>Producto</label>
                </td>
                <td>
                  <label>Unidades</label>
                </td>
                <td>
                  <label>Precio</label>
                </td>
              </tr>
              ';
    
        foreach ($_POST as $key => $value){
          if($value == ''){
            continue;
          }
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
              <td>
                  '.$pid.'/'.$inom.'
              </td>
              <td>
                  '.$value.'
              </td>
              <td>
                  <span>$'.$pre.'.-</span>
              </td>
            </tr>';
    
    $tot = $tot + $pre; }

    
    } 
    echo '
             <table class="table table-bordered">
            <tr>
              <td class="bg-info" align="center">
                <label>Total:</label>
              </td>
              <td class="bg-danger">
                <label>$'.$tot.'.-</label>
              </td>
            </tr>
            </table>';
    if(!empty($_POST['des'])){
    echo '
          <table class="table table-bordered">
            <tr>
              <td class="bg-info" align="center">
                <label>Acotacion</label>
              </td>
              <td>
                '.$_POST['des'].'
              </td>
            </tr>
          </table>';
    }
    ;?>

          </div>
          </div>
          </div>
          </div>
          </div>
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

    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="js/plugins/angular.min.js"></script>
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>	
	   <script type="text/javascript" src="js/plugins/formatter/jquery.formatter.min.js"> </script>   
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <script type="text/javascript" src="js/custom-script.js"></script>
	   
     <script type="text/javascript">
    $("#formValidate").validate({
        rules: {
            dir: {
                required: true,
                minlength: 5
            },
            cc: {
                required: true,
                minlength: 16,
            },
            cvv: {
                required: true,
                minlength: 3,
			},
		},
        messages: {
           dir:{
                required: "Enter a address",
                minlength: "Enter at least 5 characters"
            },	
           cc:{
                required: "Please provide card number",
                minlength: "Enter at least 16 digits",
            },	
           cvv:{
                required: "Please provide CVV number",
                minlength: "Enter at least 3 digits",		
            },				
		},
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     });
	  $('#cc').formatter({
          'pattern': '{{9999}}-{{9999}}-{{9999}}-{{9999}}',
          'persistent': true
      });
    $('#cc1').formatter({
          'pattern': '{{9999}}-{{9999}}-{{9999}}-{{9999}}',
          'persistent': true
      });
	  $('#cvv').formatter({
          'pattern': '{{9}}-{{9}}-{{9}}',
          'persistent': true
      });
    $('#cvv1').formatter({
          'pattern': '{{9}}-{{9}}-{{9}}',
          'persistent': true
      });
		$('#tpago').change(function() {
		if ($(this).val() === 'Efectivo') {
		  $("#cc").prop('disabled', true);
		  $("#cvv").prop('disabled', true);		  
		}
		if ($(this).val() === 'Billetera'){
		  $("#cc").prop('disabled', false);
		  $("#cvv").prop('disabled', false);	
		}
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
      header("location:pagina_adm.php");    
    }
    else{
      header("location:login.php");
    }
  }
?>