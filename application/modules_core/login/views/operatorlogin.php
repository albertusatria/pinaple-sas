<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- <link rel="shortcut icon" href="img/favicon.png" type="image/png"> -->

  <title><?php echo $title;?></title>

  <link href="<?php echo base_url();?>bracket/css/style.default.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="<php echo base_url();>bracket/js/html5shiv.js"></script>
  <script src="<php echo base_url();>bracket/js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="signin">

<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
  
    <div class="signinpanel">
        
        <div class="row">
            
            <div class="col-md-7">
                
                <div class="signin-info">
                    <div class="logopanel">
                        <h1><span>[</span> Pinaple SAS <span>]</span></h1>
                    </div><!-- logopanel -->
                
                    <div class="mb20"></div>
                
                    <h5><strong>Registered for Budi Utama Yogyakarta</strong></h5>
                    <ul>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> Jl. Wijaya Kusuma No. 121 B Yogyakarta</li>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> 0274 xxx xxx</li>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> www.budiutama.com</li>
                    </ul>
                    <div class="mb20"></div>
                    <strong>Not a member? <a href="signup.html">Sign Up</a></strong>
                </div><!-- signin0-info -->
            
            </div><!-- col-sm-7 -->
            
            <div class="col-md-5">
                
                <form id="sasPanel" method="post" action="<?php echo base_url().$form_action?>">
                          <div>
                            <h5><?php echo $this->session->flashdata('message'); ?></h5>
                          </div>
                  
                    <h4 class="nomargin">Sign In</h4>
                    <p class="mt5 mb20">Login to access your account.</p>
					<div class="form-group">
                    	<input type="text" name="username" class="form-control uname" placeholder="Username" required/>
					</div>
					<div class="form-group">
                    	<input type="password" name="password" class="form-control pword" placeholder="Password" required/>
					</div>
                    <a href="#"><small>Forgot Your Password?</small></a>
                    <button class="btn btn-success btn-block">Sign In</button>
                    
                </form>
            </div><!-- col-sm-5 -->
            
        </div><!-- row -->
        
        <div class="signup-footer">
            <div class="pull-left">
                &copy; 2014. All Rights Reserved. Pinaple.
            </div>
            <div class="pull-right">
                Created By: <a href="http://themepixels.com/" target="_blank">ThemePixels</a>
            </div>
        </div>
        
    </div><!-- signin -->
  
</section>


<script src="<?php echo base_url();?>bracket/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/toggles.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/retina.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.cookies.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/custom.js"></script>

<script type="text/javascript">
jQuery("#sasPanel").validate({
	messages: {
		username : "Username required.",
		password : "Password required."
	},
    highlight: function(element) {
      jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function(element) {
      jQuery(element).closest('.form-group').removeClass('has-error');
    }
  });
</script>
</body>
</html>
