<?php
  	require_once 'register-login-controller.php';
  ?>

 <!--                              navbar                       -->

<nav class="main-nav navbar fixed-top navbar navbar-expand-lg navbar-light">
  <a class= "navbar-brand" href="index.php">
    <img class="logo navbar-brand" src="images/logo1.png" alt="logo tu empresa">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarToggler">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class= "nav-link" href="index.php">Home </a>
      </li>
      <li class="nav-item active">
        <a class= "nav-link" href="#">Productos</a>
      </li>
      @if (Auth::user())
        <li class="nav-item">
          <a class= "nav-link" href="login.php">Ingresar</a>
        </li>
        <li class="nav-item">
          <a class= "nav-link" href="register.php">Registrarse</a>
        </li>
      @else
        <li class="nav-item">
          <a class= "nav-link" href="perfilusuario.php">Perfil</a>
        </li>
        <li class="nav-item">
          <a class= "nav-link" href="logout.php">Cerrar Sesión</a>
        </li>
      @endif

      <li class="nav-item">
        <a class= "nav-link" href="faqs.php">FAQ</a>
      </li>
    </ul>
  </div>
</nav>
