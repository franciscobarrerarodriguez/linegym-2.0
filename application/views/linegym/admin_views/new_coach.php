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
        document.getElementById("menu_coach").setAttribute("class" , 'active');
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
              <img src="<?php echo base_url('assets/lineGym/img/') ?><?php echo $this->session->PROFILE_PICTURE ?>" alt="" class="img-circle" width="44" />
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

    <hr />

    <h2>Nuevo Coach</h2>

    <hr/>

    <form id="newCoachForm" class="form-horizontal form-groups-bordered">

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
        <div class="col-sm-offset-3 col-sm-5">
          <button type="submit" class="btn btn-primary" id="btnvalidation">Guardar</button>
        </div>
      </div>
    </form>
    <br />
    <!-- Footer -->
    <footer class="main"> &copy; 2016 <strong>Line Gym</strong></footer>
    <!-- End Footer -->
  </div>
</div> <!--End page-container -->
<script type="text/javascript">
// this is the id of the form
$("#newCoachForm").submit(function(e) {
  var url = "<?php echo site_url('linegym/admin/newCoach')?>"; // the script where you handle the form input.
  $.ajax({
    type: "POST",
    url: url,
    dataType: 'JSON',
    data: $("#newCoachForm").serialize(), // serializes the form's elements.
    success: function(json){
      if(json.STATUS == true){
        toastr.success("Coach agregado");
        $("#newCoachForm").trigger('reset');
      }else {
        toastr.danger("Ocurrio un error al agregar el coach, verifica la informacion.");
      }
    }
  });
  e.preventDefault(); // avoid to execute the actual submit of the form.
});
</script>

<script src="<?php echo base_url('assets/neon/js/bootstrap-datepicker.js')?>"></script>
