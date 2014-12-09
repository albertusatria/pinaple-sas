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
<script src="<?php echo base_url()?>bracket/js/autoNumeric.js"></script>
<script src="<?php echo base_url();?>bracket/js/custom.js"></script>

<script type="text/javascript">
        CI_ROOT = "<?=base_url() ?>";
</script>

<script type="text/javascript">
// General Setting
jQuery(document).ready(function() {
    

	jQuery('#btnCari').on('click',function(){
		var keyword = jQuery('#keyword').val();
		searchSiswa(keyword);
	});

	// With Form Validation Wizard
	var $validator = jQuery("#reRegis").validate({
		highlight: function(element) {
		  jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		},
		success: function(element) {
		  jQuery(element).closest('.form-group').removeClass('has-error').addClass('validation-pass').css('margin-bottom', '12px');
		}
	});
	
	function searchSiswa(id) {
		var item  = {};
		var num   = 1;
		item[num] = {};
		item[num]['keyword'] = id;

		//cari , jika katemu tampilkan pop up, pilih
		
		jQuery('#ajax-loader').show(); 

	    jQuery.ajax({
	    	type: "POST",
	    	url: CI_ROOT+"administration/scholarship/get_students_for_scholarship",
	    	data: item,
	     	success: function(data)
	     	{
			    if (data.length > 0)
			    {
			   		//tampilkan list siswanya
				   	jQuery('#searchResult div').remove();
					var nis; var nama; var unit; var grade; var alamat; var current;
		           for (index = 0; index < data.length; ++index) {
		                nis = data[index]['nis'];
		                nama = data[index]['full_name'];
		                unit = data[index]['name'];
		                unit_id = data[index]['unit_id'];
		                alamat = data[index]['living_address'];
		                current = data[index]['current_level'];
		                start = data[index]['start_level'];
						
						//delay append data while loading
						setTimeout(function() {
							jQuery('#searchResult').append(
							'<div class="col-md-4 students-id">'+
								'<div class="people-item">'+
								  '<div class="media">'+
								    '<div class="media-body">'+
								      '<h5 class="student-id text-info">'+nis+'</h5>'+
								      '<h4 class="student-name text-primary">'+nama+'</h4>'+
								      '<input type="hidden" class="student-unit" value="'+unit_id+'">'+
								      '<input type="hidden" class="student-start" value="'+start+'">'+
								      '<input type="hidden" class="student-current" value="'+current+'">'+
								      '<div class="text-muted"><i class="fa fa-puzzle-piece"></i>'+unit+' ('+unit_id+'), Start '+start+', Tingkat '+current+'</div>'+
								      '<div class="text-muted"><i class="fa fa-map-marker"></i>'+alamat+'</div>'+
								      '<a href="#" class="btn btn-danger daftar" data-toggle="modal" data-target="#initScholarship">Assign Scholarship!</a>'+
								    '</div>'+
								  '</div>'+
								'</div>'+
							'</div>'
							);							
							jQuery('#ajax-loader').hide();    
						}, 1000); // <-- time in milliseconds						
		            }
				}
				else 
				{
				 	//bila tidak ketemu
				 	console.log('tidak ditemukan');
				}		    
	     	},
		    error: function (data)
		    {
		    	console.log('terjadi error');
		    	console.log(data);
		    }
		});  	

	    return false;
	}

	jQuery('#searchResult').on('click','a.daftar',function(){
		console.log(jQuery(this).closest('div').find('h5.student-id').text());
	});
	
});
</script>
<script type="text/javascript">
  function hapus(no,nama){
    if(confirm('Are you sure to delete '+nama+' item?'))
      window.location = "<?php echo base_url(); ?>administration/scholarship/delete/"+no;
  }
</script>
<!-- JS code for assign scholarship value -->
<?php $this->load->view('administration/scholarship/javascript/assign')?>