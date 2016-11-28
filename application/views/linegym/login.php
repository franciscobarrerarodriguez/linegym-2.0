<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="<?php echo base_url('assets/lineGym/img/')?>favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?php echo base_url('assets/lineGym/img/')?>favicon.ico" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<title>LineGym</title>

	<!-- <link rel="stylesheet" href="<?php echo base_url('assets/neon/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css')?>"> -->
	<link rel="stylesheet" href="<?php echo base_url('assets/neon/css/font-icons/entypo/css/entypo.css')?>">
	<!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic"> -->
	<link rel="stylesheet" href="<?php echo base_url('assets/neon/css/bootstrap.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/neon/css/neon-core.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/neon/css/neon-theme.css')?>">
	<!-- <link rel="stylesheet" href="<?php echo base_url('assets/neon/css/custom.css')?>"> -->
	<!-- <link rel="stylesheet" href="<?php echo base_url('assets/neon/css/neon-forms.css')?>"> -->

	<script src="<?php echo base_url('assets/neon/js/jquery-1.11.0.min.js')?>"></script>
	<!--	<script>$.noConflict();</script>-->

	<!--[if lt IE 9]><script src="assets/neon/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body login-page login-form-fall" data-url="http://neon.dev">


	<!-- This is needed when you send requests via Ajax -->
	<script type="text/javascript">
	var baseurl = '';
	</script>

	<div class="login-container">

		<div class="login-header login-caret">

			<div class="login-content">

				<a href="#" class="logo">
					<h1 style="color:#ffffff">Line Gym</h1>
				</a>
				<!-- progress bar indicator -->
				<div class="login-progressbar-indicator">
					<h3>43%</h3>
					<span>logging in...</span>
				</div>
			</div>

		</div>

		<div class="login-progressbar">
			<div></div>
		</div>

		<div class="login-form">

			<div class="login-content">

				<div class="form-login-error">
					<h3>Invalid login</h3>
					<p>Enter <strong>demo</strong>/<strong>demo</strong> as login and password.</p>
				</div>

				<form id="start">

					<div class="form-group">

						<div class="input-group">
							<div class="input-group-addon">
								<i class="entypo-user"></i>
							</div>
							<input type="email" placeholder="Usuario" class="form-control" name="email" id="email" data-rule-required="true">
							<!--						<input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" />-->
						</div>

					</div>

					<div class="form-group">

						<div class="input-group">
							<div class="input-group-addon">
								<i class="entypo-key"></i>
							</div>
							<input type="password" name="password" id="password" class="form-control" data-rule-required="true" placeholder="Contraseña">
							<!--						<input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />-->
						</div>

					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block btn-login">
							<i class="entypo-login"></i>
							Ingresar
						</button>
					</div>
				</form>


				<div class="login-bottom-links">

					<a href="extra-forgot-password.html" class="link">Forgot your password?</a>

					<br />

				</div>

			</div>

		</div>

	</div>

	<script type="text/javascript">
	// this is the id of the form
	$("#start").submit(function(e) {
		var url = "<?php echo site_url('linegym/login/start')?>"; // the script where you handle the form input.
		$.ajax({
			type: "POST",
			url: url,
			dataType: 'JSON',
			data: $("#start").serialize(), // serializes the form's elements.
			success: function(json)
			{
				if(json.STATUS == true){
					window.location.href = "<?php echo site_url('welcome')?>";
				}else {
					location.reload();
				}
			}
		});
		e.preventDefault(); // avoid to execute the actual submit of the form.
	});
	</script>


	<!-- Bottom scripts (common) -->
	<!-- <script src="<?php echo base_url('assets/neon/js/gsap/main-gsap.js')?>"></script> -->
	<!-- <script src="<?php echo base_url('assets/neon/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js')?>"></script> -->
	<!-- <script src="<?php echo base_url('assets/neon/js/bootstrap.js')?>"></script> -->
	<!-- <script src="<?php echo base_url('assets/neon/js/joinable.js')?>"></script> -->
	<!-- <script src="<?php echo base_url('assets/neon/js/resizeable.js')?>"></script> -->
	<!-- <script src="<?php echo base_url('assets/neon/js/neon-api.js')?>"></script> -->
	<script src="<?php echo base_url('assets/neon/js/jquery.validate.min.js')?>"></script>
	<script src="<?php echo base_url('assets/neon/js/neon-login.js')?>"></script>


	<!-- JavaScripts initializations and stuff -->
	<!-- <script src="<?php echo base_url('assets/neon/js/neon-custom.js')?>"></script> -->


	<!-- Demo Settings -->
	<!-- <script src="<?php echo base_url('assets/neon/js/neon-demo.js')?>"></script> -->

</body>
</html>
