<link rel="stylesheet" href="<?php echo base_url('assets/neon/js/daterangepicker/daterangepicker-bs3.css')?>">

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
              <img src="../../../assets/lineGym/img/profile.jpg" alt="" class="img-circle" width="44" />
              <?php echo $this->session->userdata('NAME_PERSON')?>
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

    <h2>Nuevo Cliente</h2>

    <hr/>

    <form id="newClientForm" class="form-horizontal form-groups-bordered">

      <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label">Nombre (*):</label>
        <div class="col-sm-5">
          <input type="text" name="name_person" id="name_person" class="form-control" data-rule-required="true" data-rule-minlength="4" placeholder="Nombre completo">
        </div>
      </div>

      <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label">Genero (*):</label>
        <div class="col-sm-5">
          <select name="gender_person" id="gender_person" data-rule-required="true" class="form-control">
            <option value="">Seleccionar</option>
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label">Fecha de Nacimiento (*):</label>
        <div class="col-sm-5">
          <div class="input-group">
            <input type="text" name="birthdate_person" id="birthdate" class="form-control datepicker" data-format="yyyy-m-d">
            <div class="input-group-addon">
              <a href="#"><i class="entypo-calendar"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label">Correo Electronico (*):</label>
        <div class="col-sm-5">
          <input type="email" name="email_person"  id="email" class="form-control" data-rule-minlength="5" placeholder="@">
        </div>
      </div>

      <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label">Telefono (*):</label>
        <div class="col-sm-5">
          <input type="text" name="phone_person" id="phone_person" class="form-control" data-rule-required="true" data-rule-minlength="10" placeholder="Telefono">
        </div>
      </div>


      <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label">Direccion (*):</label>
        <div class="col-sm-5">
          <input type="text" name="address_person" id="address_person" class="form-control" data-rule-required="true" data-rule-minlength="6" placeholder="Direccion">
        </div>
      </div>

      <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label">Numero de cedula (*):</label>
        <div class="col-sm-5">
          <input type="text" name="identification" id="identification" class="form-control" data-rule-minlength="20" placeholder="#  de identificacion">
        </div>
      </div>

      <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label">Plan (*):</label>
        <div class="col-sm-5">
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

        <div class="form-group hidden" id="price">
          <label for="field-1" class="col-sm-3 control-label">Valor (*):</label>
          <div class="col-sm-5">
            <input type="number" name="price" id="input_price" class="form-control" data-rule-minlength="20" placeholder="$">
          </div>
        </div>

        <div class="form-group hidden" id="paid">
          <label for="field-1" class="col-sm-3 control-label">Pago (*):</label>
          <div class="col-sm-5">
            <input type="number" name="paid" id="input_paid" class="form-control" data-rule-minlength="20" placeholder="$">
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-5">
            <button type="submit" class="btn btn-primary" id="btnvalidation">Guardar</button>
          </div>
        </div>

      </form>

    </div>

    <script type="text/javascript">
    // this is the id of the form
    $("#newClientForm").submit(function(e) {
      var url = "<?php echo site_url('linegym/admin/newClient')?>"; // the script where you handle the form input.
      $.ajax({
        type: "POST",
        url: url,
        dataType: 'JSON',
        data: $("#newClientForm").serialize(), // serializes the form's elements.
        success: function(json){
          if(json.STATUS == true){
            toastr.success("Cliente agregado");
            $("#newClientForm").trigger('reset');
            document.getElementById("price").setAttribute("class" , 'form-group hidden');
            document.getElementById("paid").setAttribute("class" , 'form-group hidden');
            setTimeout(function(){
                window.location.href = "<?php echo site_url('linegym/admin/view_invoice/')?>"+json.ID_SUBSCRIPTION;
              }, 1000);
            }else {
              toastr.danger("Ocurrio un error al agregar el cliente, verifica la informacion.");
            }
          }
        });
        e.preventDefault(); // avoid to execute the actual submit of the form.
      });
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

      <script src="<?php echo base_url('assets/neon/js/bootstrap-datepicker.js')?>"></script>
    </div> <!--End page-container -->
