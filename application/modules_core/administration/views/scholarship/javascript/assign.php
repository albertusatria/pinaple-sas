<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>bracket/css/assign.scholarship.css" />

<script src="<?php echo base_url();?>bracket/js/jquery.formatCurrency-1.4.0.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.formatCurrency.id-ID.js"></script>
<script src="<?php echo base_url()?>bracket/js/autoNumeric.js"></script>

<script type="text/javascript">
// Assign Scholarship value
jQuery(document).ready(function() {

	jQuery('.next-assign').on('click',function(){
		var scholarship = jQuery('.scholarship-value').val();
		jQuery('.value-of-scholarsip .fa-edit').show();
		
		jQuery('.change-value').attr('value',scholarship);
		jQuery('.change-value').attr('onclick','changeScholarship(this)');
		jQuery('.scholarship-value').attr('disabled', true);
		
		jQuery('.modal-body').append(
		'<br/>'+
		'<div class="assign-scholarships">'+
			'<div class="row">'+
				'<div class="col-md-12">'+
					'<div class="form-group">'+
						'<h4 class="col-md-6 label-assignment">Scholarship Value Assignment</h4>'+
						'<h4 class="col-md-6 value-of-scholarship price text-success" value="'+scholarship+'">'+scholarship+'</h4>'+
					'</div>'+
				'</div>'+
			'</div><hr/>'+		
			'<div class="row item">'+
				'<div class="col-md-12">'+
					'<div class="form-group">'+
						'<label class="control-label number-list col-md-1">#1</label>'+
						'<label class="control-label col-md-3 items-scholarship">DPP</label>'+
						'<div class="col-md-8">'+
							'<input type="text" class="form-control input-sm value-to-assign" placeholder="ex.: 300000" onchange="updateAllocation(this.value);">'+
						'</div>'+
					'</div>'+
				'</div>'+
			'</div>'+
			'<div class="row item">'+
				'<div class="col-md-12">'+
					'<div class="form-group">'+
						'<label class="control-label number-list col-md-1">#2</label>'+
						'<label class="control-label col-md-3 items-scholarship">SPP</label>'+
						'<div class="col-md-8">'+
							'<input type="text" class="form-control input-sm value-to-assign" placeholder="ex.: 300000" onchange="updateAllocation(this.value);">'+
						'</div>'+
					'</div>'+
				'</div>'+
			'</div>'+
			'<div class="row item">'+
				'<div class="col-md-12">'+
					'<div class="form-group">'+
						'<label class="control-label number-list col-md-1">#3</label>'+
						'<label class="control-label col-md-3 items-scholarship">Uang Gedung</label>'+
						'<div class="col-md-8">'+
							'<input type="text" class="form-control input-sm value-to-assign" placeholder="ex.: 300000" onchange="updateAllocation(this.value);">'+
						'</div>'+
					'</div>'+
				'</div>'+
			'</div>'+
		'</div>'
		);
		jQuery('.price').autoNumeric('init', {aSign:'Rp', pSign:'p', aSep:'.', aDec:',' });
		return false;
	});
});

function updateAllocation(params)
{	
	var assigned = params;
	var totalScholarship = jQuery('.value-of-scholarship').attr('value');
	var newTotal = totalScholarship - assigned;

	jQuery('.value-of-scholarship').attr('value', newTotal).text(newTotal).formatCurrency({region: 'id-ID'});
	return false;
}
</script>