<?php 
function active($currect_page){
$url_array = explode('/', $_SERVER['REQUEST_URI']);
$url = end($url_array);
  if($currect_page == $url){
    echo 'active';
  }
}
?>

<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span></button>
          <a class="navbar-brand" href="#"><span><i class="fa fa-cutlery" aria-hidden="true"></i> <strong>Virtual</span>Waiter  </strong></a>
          <?php include('routers/iconos_usu.php');?>

      </div>
    </div>
  </nav>
  
  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
      <div class="profile-userpic">
        <img src="<?php echo $foto;?>" alt="">
      </div>
      <div class="profile-usertitle">
        <div class="profile-usertitle-name"><?php echo $nom;?></div>
        <div class="profile-usertitle-status"><span>
        <?php   

        $sql = mysqli_query($con, "SELECT * FROM usuario where id = $uid;");
        while($row = mysqli_fetch_array($sql)){
            $op = $row['estadocuenta'];
            if ($op == 0) {
              echo "Dinero $" .$din.".-";
            } else {
              echo "Sin Monedero<br><a href='mis_sugerencias.php'>Solicitar</a>";          
            };
        };

        ?>
        </span></div>
      </div>
      <div class="clear"></div>
    </div>
    <ul class="nav menu">
      <li class="<?php active('index.php'); active('ordenes_l.php'); active('confirmacion_orden.php');?>">
       <a href="index.php"><em class="fa fa-cutlery">&nbsp;</em> Relizar Orden</a></li>
      <li class="<?php active('mis_sugerencias.php');?>">
       <a href="mis_sugerencias.php"><em class="fa fa-question">&nbsp;</em> Relizar Sugerencia</a></li>
      <li class="parent 
        <?php                   
            if(isset($_GET['est'])){
              $est = $_GET['est'];
              $est2 = str_replace(" ", "%20", $est);
              active('ordenes.php?est='.$est2);
            };

            if(isset($_GET['id'])){
              $id = $_GET['id'];
              active('ordenes.php?id='.$id);              
            };

            active('ordenes.php');
          ?>">
       <a data-toggle="collapse" href="#sub-item-1">
      <em class="fa fa-navicon">&nbsp;</em> Ordenes <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
        </a>
        <ul class="children collapse" id="sub-item-1">
          <li><a href="ordenes.php">Lista de ordenes</a></li>
                <?php
                  $sql = mysqli_query($con, "SELECT DISTINCT estado FROM orden where usuario='$uid';");
                  while($row = mysqli_fetch_array($sql)){
                                    echo '<li><a href="ordenes.php?est='.$row['estado'].'">'.$row['estado'].'</a>
                                    </li>';
                  }
                  ?>
        </ul>
      </li>
      <li class="parent 
        <?php                   
            if(isset($_GET['est'])){
              $est = $_GET['est'];
              $est2 = str_replace(" ", "%20", $est);
              active('sugerencias.php?est='.$est2);
            };

            if(isset($_GET['id'])){
              $id = $_GET['id'];
              active('sugerencias.php?id='.$id);              
            };

            active('sugerencias.php');
          ?>">
            <a data-toggle="collapse" href="#sub-item-2">
        <em class="fa fa-navicon">&nbsp;</em> Sugerencias <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
        </a>
        <ul class="children collapse" id="sub-item-2">
        <li><a href="sugerencias.php">Lista de sugerencia</a></li>
                <?php
                  $sql = mysqli_query($con, "SELECT DISTINCT estado FROM sugerencia where usuario='$uid';");
                  while($row = mysqli_fetch_array($sql)){
                                    echo '<li><a href="sugerencias.php?est='.$row['estado'].'">'.$row['estado'].'</a>
                                    </li>';
                  }
                  ?>
        </ul>
      <li class="<?php active('detalle.php');?>"><a href="detalle.php"><em class="fa fa-id-badge">&nbsp;</em> Modificar Datos</a></li>      
      <li><a href="routers/cerrar_sesion.php"><em class="fa fa-power-off">&nbsp;</em> Cerrar Sesion</a></li>
    </ul>
  </div>