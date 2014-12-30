var Report = function () {
	var initPickers = function () {
        //init date pickers
		jQuery('#reportrange').daterangepicker({
	                startDate: moment().subtract('days', 29),
	                endDate: moment(),
	                minDate: '01/01/2012',
	                maxDate: '12/31/2014',
	                dateLimit: {
	                    days: 60
	                },
	                showDropdowns: true,
	                showWeekNumbers: true,
	                timePicker: false,
	                timePickerIncrement: 1,
	                timePicker12Hour: true,
	                ranges: {
	                    'Today': [moment(), moment()],
	                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
	                    'Last 7 Days': [moment().subtract('days', 6), moment()],
	                    'Last 30 Days': [moment().subtract('days', 29), moment()],
	                    'This Month': [moment().startOf('month'), moment().endOf('month')],
	                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')],
	                    'This Year': [moment().subtract('month', 12), moment()]
	                },
	                buttonClasses: ['btn'],
	                applyClass: 'btn-success',
	                cancelClass: 'default',
	                format: 'DD-MM-YYYY',
	                separator: ' to ',
	                locale: {
	                    applyLabel: 'Apply',
	                    fromLabel: 'From',
	                    toLabel: 'To',
	                    customRangeLabel: 'Custom Range',
	                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
	                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
	                    firstDay: 1
	                }
	            },
	            function (start, end) {
	                jQuery('#reportrange span').html(start.format('DD MMMM YYYY') + ' - ' + end.format('D MMMM YYYY'));
	            }
	        );
	        
			//Set the initial state of the picker label
			jQuery('#reportrange span').html(moment().subtract('days', 29).format('DD MMMM YYYY') + ' - ' + moment().format('DD MMMM YYYY'));
    }
    
    var initPrice = function () {
	    jQuery('.price').autoNumeric('init', {aSign:'Rp', pSign:'p', aSep:'.', aDec:',' });
    }


	var chooseReport = function () {
		var selectedReportIs = jQuery('#report').val();
		if(selectedReportIs == "custom")
		{
			jQuery('.wrapper-option-label').show();
		}
		else if((selectedReportIs == "a02") ||(selectedReportIs == "a03")||(selectedReportIs == "a04"))
		{
			//daily
			jQuery('.wrapper-option-label').hide();
			jQuery('.daterangepicker').find('.ranges li').hide();
			jQuery('.daterangepicker').find('.ranges li:nth-child(1), .ranges li:nth-child(2), .ranges li:nth-child(8)').show();		
			jQuery('.daterangepicker').find('.ranges li:nth-child(1)').show().click();						
			jQuery('.range-report').show();			
		}
		else if(selectedReportIs == "a01")
		{
			//monthly
			jQuery('.wrapper-option-label').hide();
			jQuery('.daterangepicker').find('.ranges li').hide();
			jQuery('.daterangepicker').find('.ranges li:nth-child(5), .ranges li:nth-child(6), .ranges li:nth-child(8)').show();		
			jQuery('.daterangepicker').find('.ranges li:nth-child(5)').show().click();						
			jQuery('.range-report').show();			
		}
		else if(selectedReportIs == "a05")
		{
			//yearly
			jQuery('.wrapper-option-label').hide();
			jQuery('.daterangepicker').find('.ranges li').hide();
			jQuery('.daterangepicker').find('.ranges li:nth-child(7), .ranges li:nth-child(8)').show();		
			jQuery('.daterangepicker').find('.ranges li:nth-child(7)').show().click();						
			jQuery('.range-report').show();			
		}				
		else
		{
			//custom
			jQuery('.wrapper-option-label').hide();
			jQuery('.range-report').hide();
		}
		jQuery('#report-type').val(selectedReportIs);
		jQuery('#date-choosen-report').val(jQuery('#reportrange').find('span').text());
		// generateReport(selectedReportIs);
	}
	
	
	var generateReport = function (params) {
		var daterange = jQuery('#reportrange').find('span').text();
	    jQuery('#generate-report').on('click', function(){
			// console.log(daterange); return false;			
			jQuery('#ajax-loader').show();			
			var timeout;
			clearTimeout(timeout);
			timeout = setTimeout(function() {
				jQuery('#ajax-loader').hide();
				 // window.location.href = CI_ROOT+"payment_reports/financial_report/result/"+params;
			}, 1000);
			return false;
	    });
    }
    
    return {

        //main function to initiate the module
        init: function () {
            initPickers();
            initPrice();
        },
        selectReport: function() {
	        chooseReport();
        }

    };
}();