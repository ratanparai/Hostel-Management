<!DOCTYPE html>
<html>
<head>
    <title>IIUC hostel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--  CSS  -->
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css" />
    <!-- Optional theme -->
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap-theme.min.css" />

    <!--  jQuery and JavaScript -->
    <!-- TODO: update jQuery -->
    <script type="text/javascript" src="<?php echo URL;?>public/js/jquery-1.11.2.js"></script>
    <script type="text/javascript" src="<?php echo URL;?>public/js/application.js"></script>
    <!-- Bottstrap javascript -->
    <script type="text/javascript" src="<?php echo URL;?>public/js/bootstrap.min.js"></script>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo URL; ?>">
                <p>My Hostel</p>
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
            <?php if (Session::get("user_logged_in") == true) { ?>
                <li <?php if($this->checkForActiveController($filename, "home")) {echo "class='active'";} ?>>
                    <a href="<?php echo URL;?>home">Home</a>
                </li>
                <li>
                    <a href="#">Message<span class="badge">42</span></a>
                </li>
            <?php } ?>
                <li>
                    <a href="#">About</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">Contact</a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                        <a href="#">Level: <?php echo Session::get('access_level');?></a>
                        </li>
                    </ul>
                </li>
                <?php if (Session::get("user_logged_in") == false) { ?>
                <li <?php if($this->checkForActiveController($filename, "login")) {echo "class='active'";} ?>>
                    <a href="<?php echo URL; ?>login">Login</a>
                </li>
                <?php } else {
                    if(Session::get('access_level') >= 1) {
                    ?>
                <li  <?php if($this->checkForActiveController($filename, "admin")) {echo "class='active'";} ?>>
                    <a href="<?php echo URL; ?>admin" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true" >Admin Panel</a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="<?php echo URL;?>admin/adduser">Users</a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
                <li>
                    <a href="<?php echo URL;?>login/logout">Logout</a>
                </li>
                <?php }?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>



