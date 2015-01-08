jQuery(document).ready(function(){
	//BU students linechart
	new Morris.Line({
	    // ID of the element in which to draw the chart.
	    element: 'line-chart',
	    // Chart data records -- each entry in this array corresponds to a point on
	    // the chart.
	    data: [
	        { y: '2006', a: 30, b: 20, c: 10, d: 0, },
	        { y: '2007', a: 75,  b: 65, c: 10, d: 0, },
	        { y: '2008', a: 50,  b: 40, c: 15, d: 0, },
	        { y: '2009', a: 75,  b: 65, c: 20, d: 10 },
	        { y: '2010', a: 50,  b: 40, c: 30, d: 30 },
	        { y: '2011', a: 75,  b: 65, c: 30, d: 40 },
	        { y: '2012', a: 100, b: 90, c: 40, d: 60 }
	    ],
	    xkey: 'y',
	    ykeys: ['a', 'b','c','d'],
	    labels: ['KB', 'TK', 'SD', 'SMP'],
	    lineColors: ['#428BCA','#5BC0DE','#E9A95E','#D9534F'],
	    lineWidth: '2px',
	    hideHover: true
	});
          
	//format currency on dashboard
	jQuery('.currency').autoNumeric('init', {aSign:'Rp ', pSign:'p', aPad: false, aSep: '.', aDec: ','});         
});