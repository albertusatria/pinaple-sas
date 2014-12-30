<link href="<?php echo base_url();?>bracket/css/dataTables.bootstrap3.css" rel="stylesheet">
<link href="<?php echo base_url();?>bracket/css/custom.manage.student.css" rel="stylesheet">

<script src="<?php echo base_url();?>bracket/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/toggles.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.cookies.js"></script>

<script src="<?php echo base_url();?>bracket/js/jquery-ui-1.10.3.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.mask.min.js"></script>

<script src="<?php echo base_url()?>bracket/js/jquery.datatables.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/chosen.jquery.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/bootstrap-wizard.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/dropzone.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/custom.js"></script>

<script src="<?php echo base_url();?>bracket/js/management/student.management.js"></script>
<script type="text/javascript">
        CI_ROOT = "<?=base_url() ?>";
</script>

<script type="text/javascript">
// General Setting
jQuery(document).ready(function() {
	//Management.init();
	 jQuery('table').on('click', '.filter-submit', function(){
    	var detable = jQuery(this).closest('table');
	    var nis = jQuery('input[name="nis_student"]').val();
		jQuery('#ajax-loader').show(); 
		detable.find('tbody tr').remove();

		console.log(detable.find('thead input.nis_student').val());
		console.log(detable.find('thead input.name_student').val());
		console.log(detable.find('thead select.unit_student').val());
		console.log(detable.find('thead input.current_level_student').val());
		console.log(detable.find('thead select.registration_type_student').val());
		console.log(detable.find('thead select.reg_status_student').val());
		console.log(jQuery('.table-container').find('select.opti-schoolyear').val());

		jQuery.ajax({
	    	type: "POST",
	    	url: CI_ROOT+"report/student_registrations/get_students_list",
	    	data: {
	    		'nis': detable.find('thead input.nis_student').val(),
	    		'full_name': detable.find('thead input.name_student').val(),
	    		'unit_name': detable.find('thead select.unit_student').val(),
	    		'current_level': detable.find('thead input.current_level_student').val(),
	    		'registration_type': detable.find('thead select.registration_type_student').val(),
	    		'reg_status': detable.find('thead select.reg_status_student').val(),
	    		'school_year_id': jQuery('.table-container').find('select.opti-schoolyear').val()
	    	},
	     	success: function(data)
	     	{
	     		if (data.length > 0)
			    {
					var no; var nis; var full_name; var unit_name; var current_level; var registration_type; var reg_status;
		           	for (index = 0; index < data.length; ++index) {
		                no = index+1;
		                nis = data[index]['nis'];
		                full_name = data[index]['full_name'];
		                unit_name = data[index]['unit_name'];
		                current_level = data[index]['current_level'];
		                registration_type = data[index]['registration_type'];
		                reg_status = data[index]['reg_status'];

		                detable.find('tbody:first').append(
						'<tr>'+
							'<td>'+no+'</td>'+
							'<td class="td-nis">'+nis+'</td>'+
							'<td class="td-full_name">'+full_name+'</td>'+
							'<td class="td-unit_name">'+unit_name+'</td>'+
							'<td class="td-current_level">'+current_level+'</td>'+
							'<td class="td-status">'+registration_type+'</td>'+
							'<td class="td-status">'+reg_status+'</td>'+
							'<td></td>'+
						'</tr>'
						);

		            }    
				}
				else 
				{
				 	//bila tidak ketemu
				 	console.log('tidak ditemukan');
				}			
				setTimeout(function() {
						jQuery('#ajax-loader').hide();    
				}, 1000); // <-- time in milliseconds
			},
		    error: function (data)
		    {
		    	console.log('terjadi error');
		    	console.log(data);
		    }
		});  	
		return false;
	});
});

function stopPropagation(evt) {
	if (evt.stopPropagation !== undefined) {
		evt.stopPropagation();
	} else {
		evt.cancelBubble = true;
	}
}
</script>