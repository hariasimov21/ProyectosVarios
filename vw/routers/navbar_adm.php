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
          <?php include('routers/iconos_adm.php');?>
          <li>
           <div class="all-button"><a href="ordenes_totales.php">
                  <em class="fa fa-inbox"></em><strong>Todas las ordenes</strong>
                </a></div>
              </li>
            </ul>
          </li>
        </ul>
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
        <div class="profile-usertitle-status"></span><?php echo $tip;?></div>
      </div>
      <div class="clear"></div>
    </div>
    <ul class="nav menu">
      <li class="<?php active('pagina_adm.php');?>"><a href="index.php"><em class="fa fa-cutlery">&nbsp;</em> Lista de Platos</a></li>
      <li class="<?php active('registrar_pro.php');?>"><a href="registrar_pro.php"><em class="fa fa-plus-square">&nbsp;</em> Agregar Plato</a></li>
      <li class="<?php active('registrar_cat.php');?>"><a href="registrar_cat.php"><em class="fa fa-plus-square">&nbsp;</em> Agregar Mesa</a></li>
      <li class="parent 
          <?php                   
            if(isset($_GET['est'])){
              $est = $_GET['est'];
              $est2 = str_replace(" ", "%20", $est);
              active('ordenes_totales.php?est='.$est2);
            };

            if(isset($_GET['id'])){
              $id = $_GET['id'];
              active('ordenes_totales.php?id='.$id);              
            };

            active('ordenes_totales.php');
          ?>">
       <a data-toggle="collapse" href="#sub-item-1">
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
      <li class="parent  <?php 
            if(isset($_GET['est'])){
              $est = $_GET['est'];
              $est2 = str_replace(" ", "%20", $est);
              active('sugerencias_totales.php?est='.$est2);
            };

            if(isset($_GET['id'])){
              $id = $_GET['id'];
              active('sugerencias_totales.php?id='.$id);  
              active('ver_sugerencias_adm.php?id='.$id);                            
            };

              active('sugerencias_totales.php');
            ?>">
        <a data-toggle="collapse" href="#sub-item-2">
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
      <li class="<?php active('usuarios.php');?>"><a href="usuarios.php"><em class="fa fa-user">&nbsp;</em> Lista de Usuarios</a></li>
      <li class="<?php active('reportes.php');?>"><a href="reportes.php"><em class="fa fa-bar-chart">&nbsp;</em>Generar Reportes</a></li>
      <li class="<?php active('detalle_adm.php');?>"><a href="detalle_adm.php"><em class="fa fa-id-badge">&nbsp;</em> Modificar Datos</a></li>      
      <li ><a href="routers/cerrar_sesion.php"><em class="fa fa-power-off">&nbsp;</em> Cerrar Sesion</a></li>
    </ul>
  </div>