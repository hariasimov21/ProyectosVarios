<style> 
  .anyClass {
  height:80px;
  overflow-y: scroll;
}
</style>
<div class="scrollbar scrollbar-primary">
  <div class="force-overflow">
          <ul class="nav navbar-top-links navbar-right">
          <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
            <em class="fa fa-envelope"></em>
            <?php 
              $result = mysqli_query($con, "SELECT COUNT(id)
                FROM sugerencia WHERE usuario=$uid and estado='Abierto' ;");
              $row = mysqli_fetch_array($result);
              if ($row[0]!=0) {
              echo '<span class="label label-danger">'.$row[0].'
            </span>';
              }
            ?>
          </a>

            <ul class="dropdown-menu dropdown-messages ">
            <div class="anyClass">  
              <?php
              $result = mysqli_query($con, "SELECT * FROM sugerencia WHERE usuario=$uid AND estado='Abierto'");
              while($row = mysqli_fetch_array($result)){
              echo
              '<li>
                <div class="dropdown-messages-box"><a href="" class="pull-left">';

                    $result1 = mysqli_query($con, "SELECT * FROM usuario");
                    while($row1 = mysqli_fetch_array($result1)){
                        if ($row['usuario']==$row1['id']) {
                          echo '
                            <div class="message-body">
                              <img alt="image" class="img-circle" src="'.$row1['foto'].'" width="42" height="42">
                              <a href="sugerencias.php?id='.$row['id'].'"></a>';
                        };
                    };

                    echo
                    'Hay un ticket <strong>Abierto</strong> de tipo : <strong>'.$row['tipo'].'</strong></a>
                  <br /><small class="text-muted">'.$row['fecha'].'</small></div>
                </div>
              </li>';
              };
              ?>

            </div>
              <li class="divider"></li>
              <li>
                <div class="all-button"><a href="sugerencias_totales.php">
                  <em class="fa fa-inbox"></em> <strong>Todas las sugerencias</strong>
                </a></div>
              </li>
            </ul>
          </li>
          <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
            <em class="fa fa-cutlery"></em>
            <?php 
              $result = mysqli_query($con, "SELECT COUNT(id)
                FROM orden where usuario=$uid and revocar=0;");
              $row = mysqli_fetch_array($result);
              if ($row[0]!=0) {              
              echo '<span class="label label-danger">'.$row[0].'
            </span>';
              }
            ?>
          </a>

            <ul class="dropdown-menu dropdown-messages">
              <div class="anyClass">  

              <?php
              $result = mysqli_query($con, "SELECT * FROM orden WHERE usuario=$uid and revocar=0 ");
              while($row = mysqli_fetch_array($result)){
              echo
              '<li>
                <div class="dropdown-messages-box"><a href="" class="pull-left">';
  
                    $result1 = mysqli_query($con, "SELECT * FROM usuario");
                    while($row1 = mysqli_fetch_array($result1)){
                        if ($row['usuario']==$row1['id']) {                      
                          echo '
                            <div class="message-body">

                              <img alt="image" class="img-circle" src="'.$row1['foto'].'" width="42" height="42">
                              <a href="ordenes.php?id='.$row['id'].'">Hay una orden pendiente pagada con: <strong>'.$row['tipopago'].' </strong> y su estado es: <strong>'.$row['estado'].'</strong>';

                        };
                    };
                
                    echo
                    '<br /><small class="text-muted">'.$row['fecha'].'</small></div>
                </div>
              </li>';
              };
              ?>
              </div>
              <li class="divider"></li>
                <div class="all-button"><a href="ordenes.php">
                  <em class="fa fa-inbox"></em> <strong>Todas las ordenes</strong>
                </a></div>
              </li>
        </ul>


