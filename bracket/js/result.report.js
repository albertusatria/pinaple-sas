var reportResult = function () {

    var initPrice = function () {			
		jQuery(".price").formatCurrency({region: 'id-ID'});
    }

    return {
        //main function to initiate the module
        init: function () {
        	initPrice();
        }

    };
}();