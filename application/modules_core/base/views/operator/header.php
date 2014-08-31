<!DOCTYPE html>
<!--[if lt IE 7]> <html class='ie lt-ie9 lt-ie8 lt-ie7 sidebar sidebar-discover'> <![endif]-->
<!--[if IE 7]>	<html class='ie lt-ie9 lt-ie8 sidebar sidebar-discover'> <![endif]-->
<!--[if IE 8]>	<html class='ie lt-ie9 sidebar sidebar-discover'> <![endif]-->
<!--[if gt IE 8]> <html class='ie sidebar sidebar-discover'> <![endif]-->
<!--[if !IE]><!-->
<html class='sidebar sidebar-discover'>
<!-- <![endif]-->

    <head>
        <title><?php echo $this->session->userdata('page_title'); ?></title>

        <!-- Meta -->
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0'>


        <!-- 
    	**********************************************************
    	In development, use the LESS files and the less.js compiler
    	instead of the minified CSS loaded by default.
    	**********************************************************
    	<link rel='stylesheet/less' href='../assets/less/admin/module.admin.stylesheet-complete.less' />
    	-->

        <!--[if lt IE 9]><link rel='stylesheet' href='../assets/components/library/bootstrap/css/bootstrap.min.css' /><![endif]-->
        <link rel='stylesheet' href='<?php echo base_url(); ?>resource/themes/masteroperator/css/admin/module.admin.stylesheet-complete.min.css' />

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
    		<script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
    		<script src='https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js'></script>
    	<![endif]-->


        <script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/library/jquery/jquery.min.js?v=v1.0.2&sv=v0.0.1"></script>
        <script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/library/jquery/jquery-migrate.min.js?v=v1.0.2&sv=v0.0.1"></script>
        <script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/library/modernizr/modernizr.js?v=v1.0.2&sv=v0.0.1"></script>
        <script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/plugins/less-js/less.min.js?v=v1.0.2&sv=v0.0.1"></script>
        <script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/modules/admin/charts/flot/assets/lib/excanvas.js?v=v1.0.2&sv=v0.0.1"></script>
        <script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/plugins/browser/ie/ie.prototype.polyfill.js?v=v1.0.2&sv=v0.0.1"></script>
        <script>
            if ( /*@cc_on!@*/ false && document.documentMode === 10) {
                document.documentElement.className += ' ie ie10';
            }
        </script>

    </head>

    <body class="">

        <!-- Main Container Fluid -->
        <div class="container-fluid menu-hidden">

            <!-- Sidebar Menu -->
            <div id="menu" class="hidden-print hidden-xs">

                <div id="sidebar-discover-wrapper">
                    <?php echo $menu; ?>
                </div>
            </div>
            <!-- // Sidebar Menu END -->

            <!-- Content -->
            <div id="content">

                <div class="navbar hidden-print main" role="navigation">
                    <div class="user-action user-action-btn-navbar pull-left border-right">
                        <button class="btn btn-sm btn-navbar btn-inverse btn-stroke"><i class="fa fa-bars fa-2x"></i>
                        </button>
                    </div>

                    <ul class="main pull-right">
                        <li class="dropdown notif notifications hidden-xs">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-bell-fill"></i> <span class="label label-danger">5</span></a>

                            <ul class="dropdown-menu chat media-list pull-right">
                                <li class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object thumb" src="../assets/images/people/100/15.jpg" alt="50x50" width="50" />
                                    </a>
                                    <div class="media-body">
                                        <span class="label label-default pull-right">5 min</span>
                                        <h5 class="media-heading">Adrian D.</h5>
                                        <p class="margin-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    </div>
                                </li>
                                <li class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object thumb" src="../assets/images/people/100/16.jpg" alt="50x50" width="50" />
                                    </a>
                                    <div class="media-body">
                                        <span class="label label-default pull-right">2 days</span>
                                        <h5 class="media-heading">Jane B.</h5>
                                        <p class="margin-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    </div>
                                </li>
                                <li class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object thumb" src="../assets/images/people/100/17.jpg" alt="50x50" width="50" />
                                    </a>
                                    <div class="media-body">
                                        <span class="label label-default pull-right">3 days</span>
                                        <h5 class="media-heading">Andrew M.</h5>
                                        <p class="margin-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    </div>
                                </li>
                                <li><a href="#" class="btn btn-primary"><i class="fa fa-list"></i> <span>View all messages</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown username">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url(); ?>resource/doc/user/thumb/<?php echo $user['user_picture']; ?>" class="img-circle" width="30" /><?php echo $user['user_full_name']; ?> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu pull-right">
                                <li><a href="my_account.html?lang=en" class="glyphicons user"><i></i> Account</a>
                                </li>
                                <li><a href="messages.html?lang=en" class="glyphicons envelope"><i></i>Messages</a>
                                </li>
                                <li><a href="index.html?lang=en" class="glyphicons settings"><i></i>Settings</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>login/operatorlogin/logout" class="glyphicons lock no-ajaxify"><i></i>Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- // END navbar -->
