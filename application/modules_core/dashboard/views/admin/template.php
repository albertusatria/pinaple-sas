<?php echo $this->load->view('includes/header'); ?>

<?php echo $this->load->view($layout); ?>

<?php if (isset($javascript)) : ?>
	<?php echo $this->load->view($javascript); ?>
<?php endif; ?>

<?php echo $this->load->view('includes/footer'); ?>
