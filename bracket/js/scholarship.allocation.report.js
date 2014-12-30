var reportScholarship = function () {

    var initPrice = function () {			
		jQuery(".price").formatCurrency({region: 'id-ID'});
    }
    
    var totalAmount = function () {
		var grandTotal = 0;
		if(("#datatable_orders tbody").length){
			jQuery("#datatable_orders tbody tr").each(function() {
			    jQuery(".price",this).each(function() {
					var dethis = jQuery(this);
					grandTotal += Number(dethis.attr("data-value"));
					console.log(grandTotal);
			    }); 

				jQuery("#datatable_orders .grand-total .price").text(grandTotal).formatCurrency({region: 'id-ID'}).attr("data-value", grandTotal);
		    });		
		}
		return false;
    }

    return {
        //main function to initiate the module
        init: function () {
        	initPrice();
        	totalAmount();
        }

    };
}();