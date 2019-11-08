<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php">Bienvenido, <strong><?php echo $_SESSION["Usuario"];?></strong></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="le_buscar_libro.php">Buscar Libros</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="le_sugerencia.php">Enviar Solicitud</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="le_cambiar_contrasena.php">Cambiar Contraseña</a>
      </li>
    </ul>
    <span class="navbar-text">
      <a class="nav-link" href="logout.php">Cerrar Sesion</a>
    </span>
  </div>
</nav>
