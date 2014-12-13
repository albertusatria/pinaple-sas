var InvoiceOrders = function () {
	var initPickers = function () {
        //init date pickers
		jQuery('.datepicker').datepicker({
			dateFormat: 'dd-mm-yy',
			numberOfMonths: 2
		});
    }

    var handleOrders = function () {


    }

    return {

        //main function to initiate the module
        init: function () {
            initPickers();
           
        }

    };
}();