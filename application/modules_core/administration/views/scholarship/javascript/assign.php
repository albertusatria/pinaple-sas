<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>bracket/css/assign.scholarship.css" />

<script src="<?php echo base_url();?>bracket/js/jquery.formatCurrency-1.4.0.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.formatCurrency.id-ID.js"></script>
<script src="<?php echo base_url()?>bracket/js/autoNumeric.js"></script>

<script type="text/javascript">
// Assign Scholarship value
jQuery(document).ready(function() {

	var nis_pub;

	jQuery('#searchResult').on('click','a.daftar',function(){
		nis_pub = jQuery(this).closest('div').find('h5.student-id').text();
		console.log(nis_pub);
		jQuery('.modal-body-inside div').remove();
		jQuery('.scholarship-value').attr('disabled', false);
		jQuery('.scholarship-value').attr('value','');
		jQuery('.next-assign').show();
		jQuery('.next-save').hide();
	});

	jQuery('.next-assign').on('click',function(){
		var scholarship = jQuery('.scholarship-value').val();
		applyScholarship(scholarship);
		jQuery('.price').autoNumeric('init', {aSign:'Rp', pSign:'p', aSep:'.', aDec:',' });
		return false;
	});

	function applyScholarship(scholarship){
		jQuery('.value-of-scholarsip .fa-edit').show();
		
		jQuery('.change-value').attr('value',scholarship);
		//jQuery('.change-value').attr('onclick','changeScholarship(this)');
		jQuery('.scholarship-value').attr('disabled', true);
		
		var item  = {};
		var num   = 1;
		item[num] = {};
		item[num]['nis'] = nis_pub;

		jQuery.ajax({
	    	type: "POST",
	    	url: CI_ROOT+"administration/scholarship/get_invoices_for_scholarship",
	    	async:false,
	    	data: item,
	     	success: function(data)
	     	{
				jQuery('.modal-body-inside div').remove();
				if (data.length > 0)
			    {

			    	jQuery('.modal-body-inside').append(
						'<div class="assign-scholarships">'+
							'<div class="row">'+
								'<div class="col-md-12">'+
									'<div class="form-group">'+
										'<h4 class="col-md-6 label-assignment">Scholarship Value Assignment</h4>'+
										'<h4 class="col-md-6 value-of-scholarship price text-success" value="'+scholarship+'">'+scholarship+'</h4>'+
									'</div>'+
								'</div>'+
							'</div><hr/>'
			    	);
					var no; var name; var period_name; var amount;
		           	for (index = 0; index < data.length; ++index) {
		                no = index+1;
		                id = data[index]['id'];
		                name = data[index]['item_name'];
		                period_name = data[index]['period_name'];
		                amount = data[index]['amount'];

		                if(period_name != null)
		                	{ period_name= '('+period_name+')'; }
		                else
		                	{ period_name=''; }

						jQuery('.modal-body-inside').append(
							'<div class="row item">'+
								'<div class="col-md-12">'+
									'<div class="form-group">'+
										'<label class="control-label number-list col-md-1">#'+no+'</label>'+
										'<label class="control-label col-md-3 items-scholarship name">'+name+' '+period_name+'</label>'+
										'<label class="control-label col-md-2 items-scholarship amount"> Rp '+amount+',-</label>'+
										'<div class="col-md-6">'+
											'<input class="hidden-id" type="hidden" value="'+id+'">'+
											'<input class="hidden-amount" type="hidden" value="'+amount+'">'+
											'<input type="text" class="form-control input-sm value-to-assign" placeholder="ex.: 300000" onchange="updateAllocation(this);">'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>'+
						'</div>'
						);
					}
				}
				else 
				{
				 	//bila tidak ketemu
				 	console.log('tidak ditemukan');
				}
				//delay append data while loading
				setTimeout(function() {
					jQuery('#ajax-loader').hide();    
				}, 1000); // <-- time in milliseconds	

				jQuery('.next-assign').hide();
				jQuery('.next-save').show();	    

	     	},
		    error: function (data)
		    {
		    	console.log('terjadi error');
		    	console.log(data);
		    }
		});  	
	    return false;
	}

	jQuery('.next-save').on('click',function(){
		var item  = {};
		var num   = 1;
		item[num] = {};
		
		//gabung muter-muter array BroO
		//item[num]['nis'] = nis_pub;
		//item[num]['id']=

		jQuery.ajax({
	    	type: "POST",
	    	url: CI_ROOT+"administration/scholarship/save_scholarship",
	    	async:false,
	    	data: item,
	     	success: function(data)
	     	{

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

function updateAllocation(params)
{	
	var assigned = params.value;
	var totalScholarship = jQuery('.value-of-scholarship').attr('value');
	var newTotal = totalScholarship - assigned;
	//durung ketemu ki carane Bhim.. :v
	var isi = jQuery(params).closest('div').find('input.hidden-amount').text();
	console.log(isi);
	console.log(params);
	if(newTotal<0){
		alert('Scholarship can not be negative');
		params.value=0;
		params.focus();
		return false
	}
	jQuery('.value-of-scholarship').attr('value', newTotal).text(newTotal).formatCurrency({region: 'id-ID'});
	return false;
}
</script>