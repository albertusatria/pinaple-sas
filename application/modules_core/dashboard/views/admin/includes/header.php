<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url();?>bracket/images/favicon.png" type="image/png">

    <title><?php echo $this->session->userdata('page_title'); ?></title>

  <link href="<?php echo base_url();?>bracket/css/style.default.css" rel="stylesheet">
  <link href="<?php echo base_url();?>bracket/css/jquery.datatables.css" rel="stylesheet">
  
  <link rel="stylesheet" href="<?php echo base_url();?>bracket/css/bootstrap-fileupload.min.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>bracket/css/bootstrap-timepicker.min.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>bracket/css/jquery.tagsinput.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>bracket/css/colorpicker.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>bracket/css/dropzone.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>bracket/css/custom.css" />


  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="<php echo base_url();>js/html5shiv.js"></script>
  <script src="<php echo base_url();>js/respond.min.js"></script>
  <![endif]-->
</head>

<body style="overflow:visible;">

<!-- Preloader -->
<!-- <div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>
 -->

<section>


  <div class="leftpanel">
    
    <div class="logopanel">
        <h1><span>[</span> PinapleSAS <span>]</span></h1>
    </div><!-- logopanel -->
        
    <div class="leftpanelinner">    
        
        <!-- This is only visible to small devices -->
        <div class="visible-xs hidden-sm hidden-md hidden-lg">   
            <div class="media userlogged">
                <img alt="" src="<?php echo base_url();?>bracket/images/photos/loggedin.png" class="media-object">
                <div class="media-body">
                    <h4><?php echo $user['user_full_name']; ?></h4>
                    <span>"Life is so..."</span>
                </div>
            </div>
          
            <h5 class="sidebartitle actitle">Account</h5>
            <ul class="nav nav-pills nav-stacked nav-bracket mb30">
                <li>
                <?php if($this->session->userdata('session_operator')['portal_id']==2){ ?>
                  <a href="<?php echo base_url(); ?>login/operator/logout"><i class="icon-off"></i> Logout</a>
                <?php }else{ ?>
                  <a href="<?php echo base_url(); ?>login/admin/logout"><i class="icon-off"></i> Logout</a>
                <?php } ?>                
                </li>
            </ul>
        </div>
      
      <h5 class="sidebartitle">Navigation</h5>
        <?php echo $menu; ?>
      
    </div><!-- leftpanelinner -->

  </div><!-- leftpanel -->

  <div class="mainpanel">

       <div class="headerbar">
        
        <a class="menutoggle"><i class="fa fa-bars"></i></a>
          
        <div class="header-right">
          <ul class="headermenu">
            <li>
              <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url();?>bracket/images/photos/loggedin.png" alt="" />
                  <?php echo $user['user_full_name']; ?>

                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                    <li>
                    <?php if($this->session->userdata('session_operator')['portal_id']==2){ ?>
                      <a href="<?php echo base_url(); ?>login/operator/logout"><i class="icon-off"></i> Logout</a>
                    <?php }else{ ?>
                      <a href="<?php echo base_url(); ?>login/admin/logout"><i class="icon-off"></i> Logout</a>
                    <?php } ?>                
                    </li>
                </ul>
              </div>
            </li>
          </ul>
        </div><!-- header-right -->
        
      </div><!-- headerbar -->