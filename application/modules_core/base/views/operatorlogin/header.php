<!DOCTYPE html>
<html lang="en">

	<head>
		<title><?php echo $this->session->userdata('page_title'); ?></title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">

		<link rel="stylesheet" href="<?php echo base_url(); ?>resource/themes/masteroperator/css/admin/module.admin.stylesheet-complete.min.css" />
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

	<body class="loginWrapper">
