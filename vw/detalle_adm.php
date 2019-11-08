<?php

include 'includes/conectar.php';
$uid = $_SESSION['uid'];

$result = mysqli_query($con, "SELECT * FROM usuario where id = $uid");
while($row = mysqli_fetch_array($result)){
$nom = $row['nombre'];	
$dir = $row['direccion'];
$cont = $row['contacto'];
$corr = $row['email'];
$usu = $row['usuario'];
$contra = $row['contrasena'];
$foto = $row['foto'];

}
	if($_SESSION['adminc']==session_id())
	{
		?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Detalles</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/strength.css">
  <script src="js/password_strength.js"></script>
  <script src="js/jquery-strength.js"></script>
  <link href="css/styles.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
</head>

<body>
<?php include('routers/navbar_adm.php');?>
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Modificar Datos</li>
      </ol>
    </div>
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Modificar Datos de Registro</h1>
      </div>
    </div>

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

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
          <div class="col-md-12">
          <div class="panel-body">
            <div class="col-md-6">
              <form class="formValidate" id="formValidate" method="post" action="routers/detalle_radm.php" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Usuario</label>
                  <input class="form-control" placeholder="Ingrese Usuario" name="usu" id="usu" type="text" value="<?php echo $usu;?>" data-error=".errorTxt1">
                  <div class="errorTxt1"></div>
                  <p>* 5 caracteres minimo, 10 maximo.</p>
                </div>
                <div class="form-group">
                  <label>Nombre</label>
                  <input class="form-control" placeholder="Ingrese Nombre" name="nom" id="nom" type="text" value="<?php echo $nom;?>">
                  <p>* 5 caracteres minimo, 15 maximo.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label>Direccion</label>
                  <input class="form-control" placeholder="Ingrese su direccion" name="dir" id="dir" value="<?php echo $dir;?>">
                  <p>* 5 caracteres minimo, 15 maximo.</p>                  
                </div>  
                <div class="form-group">
                  <label>Correo</label>
                  <input class="form-control" placeholder="Ingrese Nombre" name="corr" id="corr" type="email" value="<?php echo $corr;?>">
                  <p>* 5 caracteres minimo, 15 maximo.</p>
                </div>                  
            </div>

              <div class="col-md-5">
                <div class="form-group">
                    <label>Subir una foto de perfil</label>
                    <input type="file" name="foto" id="foto" accept="image/*" required>
                </div>
              </div>

              <div class="col-md-1">
                <div class="form-group">
                  <a href='#edit' class='btn btn-lg btn-primary' data-toggle='modal'><i class="fa fa-photo" aria-hidden="true"></i>
                    </a>                                
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <button class="btn btn-lg btn-primary col-md-12" type="submit" name="action">Actualizar Datos</button>
                </div>
              </div>

                <div class="col-md-6" hidden>
                <div class="form-group">
                  <button class="btn btn-lg btn-danger col-md-12" type="submit" name="action">Deshabilitar Cuenta</button>
                </div>
              </div>

              </form>
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
            <div class="col-md-6">
              <form class="formValidate" id="formValidate" method="post" action="routers/detalle_radmc.php">
                <div class="form-group">
                  <label>Ingrese su Contraseña Actual</label>

          <input type="hidden" class="form-control" name="contra" id="contra" type="password" value="<?php echo $contra;?>">

                  <input type="password" class="form-control" placeholder="Ingrese contraseña" name="contra2" id="contra2" type="password" required>
                </div>
                </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Ingrese su Nueva Contraseña</label>
                  <input type="password" class="form-control" placeholder="Repita la nueva contraseña" name="ncontra" id="ncontra" type="password" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <button class="btn btn-lg btn-primary col-md-12" type="submit" sname="action">Cambiar Contraseña</button>
                </div>
                </div>
              </form>
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

    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

              <?php include('routers/modal_ver_img.php'); ?>

    <script type="text/javascript" src="js/plugins/angular.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>
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