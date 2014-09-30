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
		                unit_id = data[index]['unit_id'];
		                alamat = data[index]['living_address'];
		                current = data[index]['current_level'];
		                start = data[index]['start_level'];

						jQuery('#searchResult').append(
							'<div class="col-md-6 students-id">'+
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
								      '<a href="#" class="btn btn-danger daftar" data-toggle="modal" data-target="#initPacket">Daftar Ulang!</a>'+
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

    // Delete row in a table
    jQuery('#searchResult').on('click','.daftar',function(){
		var unit = jQuery('#searchResult').find('input.student-unit').val();		
		var current = jQuery('#searchResult').find('input.student-current').val();		
		var start = jQuery('#searchResult').find('input.student-start').val();		
		console.log('student unit : '+unit);
		console.log('student start : '+start);
		console.log('student current : '+current);
		queryPaket(unit,start,current);
    });

	jQuery('.row').on('click', '.students-id', function(){
		var idStudent = jQuery(this).find('.student-id').text();
		jQuery('#initPacketLabel').find('strong').text(idStudent);
		jQuery('#nis_choosen').val(idStudent);
	});

	function queryPaket(unit,start,current) {
		var item  = {};
		var num   = 1;
		item[num] = {};
		item[num]['unit_id'] = unit;
		item[num]['start'] = start;
		item[num]['current'] = current;
		console.log(item[num]['unit_id']);
		console.log(item[num]['start']);
		console.log(item[num]['current']);

		//cari , jika katemu tampilkan pop up, pilih
		
		jQuery('#ajax-loader').show(); 
	    jQuery.ajax({
	    	type: "POST",
	    	url: CI_ROOT+"registration/re_registration/get_list_paket",
	    	data: item,
	     	success: function(data)
	     	{
			    if (data.length > 0)
			    {
			   		console.log(data);
			   		//tampilkan list siswanya
				   	jQuery('#pilihPaket option').remove();
				   	jQuery('#pilihPaket').append('<option value="" selected>PILIH PAKET</option>');
					var id; var name;
		            for (index = 0; index < data.length; ++index) {
		                id = data[index]['id'];
		                name = data[index]['name'];

					   	jQuery('#pilihPaket').append('<option value="'+id+'">'+name+'</option>');
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

	jQuery('#pilihPaket').on('change',function(){
		if (jQuery(this).val() == '') {
		  	jQuery('#paymentItemList div').remove();
		} else {
			console.log('query disini');			

			var item  = {};
			var num   = 1;
			item[num] = {};
			item[num]['packet_id'] = jQuery(this).val();

			jQuery('#ajax-loader').show(); 
		    jQuery.ajax({
		    	type: "POST",
		    	url: CI_ROOT+"registration/re_registration/get_list_packet_item",
		    	data: item,
		     	success: function(data)
		     	{
				    if (data.length > 0)
				    {
				   		console.log(data);

					   	jQuery('#paymentItemList div').remove();
						var id; var name; var amount; var period_id; var period_nama; var packet_id;
			            for (index = 0; index < data.length; ++index) {
			                packet_id = data[index]['packet_id'];
			                id = data[index]['item_type_id'];
			                name = data[index]['name'];
			                amount = data[index]['amount'];
			                period_id = data[index]['period_id'];
			                period_nama = data[index]['name_of_period'];

			                var index2 = "packet_id";
			                var index3 = "item_type_id";
			                var index4 = "amount";
			                var index5 = "period_id";

			                if (period_id == null) {
								jQuery('#paymentItemList').append(
									'<div class="form-group">'+
									  '<input type="hidden" name="invoice['+index+']['+index2+']" value="'+packet_id+'">'+
									  '<input type="hidden" name="invoice['+index+']['+index3+']" value="'+id+'">'+
									  '<input type="hidden" name="invoice['+index+']['+index5+']" value="">'+
									  '<label class="col-sm-3 control-label">'+name+' <span class="asterisk">*</span></label>'+
									  '<div class="col-sm-9">'+
									    '<input type="text" name="invoice['+index+']['+index4+']" class="form-control dpp price" value="'+amount+'" required/>'+
									  '</div>'+
									'</div>'
								);				               
			                } 
			                else {
								jQuery('#paymentItemList').append(
									'<div class="form-group">'+
									  '<input type="hidden" name="invoice['+index+']['+index2+']" value="'+packet_id+'">'+
									  '<input type="hidden" name="invoice['+index+']['+index3+']" value="'+id+'">'+
									  '<input type="hidden" name="invoice['+index+']['+index5+']" value="'+period_id+'">'+
									  '<label class="col-sm-3 control-label">'+name+' bulan '+period_nama+' <span class="asterisk">*</span></label>'+
									  '<div class="col-sm-9">'+
									    '<input type="text" name="invoice['+index+']['+index4+']" class="form-control dpp price" placeholder="Biaya DPP ..." value="'+amount+'" required/>'+
									  '</div>'+
									'</div>'
								);				               			                	
			                }
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

		}
		jQuery('#ajax-loader').hide(); 
		return false;
	});

});
</script>