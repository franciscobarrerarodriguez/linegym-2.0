<!-- Imported styles on this page -->
<link rel="stylesheet" href="<?php echo base_url('assets/neon/js/vertical-timeline/css/component.css')?>">

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
      // function addClassActive(){
      //   document.getElementById("id_plan").setAttribute("class" , 'active');
      // }
      // addClassActive();
      </script>

    </div>

  </div>

  <div class="main-content">

    <div class="row">

      <!-- Profile Info and Notifications -->
      <div class="col-md-6 col-sm-8 clearfix">

        <ul class="user-info pull-left pull-none-xsm">

          <!-- Profile Info -->
          <li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('assets/lineGym/img/')?><?php echo $this->session->PROFILE_PICTURE ?>" alt="" class="img-circle" width="44" />
              <?php echo $this->session->NAME_PERSON?>
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

    <hr />

    <h2>Historial de <?php echo $client->NAME_PERSON ?></h2>

    <hr/>


    <ul class="cbp_tmtimeline">

      <?php
      if ((isset($subscriptions)) && (!empty($subscriptions))){
        if($subscriptions[0]->STATUS == 'CLO'){
          ?>
          <!-- Nuevo pago -->
          <li>
            <time class="cbp_tmtime" datetime="2014-12-08T13:22"><span>Nuevo pago</span> <span><?php echo date('Y-m-d') ?></span></time>
            <div class="cbp_tmicon bg-primary">
              <i class="fa fa-plus"></i>
            </div>
            <div class="cbp_tmlabel">
              <h2><a href="javascript:;" onclick="jQuery('#modal-1').modal('show');">Registrar nuevo pago de <?php echo $client->NAME_PERSON?></a></h2>
            </div>
          </li>
          <!-- Fin nuevo pago -->
          <?php
        }
        foreach ($subscriptions as $sub){
          switch ($sub->STATUS) {
            case 'PEN':
            ?>
            <!-- Nuevo pago -->
            <li>
              <time class="cbp_tmtime" datetime="2014-12-08T13:22"><span>Pendiente</span> <span><?php echo $sub->DATE_SUBSCRIPTION ?></span></time>
              <div class="cbp_tmicon bg-secondary">
                <i class="fa fa-spinner fa-spin"></i>
              </div>
              <div class="cbp_tmlabel">
                <h2><a href="<?php echo site_url('linegym/admin/view_invoice/')?><?php echo $sub->ID_SUBSCRIPTION ?>">Factura No #<?php echo $sub->ID_SUBSCRIPTION ?></a></h2>
                <blockquote>
                  <h4><i class="fa fa-calendar"></i> Realizado el <?php echo $sub->DATE_SUBSCRIPTION ?></h4>
                  <h4><i class="fa fa-money"></i> Valor total <strong> $</strong><?php echo $sub->PRICE ?> pesos</h4>
                  <h4><i class="fa fa-bank"></i> Pago realizado <strong> $</strong><?php echo $sub->PAID ?> pesos</h4>
                  <h4><i class="fa fa-asterisk"></i> Saldo <strong> $</strong><?php echo ($sub->PRICE -$sub->PAID) ?> pesos</h4>
                  <button type="button" class="btn btn-blue" onclick="showAjaxModal(<?php echo $sub->ID_SUBSCRIPTION ?>)"><i class="fa fa-star-half-o"></i> Pagar</button>
                </blockquote>
              </div>
            </li>
            <!-- Fin deuda -->
            <?php
            break;
            case 'CLO':
            ?>
            <!-- Pagado -->
            <li>
              <time class="cbp_tmtime" datetime="2014-11-26T12:22"><span>Pago</span> <span><?php echo $sub->DATE_SUBSCRIPTION ?></span></time>
              <div class="cbp_tmicon bg-info">
                <i class="fa fa-bank"></i>
              </div>
              <div class="cbp_tmlabel">
                <h2><a href="<?php echo site_url('linegym/admin/view_invoice/')?><?php echo $sub->ID_SUBSCRIPTION ?>">Factura No #<?php echo $sub->ID_SUBSCRIPTION ?></a></h2>
                <blockquote>
                  <h4><i class="fa fa-calendar"></i> Pagado el <?php echo $sub->DATE_SUBSCRIPTION ?></h4>
                  <h4><i class="fa fa-money"></i> Valor total <strong> $</strong><?php echo $sub->PRICE ?> pesos</h4>
                  <h4><i class="fa fa-star"></i> Cerrado</h4>
                </blockquote>
              </div>
            </li>
            <!-- Fin pagado -->
            <?php
            break;
          }
        }
      }else{
        ?>
        <!-- Deuda -->
        <li>
          <time class="cbp_tmtime" datetime="2014-12-08T13:22"><span>Pago</span> <span>&nbsp;</span></time>
          <div class="cbp_tmicon bg-secondary">
            <i class="fa fa-close"></i>
          </div>
          <div class="cbp_tmlabel">
            <h2><a href="#">No se registran pagos.</a></h2>
          </div>
        </li>
        <!-- Fin deuda -->
        <?php
      }
      ?>
      <!-- Plan -->
      <li>
        <time class="cbp_tmtime" datetime="2014-11-26T12:22"><span>Plan</span> <span>&nbsp;</span></time>
        <div class="cbp_tmicon bg-warning">
          <i class="fa fa-paper-plane-o"></i>
        </div>
        <div class="cbp_tmlabel">
          <h2><a href="<?php echo site_url('linegym/admin/edit_plan/')?><?php echo $plan->ID_PLAN ?>"><?php echo $plan->NAME_PLAN ?></a><span>&nbsp;</span>&nbsp;<span></span><a href="#">&nbsp;</a></h2>
          <blockquote>
            <h4><i class="fa fa-sun-o"></i> <?php echo $plan->DAYS ?></h4>
            <h4><i class="fa fa-money"></i> <strong> $</strong><?php echo $plan->PRICE ?> pesos</h4>
            <h4><i class="fa fa-info"></i> <?php echo $plan->DETAILS ?></h4>
          </blockquote>
        </div>
      </li>
      <!-- End plan -->
      <!-- Person info -->
      <li>
        <time class="cbp_tmtime" datetime="2014-12-09T03:45"><span>Datos personales</span> <span>&nbsp;</span></time>
        <div class="cbp_tmicon bg-success">
          <i class="fa fa-user-circle"></i>
        </div>
        <div class="cbp_tmlabel">
          <h2><a href="#"><?php echo $client->NAME_PERSON ?></a> <span><?php echo $client->AGE_PERSON ?> años</span></h2>
          <blockquote>
            <h4><i class="fa fa-phone"></i> <?php echo $client->PHONE_PERSON ?></h4>
            <h4><i class="fa fa-id-card-o"></i> <?php echo $client->IDENTIFICATION ?></h4>
            <h4><i class="fa fa-envelope-open"></i> <?php echo $client->EMAIL_PERSON ?></h4>
            <h4><i class="fa fa-map-signs"></i> <?php echo $client->ADDRESS_PERSON ?></h4>
            <h4><i class="fa fa-birthday-cake"></i> <?php echo $client->BIRTHDATE_PERSON ?></h4>
          </blockquote>
        </div>
      </li>
      <!-- SignIn -->
      <li>
        <time class="cbp_tmtime" datetime="2014-12-09T18:30"><span class="">Ingreso</span> <span class="large">&nbsp;</span></time>

        <div class="cbp_tmicon" style="background: url(<?php echo base_url('assets/lineGym/img/')?><?php echo $client->PROFILE_PICTURE ?>); background-size: 40px 40px;">
        </div>

        <div class="cbp_tmlabel empty">
          <span><?php echo $client->JOINING_PERSON ?></span>
        </div>
      </li>
    </ul>

  </div><!-- End main Content -->
  <!-- Modal 1 (Basic)-->
  <div class="modal fade" id="modal-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Registrar pago</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="field-1" class="control-label">Precio total</label>
                <select name="plan" id="plan" data-rule-required="true" class="form-control" onchange="changePlan()">
                  <option value="SEL">Seleccionar</option>
                  <?php if ((isset($plans)) && (!empty($plans))){ ?>
                    <?php foreach ($plans as $plan){ ?>
                      <option value="<?php echo $plan->ID_PLAN?>"><?php echo $plan->NAME_PLAN?></option>
                      <?php }
                    } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group hidden" id="price">
                  <label for="field-2" class="control-label">Valor</label>
                  <input type="number" id="input_price" class="form-control" placeholder="$">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group hidden" id="paid">
                  <label for="field-3" class="control-label">Pago</label>
                  <input type="number" class="form-control" id="new-paid" placeholder="$">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-info" onclick="newSubscription()">Guardar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End modal 1 -->
    <!-- Modal 7 (Ajax Modal)-->
    <div class="modal fade" id="modal-7">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="fa fa-spinner fa-spin"></i> Pendiente Factura No #<a href="#"  id="invoice-number"></a></h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Precio total</label>
                  <input class="hidden" name="id_invoice" id="id_invoice">
                  <input type="text" class="form-control" name="subscription-price" id="subscription-price" placeholder="#" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-2" class="control-label">Deuda</label>
                  <input type="text" class="form-control" name="debt" id="debt" placeholder="deuda" disabled="">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="field-3" class="control-label">Pago</label>
                  <input type="number" class="form-control" name="subscription-paid" id="subscription-paid" placeholder="$">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-info" onclick="makePayment()">Pagar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal 7 (Ajax Modal) -->
    <script type="text/javascript">
    function showAjaxModal(ID_SUBSCRIPTION){
      $('#modal-7').modal('show', {backdrop: 'static'});
      var url = "<?php echo site_url('linegym/admin/ajax_getSubscription/')?>"+ID_SUBSCRIPTION; // the script where you handle the form input.
      $.ajax({
        type: "POST",
        url: url,
        dataType: 'JSON',
        success: function(json){
          document.getElementById("id_invoice").value = json.ID_SUBSCRIPTION;
          document.getElementById("invoice-number").innerHTML = json.ID_SUBSCRIPTION;
          document.getElementById("subscription-price").value = json.PRICE;
          document.getElementById("debt").value = (json.PRICE - json.PAID);
        }
      });
    }
    </script>

    <script type="text/javascript">
    function makePayment() {
      var data = {
        'PAID': document.getElementById('subscription-paid').value
      };
      var url = "<?php echo site_url('linegym/admin/ajaxUpdateSubscription/')?>"+document.getElementById("id_invoice").value;
      $.ajax({
        url: url,
        data: data,
        type: "POST",
        dataType: 'JSON',
        success: function(json) {
          if (json.STATUS == true) {
            $('#modal-7').modal('toggle');
            toastr.success("Suscripcion actualizada");
            setTimeout(function(){
              location.reload();
            }, 1000);
          }else{
            toastr.error("No se puede actualizar la suscripcion");
          }
        }
      });
    }
    </script>
    <script type="text/javascript">
    function changePlan() {
      if (document.getElementById('plan').value != "SEL") {
        $.ajax({
          url:       "<?php echo site_url('linegym/admin/ajax_getPlanById/')?>"+document.getElementById('plan').value, // the script where you handle the form input.
          type:      'GET',
          dataType:  'JSON',
          success:   function (json) {
            document.getElementById("price").setAttribute("class" , 'form-group visible');
            document.getElementById("input_price").value = json.PRICE;
            document.getElementById("paid").setAttribute("class" , 'form-group visible');
          }
        });
      }else {
        document.getElementById("price").setAttribute("class" , 'form-group hidden');
        document.getElementById("paid").setAttribute("class" , 'form-group hidden');
      }
    }
    </script>

    <script type="text/javascript">
    function newSubscription() {
      var data = {
        'ID_PLAN': document.getElementById('plan').value,
        'PRICE'  : document.getElementById('input_price').value,
        'PAID'   : document.getElementById('new-paid').value
      };
      var url = "<?php echo site_url('linegym/admin/newSubscription/')?><?php echo $client->ID_PERSON ?>";
      $.ajax({
        data: data,
        url : url,
        type: 'POST',
        dataType: 'JSON',
        success: function (json) {
          if (json.STATUS == true) {
            $('#modal-1').modal('toggle');
            toastr.success("Pago registrado");
            setTimeout(function(){
              window.location.href = "<?php echo site_url('linegym/admin/view_invoice/')?>"+json.ID_SUBSCRIPTION;
            }, 1000);
          }else{
            toastr.error("No se puede registar el pago");
          }
        }
      });
    }
    </script>


  </div> <!--End page-container -->
