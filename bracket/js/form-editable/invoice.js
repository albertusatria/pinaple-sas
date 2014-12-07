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
            validate: function(value) {
                var dethis = $(this);
                if (parseInt(value) > parseInt(dethis.closest('tr').find('td input.pay-invoice-dab').val())) {
                    value = dethis.closest('tr').find('td input.pay-invoice-dab').val();
                    return "maksimum cicilan : " + value;
                }
            },

			success: function(response, newValue){
				var dethis = $(this);

				dethis.closest('tr').find('td input.instalment-invoice-dab').val(newValue);					
				console.log(dethis.closest('tr').find('td input.instalment-invoice-dab').val());				

				if (parseInt(dethis.closest('tr').find('td input.instalment-invoice-dab').val()) > parseInt(dethis.closest('tr').find('td input.pay-invoice-dab').val()) ) 
				{
					console.log('lebih dari yang seharusnya dibayar')
					dethis.closest('tr').find('td input.instalment-invoice-dab').val(newValue);					
				}
				else 
				{
					console.log('kurang dari yang seharusnya dibayar')
				}

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