<!DOCTYPE html>
<html>
<head>
<title>IIUC hostel</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />


<!-- Bootstrap CSS -->
<link rel="stylesheet"
	href="<?php echo URL; ?>public/css/bootstrap.min.css" />
<!-- Optional theme -->
<link rel="stylesheet"
	href="<?php echo URL; ?>public/css/bootstrap-theme.min.css" />

<!--  jQuery and JavaScript -->
<!-- TODO: update jQuery -->
<script type="text/javascript"
	src="<?php echo URL;?>public/js/jquery-1.11.2.js"></script>
<script type="text/javascript"
	src="<?php echo URL;?>public/js/application.js"></script>
<!-- Bottstrap javascript -->
<script type="text/javascript"
	src="<?php echo URL;?>public/js/bootstrap.min.js"></script>
<!--  CSS  -->
<link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css" />
</head>
<body>

	<!-- Navigation -->
	<nav class="first-nav-bar navbar navbar-default" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo URL; ?>">
					<p>My Hostel</p>
				</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse"
				id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
            <?php if (Session::get("user_logged_in") == true) { ?>
                <li
						<?php if($this->checkForActiveController($filename, "home")) {echo "class='active'";} ?>>
						<a href="<?php echo URL;?>home">Home</a>
					</li>
					<li><a href="#">Message<span class="badge">42</span></a></li>
            <?php } ?>
                <li><a href="#">About</a></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown" role="button" aria-expanded="true">Contact</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Level: <?php echo Session::get('access_level');?></a>
							</li>
						</ul></li>
                <?php if (Session::get("user_logged_in") == false) { ?>
                <li
						<?php if($this->checkForActiveController($filename, "login")) {echo "class='active'";} ?>>
						<a href="<?php echo URL; ?>login">Login</a>
					</li>
                <?php
                } else {
                    if (Session::get('access_level') > 1) {
                        ?>
                <li
						<?php if($this->checkForActiveController($filename, "admin")) {echo "class='active'";} ?>>
						<a href="<?php echo URL; ?>admin">Admin Panel</a>
					</li>
                <?php } ?>
                <li><a href="<?php echo URL; ?>profile">Profile</a></li>
					<li><a href="<?php echo URL;?>login/logout">Logout</a></li>
                <?php }?>
            </ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>

	<!-- Second Navbar for the admin access only -->
<?php if(Session::get('access_level') > 1 && $this->checkForActiveController($filename, "admin")) { ?>
<nav class="navbar navbar-default second-nav-bar" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target="#bs-example-navbar-collapse-2">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<!-- brand is empty for the second navbar -->

			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse"
				id="bs-example-navbar-collapse-2">
				<ul class="nav navbar-nav navbar-right">
					<li
						class="dropdown <?php if($this->checkForActiveAction($filename, "addUser") || $this->checkForActiveAction($filename, 'viewUsers')) {echo "active";} ?>">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"
						role="button" aria-expanded="true">Users</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo URL;?>admin/adduser">Add user</a></li>
							<li><a href="<?php echo URL;?>admin/viewusers">View users</a></li>
						</ul>
					</li>
					<li
						class="dropdown <?php if($this->checkForActiveAction($filename, "addNotice")) {echo "active";} ?>">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"
						role="button" aria-expanded="true">Notices</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo URL;?>admin/addnotice">Add Notice</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>


<?php } ?>

