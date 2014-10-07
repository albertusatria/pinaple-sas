var FormEditableInvoice = function () {

    var initEditables = function () {
		var subTotal = "";
		var invoiceTable = $('#invoiceTable');
		var price = parseInt(invoiceTable.find('.price.each').attr('value'));
        //set editable element with success function to get their updated value
		$('.qty').editable({
			success: function(response, newValue) {

				//update subtotal on the row
				subTotal = parseInt(newValue) * price;
				invoiceTable.find('span.subtotal').text(subTotal).attr('value',subTotal);
				invoiceTable.find('span.subtotal').formatCurrency({region: 'id-ID'});
				updateGrandTotal();
			}		
		});
		
    }

    return {
        //main function to initiate the module
        init: function () {

            // init editable elements
            initEditables();
        }

    };

}();