<ul id="main-menu" class="main-menu">
				<!-- add class "multiple-expanded" to allow multiple submenus to open -->
				<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
        <li id="menu_home">
          <a href="<?php echo site_url('linegym/admin')?>">
            <i class="entypo-home"></i>
            <span class="title">Home</span>
          </a>
        </li>
				<li id="menu_plan">
					<a href="#">
						<i class="entypo-quote"></i>
						<span class="title">Planes</span>
					</a>
					<ul>
						<li id="menu_new_plan">
							<a href="<?php echo site_url('linegym/admin/view_new_plan')?>">
								<span class="title"><i class="entypo-plus"></i> Nuevo</span>
							</a>
						</li>
						<li id="menu_all_plans">
							<a href="<?php echo site_url('linegym/admin/view_all_plans')?>">
								<span class="title"><i class="entypo-list"></i> Todos</span>
							</a>
						</li>
					</ul>
				</li>
        <li id="menu_client">
					<a href="#">
						<i class="entypo-user-add"></i>
						<span class="title">Clientes</span>
					</a>
					<ul>
						<li id="menu_new_client">
							<a href="<?php echo site_url('linegym/admin/view_new_client')?>">
								<span class="title"><i class="entypo-plus"></i> Nuevo</span>
							</a>
						</li>
						<li id="menu_all_clients">
							<a href="<?php echo site_url('linegym/admin/view_all_clients')?>">
								<span class="title"><i class="entypo-list"></i> Todos</span>
							</a>
						</li>
					</ul>
				</li>
        <li id="menu_coach">
					<a href="#">
						<i class="fa fa-binoculars"></i>
						<span class="title">Coaches</span>
					</a>
					<ul>
						<li id="menu_new_coach">
							<a href="<?php echo site_url('linegym/admin/view_new_coach')?>">
								<span class="title"><i class="entypo-plus"></i> Nuevo</span>
							</a>
						</li>
						<li id="menu_all_coaches">
							<a href="<?php echo site_url('linegym/admin/view_all_coaches')?>">
								<span class="title"><i class="entypo-list"></i> Todos</span>
							</a>
						</li>
					</ul>
				</li>
        <li id="menu_logout">
          <a href="<?php echo site_url('welcome/logout')?>">
            <i class="fa fa-sign-out"></i>
            <span class="title">Cerrar sesion</span>
          </a>
        </li>
			</ul>



<!-- <ul id="main-menu" class="">




  <li id="id_clients"><a href=""><i class="entypo-users"></i><span>Clientes</span></a>
    <ul>
      <li id='id_new_client'><a href="new_entry.php"><i class="entypo-user-add"></i><span>Nuevo cliente</span></a></li>
      <li class="" id='all_clients'><a href="view_mem.php"><i class="entypo-list"></i><span>Todos</span></a></li>
    </ul>
  </li>

  <li id="id_coaches"><a href=""><i class="entypo-flow-tree"></i><span>Coaches</span></a>
    <ul>
      <li id='id_new_coach'><a href="new_coach.php"><i class="entypo-user-add"></i><span>Nuevo coach</span></a></li>
      <li class="" id='all_coaches'><a href="all_coaches.php"><i class="entypo-list"></i><span>Todos</span></a></li>
    </ul>
  </li> -->

  <!--<li id="id_payments"><a href="payments.php"><i class="entypo-credit-card"></i><span>Pagos</span></a></li>


  <li id="health_status"><a href="new_health_status.php"><i class="entypo-user-add"></i><span>Estado de Salud</span></a></li>



  <li class="hidden"><a href="new_plan.php"><i class="entypo-box"></i><span>Visión General</span></a>

    <ul>
      <li class=""  id="id_members_month">
        <a href="over_members_month.php"><span>Miembros por mes</span></a>
      </li>

      <li id="id_members_year">
        <a href="over_members_year.php"><span>Miembros por Año</span></a>
      </li>

      <li id="id_income_month">
        <a href="revenue_month.php"><span>Ingresos por mes</span></a>
      </li>

    </ul>

    <li id="id_alerts"><a href="new_plan.php"><i class="entypo-alert"></i><span>Alertas</span></a>

      <ul>
        <li class="" id='id_pending_payments'>
          <a href="unpaid.php"><span>Miembros Pendiente de Pago</span></a>
        </li>

        <li id="id_terms">
          <a href="sub_end.php"><span>Termino de Membresia</span></a>
        </li>

      </ul>

    </li>-->

    <!-- <li id="id_profile"><a href="more-userprofile.php"><i class="entypo-folder"></i><span>Perfil</span></a></li>

    <li id="id_logout"><a href="logout.php"><i class="entypo-logout"></i><span>Cerrar Sesión</span></a></li>

  </ul> -->
