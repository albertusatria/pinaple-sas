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
		var u_id = jQuery('#u_id').val();
		searchItemsType(u_id,keyword);
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
	
	function searchItemsType(u_id,kd) {
		var item  = {};
		var num   = 1;
		item[num] = {};
		item[num]['keyword'] = kd;
		item[num]['u_id'] = u_id;
		console.log(kd);
		console.log(u_id);
		//cari , jika katemu tampilkan pop up, pilih
		
		jQuery('#ajax-loader').show(); 

	    jQuery.ajax({
	    	type: "POST",
	    	url: CI_ROOT+"master/items_type_optional/get_list_items_type",
	    	async:false,
	    	data: item,
	     	success: function(data)
	     	{
	     		jQuery('#searchResult div').remove();
			    if (data.length > 0)
			    {
			    	console.log(data);
			   		//tampilkan list siswanya
					var id; var name; var amount;
		            for (index = 0; index < data.length; ++index) {

		            	console.log(index);
		                id = data[index]['id'];
		                name = data[index]['name'];
		                amount = data[index]['amount'];
						
						jQuery('#searchResult').append(
						'<div class="col-md-4 students-id">'+
							'<div class="people-item">'+
							  '<div class="media">'+
							    '<div class="media-body">'+
							      '<h5 class="student-id text-info">'+name+'</h5>'+
							      '<h4 class="student-name text-primary"> Rp '+amount+'</h4>'+
							      '<a href='+CI_ROOT+'master/items_type_optional/edit/'+id+'><i class="fa fa-pencil"></i></a>'+
			                  	  '<a href="#" class="delete-row" onclick="hapus(\''+id+'\',\''+name+'\')"><i class="fa fa-trash-o"></i></a>'+
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

	     	},
		    error: function (data)
		    {
		    	console.log('terjadi error');
		    	console.log(data);
		    }
		});  	

	    return false;
	}
	
});
</script>
<script type="text/javascript">
  function hapus(no,nama){
    if(confirm('Are you sure to delete '+nama+' item?'))
      window.location = "<?php echo base_url(); ?>master/items_type_optional/delete/"+no;
  }
</script>