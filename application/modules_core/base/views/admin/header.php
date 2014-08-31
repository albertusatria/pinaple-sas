<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title><?php echo $this->session->userdata('page_title'); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="Bluth Company">
		<link rel="shortcut icon" href="<?php echo base_url(); ?>resource/themes/masterbackend/ico/favicon.html">
		<link href="<?php echo base_url(); ?>resource/themes/masterbackend/css/bootstrap.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>resource/themes/masterbackend/css/theme.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>resource/themes/masterbackend/css/font-awesome.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>resource/themes/masterbackend/css/alertify.css" rel="stylesheet">
		<link rel="Favicon Icon" href="<?php echo base_url(); ?>resource/themes/masterbackend/ico/favicon.ico">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
	</head>

	<body>


	<body>
		<div id="wrap">
			<div class="navbar navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container-fluid">
						<div class="logo">
							<img src="<?php echo base_url(); ?>resource/themes/masterbackend/img/logo.png" alt="Realm Admin Template">
						</div>
						<a class="btn btn-navbar visible-phone" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
						<a class="btn btn-navbar slide_menu_left visible-tablet">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>

						<div class="top-menu visible-desktop">
							<!-- <ul class="pull-left">
								<li><a id="messages" data-notification="2" href="#"><i class="icon-envelope"></i> Messages</a>
								</li>
								<li><a id="notifications" data-notification="3" href="#"><i class="icon-globe"></i> Notifications</a>
								</li>
							</ul> -->
							<ul class="pull-right">
								<li><a href="<?php echo base_url(); ?>login/adminlogin/logout"><i class="icon-off"></i> Logout</a>
								</li>
							</ul>
						</div>

						<div class="top-menu visible-phone visible-tablet">
							<ul class="pull-right">
								<!-- <li><a title="link to View all Messages page, no popover in phone view or tablet" href="#"><i class="icon-envelope"></i></a>
								</li>
								<li><a title="link to View all Notifications page, no popover in phone view or tablet" href="#"><i class="icon-globe"></i></a>
								</li> -->
								<li><a href="<?php echo base_url(); ?>login/adminlogin/logout"><i class="icon-off"></i> Logout</a>
								</li>
							</ul>
						</div>

					</div>
				</div>
			</div>

			<div class="container-fluid">

				<!-- Side menu -->
				<div class="sidebar-nav nav-collapse collapse">
					<div class="user_side clearfix">
						<img src="<?php echo base_url(); ?>resource/doc/user/<?php echo $user['user_picture']; ?>" alt="<?php echo $user['user_full_name']; ?>">
						<h5><?php echo $user['user_full_name']; ?></h5>
						<a href="#"><i class="icon-cog"></i> Settings</a> 
					</div>
					<?php echo $menu; ?>
				</div>
				<!-- /Side menu -->
