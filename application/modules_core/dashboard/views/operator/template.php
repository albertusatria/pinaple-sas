<?php $this->load->view('includes/header');?>
<?php $this->load->view('includes/sidemenu');?>

<div class="mainpanel"><!-- mainpanel -->
	<?php $this->load->view('includes/headerbar');?>
	<?php $this->load->view($main_content);?>
</div><!-- mainpanel -->

<?php $this->load->view('includes/footer');?>