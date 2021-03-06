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
        document.getElementById("menu_plan").setAttribute("class" , 'active');
      }
      addClassActive();
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

    <hr>
    <div class="row">
      <div class="col-md-9 col-sm-7">
        <h2>Planes</h2>
      </div>

      <div class="col-md-3 col-sm-5">

        <form method="get" role="form" class="search-form-full">

          <div class="form-group">
            <input type="text" class="form-control" name="s" id="search-input" placeholder="Search..." />
            <i class="entypo-search"></i>
          </div>

        </form>

      </div>
    </div>
    <hr>

    <div id="plans">
    </div>

    <!-- Pager for search results -->
    <div class="row">
      <div class="col-md-12">
        <ul class="pager">
          <li><a href="#"><i class="entypo-left-thin"></i> Previous</a></li>
          <li><a href="#">Next <i class="entypo-right-thin"></i></a></li>
        </ul>
      </div>
    </div>

    <!-- Footer -->
    <footer class="main"> &copy; 2016 <strong>Line Gym</strong></footer>
    <!-- End Footer -->
  </div>
</div> <!--End page-container -->
<script type="text/javascript">
function renderPlans() {
  var url = "<?php echo site_url('linegym/admin/ajaxPlan_list')?>";
  $.ajax({
    type: "GET",
    url: url,
    dataType: 'JSON',
    success: function (json) {
      var html = json.map(function (plan, index) {
        return(`<!-- Single Member -->
          <div class="member-entry">
          <div class="member-details">
          <h4>
          <a href="#">${plan.NAME_PLAN}</a>
          <i class="fa fa-times-circle"  onclick="deletePlan(${plan.ID_PLAN})" style="cursor:pointer;"></i>
          <a href="<?php echo site_url('linegym/admin/edit_plan/')?>${plan.ID_PLAN}"><i class="fa fa-pencil"></i></a>
          </h4>

          <!-- Details with Icons -->
          <div class="row info-list">
          <div class="col-sm-4">
          <i class="entypo-calendar"></i>
          Creado <a href="#">${plan.JOINING_PLAN}</a>
          </div>
          <div class="col-sm-4">
          <i class="fa fa-money"></i>
          <a href="#">${plan.PRICE }</a> pesos
          </div>
          <div class="col-sm-4">
          <i class="fa fa-clock-o"></i>
          <a href="#">${plan.DAYS}</a> dias de duracion
          </div>
          </div>
          <div class="row info-list">
          <div class="col-sm-4">
          <i class="fa fa-info"></i>
          <a href="#">${plan.DETAILS}</a>
          </div>
          </div>
          </div>
          </div>`);
        }).join("");
        document.getElementById('plans').innerHTML = html;
      }
    });
  }
  renderPlans();
  </script>

  <script type="text/javascript">
  function deletePlan(ID_PLAN) {
    var url = "<?php echo site_url('linegym/admin/ajaxDelete_plan/')?>"+ID_PLAN;
    $.ajax({
      type: "POST",
      url: url,
      dataType: 'JSON',
      success: function(json) {
        if (json.STATUS == true) {
          toastr.success("Plan borrado");
          setTimeout(function () {
            location.reload();
          },300);
        }else{
          toastr.danger("Ocurrio un error al borrar.");
        }
      }
    });
  }
  </script>
