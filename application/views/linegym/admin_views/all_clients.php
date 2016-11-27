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
        document.getElementById("id_plan").setAttribute("class" , 'active');
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

    <hr>
    <div class="row">
      <div class="col-md-9 col-sm-7">
        <h2>Clientes</h2>
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

    <div id="clients">
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


    </div>

    <script type="text/javascript">
    function renderClients() {
      var url = "<?php echo site_url('linegym/admin/ajaxClient_list')?>";
      $.ajax({
        type: "GET",
        url: url,
        dataType: 'JSON',
        success: function (json) {
          var html = json.map(function (client, index) {
        return(`<!-- Single Member -->
          <div class="member-entry">
            <a href="" class="member-img">
              <img src="<?php echo base_url('assets/lineGym/img/')?>${client.PROFILE_PICTURE}" class="img-rounded" />
              <i class="entypo-forward"></i>
            </a>
            <div class="member-details">
              <h4>
                <a href="extra-timeline.html">${client.NAME_PERSON}</a>
                <i class="fa fa-times-circle"  onclick="deleteClient(${client.ID_PERSON})" style="cursor:pointer;"></i>
                <a href="<?php echo site_url('linegym/admin/edit_client/')?>${client.ID_PERSON}"><i class="fa fa-pencil"></i></a>
              </h4>
              <!-- Details with Icons -->
              <div class="row info-list">
                <div class="col-sm-4">
                  <i class="entypo-phone"></i>
                  <a href="#">${client.PHONE_PERSON}</a>
                </div>
                <div class="col-sm-4">
                  <i class="fa fa-id-card-o"></i>
                  <a href="#">${client.IDENTIFICATION}</a>
                </div>
                <div class="col-sm-4">
                  <i class="entypo-calendar"></i>
                  Desde <a href="#">${client.JOINING_PERSON}</a>
                </div>
                <div class="clear"></div>
                <div class="col-sm-4">
                  <i class="entypo-location"></i>
                  <a href="#">${client.ADDRESS_PERSON}</a>
                </div>
                <div class="col-sm-4">
                  <i class="entypo-mail"></i>
                  <a href="#">${client.EMAIL_PERSON}</a>
                </div>
                <div class="col-sm-4">
                  <i class="fa fa-birthday-cake"></i>
                  <a href="#">${client.BIRTHDATE_PERSON}</a>
                </div>
                <div class="col-sm-4">
                  <a href="<?php echo site_url('linegym/admin/record/')?>${client.ID_PERSON}" class="btn btn-green btn-icon icon-left"> Historial <i class="fa fa-folder-open"></i></a>
                </div>
              </div>
            </div>

          </div>
          `);
        }).join("");
        document.getElementById('clients').innerHTML = html;
        }
      });
    }
    renderClients();
    </script>

    <script type="text/javascript">
      function deleteClient(ID_PERSON) {
        var url = "<?php echo site_url('linegym/admin/ajaxDelete_client/')?>"+ID_PERSON;
        $.ajax({
          type: "POST",
          url: url,
          dataType: 'JSON',
          success: function(json) {
            if (json.STATUS == true) {
              toastr.success("Cliente borrado");
              renderClients();
            }else{
              toastr.danger("Ocurrio un error al borrar.");
            }
          }
        });
      }
    </script>

  </div> <!--End page-container -->