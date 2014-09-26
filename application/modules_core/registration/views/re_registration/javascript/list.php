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
		//pencarian
		//yang dicari
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
	
	jQuery('.row').on('click', '.students-id', function(){
		var idStudent = jQuery(this).find('.student-id').text();
		jQuery('#initPacketLabel').find('strong').text(idStudent);
		jQuery('#nis_choosen').val(idStudent);
	});

	jQuery('.form-control.price').autoNumeric('init', {aSign:'Rp ', pSign:'p' });

	jQuery('.students-id')
	  .mouseenter(function() {
		jQuery(this).addClass('hovered');
	  })
	  .mouseleave(function() {
		jQuery(this).removeClass('hovered');
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
	    	url: CI_ROOT+"registration/re_registration/get_siswa_daftar_ulang",
	    	data: item,
	     	success: function(data)
	     	{
			    if (data.length > 0)
			    {
			   		console.log(data);
			   		//tampilkan list siswanya

				   	jQuery('#searchResult div').remove();
					var nis; var nama; var unit; var grade; var alamat; var current;
		            for (index = 0; index < data.length; ++index) {
		                nis = data[index]['nis'];
		                nama = data[index]['full_name'];
		                unit = data[index]['name'];
		                alamat = data[index]['living_address'];
		                current = data[index]['current_level'];

						jQuery('#searchResult').append(
							'<div class="col-md-6 students-id" data-toggle="modal" data-target="#initPacket">'+
								'<div class="people-item">'+
								  '<div class="media">'+
								    '<div class="media-body">'+
								      '<h5 class="student-id text-info">'+nis+'</h5>'+
								      '<h4 class="student-name text-primary">'+nama+'</h4>'+
								      '<div class="text-muted"><i class="fa fa-puzzle-piece"></i>'+unit+', Tingkat'+current+'</div>'+
								      '<div class="text-muted"><i class="fa fa-map-marker"></i>'+alamat+'</div>'+
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
	     	},
		    error: function (data)
		    {
		    	console.log('terjadi error');
		    	console.log(data);
		    }
		});  	
		
		jQuery('#ajax-loader').hide(); 
	    return false;
	}

	//End General Setting
});
</script>