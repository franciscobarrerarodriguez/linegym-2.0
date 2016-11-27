<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Line Gym</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/MaterialDesingLite/material.min.css')?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css')?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lineGym/css/lineGym.css')?>">
</head>
<body>

  <div class="layout-transparent mdl-layout mdl-js-layout">
    <header class="mdl-layout__header mdl-layout__header--transparent">
      <div class="mdl-layout__header-row">
        <!-- Title -->
        <span class="mdl-layout-title">Line Gym</span>
        <!-- Add spacer, to align navigation to the right -->
        <div class="mdl-layout-spacer"></div>
        <!-- Navigation -->
        <nav class='mdl-navigation'>
          <a class='mdl-navigation__link' href=''>Nosotros</a>
          <a class='mdl-navigation__link' href=''>FAQ</a>
          <a class='mdl-navigation__link' href=''>About</a>
        </nav>
      </div>
    </header>
    <div class="mdl-layout__drawer">
      <span class="mdl-layout-title">Line Gym</span>
      <hr>
      <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="<?php echo site_url('linegym/login')?>">Iniciar sesion</a>
        <a class="mdl-navigation__link" href="">Registrate</a>
      </nav>
    </div>

    <main class="mdl-layout__content">

      <div class="banner">
        <h1>LINE GYM</h1>
        <!-- Accent-colored raised button with ripple -->
        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
          <i class="material-icons">touch_app</i>Registro
        </button>
        <div class="info">
          <h3>¿Que es Line Gym?</h3>
          <p>Line Gym es la herramenta que le ayudara a tu Box a mejorar todas sus tareas.</p>
        </div>
      </div>

      <div class="mdl-grid">

        <div class="mdl-cell mdl-cell--4-col">

          <div class="card-square mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title mdl-card__pay mdl-card--expand">
              <h2 class="mdl-card__title-text">Pagos</h2>
            </div>
            <div class="mdl-card__supporting-text">
              Aqui encontraras una herramienta para que tus clientes tengan facilidades de pago.
            </div>
            <div class="mdl-card__actions mdl-card--border">
              <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                Ver Mas
              </a>
            </div>
          </div>

        </div>
        <div class="mdl-cell mdl-cell--4-col">

          <div class="card-square mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title mdl-card__planning mdl-card--expand">
              <h2 class="mdl-card__title-text">Planeacion</h2>
            </div>
            <div class="mdl-card__supporting-text">
              Tus coaches podran planear los Workout de cualquier fecha.
            </div>
            <div class="mdl-card__actions mdl-card--border">
              <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                Ver Mas
              </a>
            </div>
          </div>

        </div>
        <div class="mdl-cell mdl-cell--4-col">

          <div class="card-square mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title mdl-car__progress mdl-card--expand">
              <h2 class="mdl-card__title-text">Progreso</h2>
            </div>
            <div class="mdl-card__supporting-text">
              Tus clientes podran tener a la mano su historial de progreso.
            </div>
            <div class="mdl-card__actions mdl-card--border">
              <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                Ver Mas
              </a>
            </div>
          </div>

        </div>
      </div>

      <footer class="mdl-mini-footer">
        <div class="mdl-mini-footer__left-section">
          <div class="mdl-logo">Line Gym</div>
          <ul class="mdl-mini-footer__link-list">
            <li><a href="#">Help</a></li>
            <li><a href="#">Copyright (c) 2016. All Rights Reserved.</a></li>
          </ul>
        </div>
      </footer>
    </main>
  </div>

  <script src="https://code.jquery.com/jquery-1.11.3.min.js" integrity="sha256-7LkWEzqTdpEfELxcZZlS6wAx5Ff13zZ83lYO2/ujj7g=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/MaterialDesingLite/material.min.js')?>"></script>
</body>
</html>
