var InvoiceOrders = function () {
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
		    var orderID = jQuery('input[name="order_id"]').val();

			jQuery('#ajax-loader').show(); 
			detable.find('tbody tr').remove();
			detable.find('tbody:first').append(
			'<tr>'+
				'<td><input type="checkbox" class="checkable"></td>'+
				'<td>'+orderID+'</td>'+
				'<td>20 Januari 2014</td>'+
				'<td>Simon M</td>'+
				'<td>SD</td>'+
				'<td>Paid</td>'+
				'<td><a href="#" class="view-oder">View</a></td>'+
			'</tr>'
			);
			
			setTimeout(function() {
					jQuery('#ajax-loader').hide();    
			}, 1000); // <-- time in milliseconds
			return false;
	    });
    }
    
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

    return {

        //main function to initiate the module
        init: function () {
            initPickers();
			checkAll();
			handleOrders();
        }

    };
}();