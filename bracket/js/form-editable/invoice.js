var FormEditableInvoice = function () {

    var initEditables = function () {
		var subTotal = "";
		var invoiceTable = $('#invoiceTable');
		var price = parseInt(invoiceTable.find('.price.each').attr('value'));
        //set editable element with success function to get their updated value
		$('.qty').editable({
			success: function(response, newValue) {
				var dethis = $(this);
				//update subtotal on the row
				subTotal = parseInt(newValue) * price;
				dethis.closest('tr').find('span.subtotal').text(subTotal).attr('value',subTotal);
				dethis.closest('tr').find('span.subtotal').formatCurrency({region: 'id-ID'});
				updateGrandTotal();
			}		
		});
		
		$('.inst-credit').editable({
			success: function(response, newValue){
				var dethis = $(this);

				if (newValue > 0)
				{
					invoiceTable.find('span.init-price').addClass('off-price');
					var qty = dethis.closest('tr').find('span.qty').text();
					subTotal = parseInt(newValue) * qty;
					dethis.closest('tr').find('span.inst-credit').formatCurrency({region: 'id-ID'});					
				}
				else
				{
					price = parseInt(dethis.closest('tr').find('.init-price').attr('value'));
					invoiceTable.find('span.init-price').removeClass('off-price');
					subTotal = 1 * price;
				}
													
				dethis.closest('tr').find('span.subtotal').text(subTotal).attr('value',subTotal);
				dethis.closest('tr').find('span.subtotal').formatCurrency({region: 'id-ID'});
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