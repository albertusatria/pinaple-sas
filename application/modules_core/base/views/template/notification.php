	<?php $message = $this->session->flashdata('message'); ?>
	<?php if (!empty($message)) : ?>
		<script type="text/javascript">
			$(function() {
				$.gritter.add({
					title: 'Notification',
					text: '<?php echo trim($message); ?>',
					sticky: false,
					time: 5000,
					class_name: 'succes-notification'
				})
			})
		</script>
	<?php endif ; ?>
