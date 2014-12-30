var Management = function () {

	var initPickers = function () {
        //init date pickers		
		jQuery('.datepicker').datepicker({
			dateFormat: 'dd-mm-yy',
			numberOfMonths: 2
		});
    }

    var handleOrders = function () {
	    jQuery('table').on('click', '.filter-submit', function(){
	    	var detable = jQuery(this).closest('table');
		    var nis = jQuery('input[name="nis_student"]').val();
			jQuery('#ajax-loader').show(); 
			detable.find('tbody tr').remove();

			jQuery.ajax({
		    	type: "POST",
		    	url: CI_ROOT+"master/students/get_students_list",
		    	data: {
		    		'nis': detable.find('thead input.nis_student').val(),
		    		'full_name': detable.find('thead input.name_student').val(),
		    		'unit_name': detable.find('thead select.unit_student').val(),
		    		'current_level': detable.find('thead input.current_level_student').val(),
		    		'status': detable.find('thead select.status_student').val()
		    	},
		     	success: function(data)
		     	{
		     		if (data.length > 0)
				    {
						console.log(detable.find('thead input.nis_student').val());
						console.log(detable.find('thead input.name_student').val());
						console.log(detable.find('thead select.unit_student').val());
						console.log(detable.find('thead input.current_level_student').val());
						console.log(detable.find('thead select.status_student').val());
						var no; var nis; var full_name; var unit_name; var current_level; var status;
			           	for (index = 0; index < data.length; ++index) {
			                no = index+1;
			                nis = data[index]['nis'];
			                full_name = data[index]['full_name'];
			                unit_name = data[index]['unit_name'];
			                current_level = data[index]['current_level'];
			                status = data[index]['status'];

			                detable.find('tbody:first').append(
							'<tr>'+
								'<td>'+no+'</td>'+
								'<td class="td-nis">'+nis+'</td>'+
								'<td class="td-full_name">'+full_name+'</td>'+
								'<td class="td-unit_name">'+unit_name+'</td>'+
								'<td class="td-current_level">'+current_level+'</td>'+
								'<td class="td-status">'+status+'</td>'+
								'<td><a href="students/manage_profile/'+nis+'" class="view-student">Detail</a></td>'+
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
    }

/*
    var checkAll = function() {	    
	    jQuery('table').on('click', '.group-checkable', function(){
	        if(this.checked) { // check select status
	            jQuery('.checkable').each(function() { //loop through each checkbox
	                this.checked = true;  //select all checkboxes with class "checkbox1"               
	                jQuery(this).closest('tr').addClass('selected');
	            });
	        }else{
	            jQuery('.checkable').each(function() { //loop through each checkbox
	                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
	                jQuery(this).closest('tr').removeClass('selected');                
	            });         
	        }
		});
    }
*/
    return {

        //main function to initiate the module
        init: function () {
            initPickers();
			//checkAll();
			handleOrders();
        }

    };
}();