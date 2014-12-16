var neracaSaldo = function () {

	var setValue = function(){
		jQuery('.value-activa').bind('blur focusout keypress keyup', function () {
			var thisVal = jQuery(this).autoNumeric('get');
			jQuery(this).attr('data-value', thisVal);
			return false;
		});
	}
	var totalDebet = function () {
		jQuery('.table-debet .value-activa').on('blur', function () {
			var grandTotal = 0;
			if((".table-debet tbody").length){
				jQuery(".table-debet tbody .group-content").each(function() {
				    jQuery("td .price",this).each(function() {
						var dethis = jQuery(this);
						grandTotal += Number(dethis.attr("data-value"));
				    }); 
				
					jQuery(".table-debet tfoot input").val(grandTotal).formatCurrency({region: 'id-ID'}).attr("data-value", grandTotal);
			    });		
			}
		});	
		return false;
    }
    
    var totalKredit = function () {
		jQuery('.table-credit .value-activa').on('blur', function () {
			var grandTotal = 0;
			if((".table-credit tbody").length){
				jQuery(".table-credit tbody .group-content").each(function() {
				    jQuery("td .price",this).each(function() {
						var dethis = jQuery(this);
						grandTotal += Number(dethis.attr("data-value"));
				    }); 
				
					jQuery(".table-credit tfoot input").val(grandTotal).formatCurrency({region: 'id-ID'}).attr("data-value", grandTotal);
			    });		
			}
		});	
		return false;
    }

   var showSave = function() {
	   jQuery('.value-activa').bind('blur focusout keypress keyup', function () {
		   var debetValue = jQuery(".table-debet tfoot input").attr("data-value");
	   	   var creditValue = jQuery(".table-credit tfoot input").attr("data-value");
	   	   
	   	   if((debetValue && creditValue > 0) && (debetValue == creditValue))
	   	   {
		   	   jQuery('.panel-footer button').show();
	   	   }
	   	   else
	   	   {
		   	    jQuery('.panel-footer button').hide();
	   	   }
	   });
   }

    return {
        //main function to initiate the module
        init: function () {
        	setValue();
            totalDebet();
			totalKredit();
			showSave();
        }

    };
}();