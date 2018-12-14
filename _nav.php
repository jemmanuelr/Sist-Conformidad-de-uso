<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="index.php"><img src="img/SiRCcuV1.png" width="110px" /></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="consulta.php">Consulta</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"> Empresa </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="modificacion.php"> Modificación</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>Registrar</strong></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="registropago.php">Pagos</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="registro.php">Empresas</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>Emitir </strong></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Comprobante de Pago</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="consultacomf.php">Conformidad de Uso</a>
        </div>
      </li>
    </ul>
  </div>
<div>
  	<li class="nav-item dropdown" style="list-style: none;color: #ffffff;"> Bienvenido <strong><?php echo $row['nombre_user']." (". $row['user'].")</strong>"; ?><br>
		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuario </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Perfil Usuario</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Cerrar sesión</a>
        </div>
    </li>
</div>
</nav>
