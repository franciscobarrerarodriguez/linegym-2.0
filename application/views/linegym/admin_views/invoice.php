<div class="page-container sidebar-collapsed"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

  <div class="sidebar-menu">

    <div class="sidebar-menu-inner">

      <header class="logo-env">

        <!-- logo -->
        <div class="logo">
          <a href="#" style="color:#ffffff">
            <h3 style="color:#ffffff">LineGym</h3>
          </a>
        </div>

        <!-- logo collapse icon -->
        <div class="sidebar-collapse">
          <a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
            <i class="entypo-menu"></i>
          </a>
        </div>


        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
        <div class="sidebar-mobile-menu visible-xs">
          <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
            <i class="entypo-menu"></i>
          </a>
        </div>

      </header>

      <?php	$this->load->view('linegym/admin_views/admin_nav'); ?>
      <script>
      function addClassActive(){
        document.getElementById("menu_client").setAttribute("class" , 'active');
      }
      addClassActive();
      </script>

    </div>

  </div>

  <div class="main-content">

    <div class="row hidden-print">

      <!-- Profile Info and Notifications -->
      <div class="col-md-6 col-sm-8 clearfix">

        <ul class="user-info pull-left pull-none-xsm">

          <!-- Profile Info -->
          <li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('assets/lineGym/img/')?><?php echo $this->session->PROFILE_PICTURE?>" alt="" class="img-circle" width="44" />
              <?php echo $this->session->NAME_PERSON ?>
            </a>

            <ul class="dropdown-menu">

              <!-- Reverse Caret -->
              <li class="caret"></li>

              <!-- Profile sub-links -->
              <li>
                <a href="extra-timeline.html">
                  <i class="entypo-user"></i>
                  Edit Profile
                </a>
              </li>

              <li>
                <a href="mailbox.html">
                  <i class="entypo-mail"></i>
                  Inbox
                </a>
              </li>

              <li>
                <a href="extra-calendar.html">
                  <i class="entypo-calendar"></i>
                  Calendar
                </a>
              </li>

              <li>
                <a href="#">
                  <i class="entypo-clipboard"></i>
                  Tasks
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </div>


      <!-- Raw Links -->
      <div class="col-md-6 col-sm-4 clearfix hidden-xs">

        <ul class="list-inline links-list pull-right">
          <li>
            <a href="<?php echo site_url('welcome/logout')?>">
              Cerrar Sesión<i class="entypo-logout right"></i>
            </a>
          </li>
        </ul>

      </div>

    </div>

    <hr class="hidden-print">
    <h2 class="hidden-print">Factura</h2>
    <hr>

    <!-- invoice start -->
    <br class="hidden-print" />

    <div class="invoice">

      <div class="row">

        <div class="col-sm-6 invoice-left">
          <a href="#">
            <img src="<?php echo base_url('assets/lineGym/img/')?><?php echo $box->IMAGE_BOX?>" width="220"/>
          </a>
        </div>

        <div class="col-sm-6 invoice-right">
          <h3>FACTURA NO. #<?php echo $subscription->ID_SUBSCRIPTION ?></h3>
          <span><?php echo $subscription->DATE_SUBSCRIPTION ?></span>
        </div>

      </div>


      <hr class="margin" />


      <div class="row">

        <div class="col-sm-3 invoice-left">
          <h4>Cliente</h4>
          <i class="fa fa-user"></i> <?php echo $client->NAME_PERSON ?>
          <br />
          <i class="fa fa-envelope"></i> <?php echo $client->EMAIL_PERSON ?>
          <br />
          <i class="fa fa-id-card-o"></i> <?php echo $client->IDENTIFICATION ?>
        </div>

        <div class="col-sm-3 invoice-left">
          <h4>&nbsp;</h4>
          <i class="fa fa-phone"></i> <?php echo $client->PHONE_PERSON ?>
          <br />
          <i class="fa fa-map-signs"></i> <?php echo $client->ADDRESS_PERSON ?>
          <br />
        </div>

        <div class="col-md-6 invoice-right">
          <img src="<?php echo base_url('assets/lineGym/img/')?><?php echo $this->session->PROFILE_PICTURE?>" alt="" class="img-circle" width="44" /> <?php echo $this->session->NAME_PERSON ?>
          <br><br>
          <strong><?php echo $box->NAME_BOX ?></strong>
          <br>
          <strong>NIT:</strong> <?php echo $box->NIT_BOX ?>
          <br>
          <strong><?php echo $box->EMAIL_BOX ?></strong>
          <br>
          <strong><?php echo $box->ADDRESS_BOX ?></strong>
          <br>
          <strong><i class="fa fa-phone"></i> <?php echo $box->PHONE_BOX ?></strong>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-3 invoice-left">
          <h4>Detalles de pago</h4>
          <strong>Valor:</strong> <?php echo $subscription->PRICE ?> pesos
        </div>
      </div>

      <div class="margin"></div>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th>Plan</th>
            <th width="40%">Detalles</th>
            <th>Duracion</th>
            <th>Precio</th>
            <th>Pago</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td class="text-center">1</td>
            <td><?php echo $plan->NAME_PLAN ?></td>
            <td><?php echo $plan->DETAILS ?></td>
            <td><?php echo $plan->DAYS ?> dias</td>
            <td class="text-right"><?php echo $plan->PRICE ?></td>
            <td class="text-right"><strong><?php echo $subscription->PAID ?></strong></td>
          </tr>
        </tbody>
      </table>

      <div class="margin"></div>

      <div class="row">

        <div class="col-sm-6">

          <div class="invoice-left">
            Telefono: <?php echo $this->session->PHONE_PERSON ?>
            <br />
            Nombre: <?php echo $this->session->NAME_PERSON ?>
            <br />
            Email: <?php echo $this->session->EMAIL_PERSON ?>
          </div>

          <br>

        </div>

        <div class="col-sm-6">

          <div class="invoice-right">

            <ul class="list-unstyled">
              <li>
                Saldo:
                <strong><?php echo $plan->PRICE - $subscription->PAID ?></strong> pesos
              </li>
              <li>
                Total:
                <strong><?php echo $subscription->PRICE ?></strong> pesos
              </li>
            </ul>

            <br />

            <a href="javascript:window.print();" class="btn btn-primary btn-icon icon-left hidden-print">
              Imprimir factura
              <i class="entypo-doc-text"></i>
            </a>

            &nbsp;

            <!-- Enviar por correo. -->
            <!-- <a href="mailbox-compose.html" class="btn btn-success btn-icon icon-left hidden-print">
            Enviar
            <i class="entypo-mail"></i>
          </a> -->
        </div>

      </div>

    </div>

    <hr class="visible-print">

    <div class="row visible-print">
    </aside><center><br><a href="#"><strong>Line Gym</strong></center>
    </aside><center><br><a href="#">Factura generada por Line Gym, herramienta para la gestion de gimnasios.</center>
    </aside><center><br><a href="#"><strong>Line Gym (linegym@gmail.com)</strong></center>
    </div>

  </div>
  <!-- invoice end -->

</div>

</div> <!--End page-container -->
