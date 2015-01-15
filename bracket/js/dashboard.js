jQuery(document).ready(function(){
	//BU students linechart
	new Morris.Line({
	    // ID of the element in which to draw the chart.
	    element: 'total-student-graphic',
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
	    lineColors: ['#F6D84B','#1CAF9A','#D9534F','#428BCA'],
	    lineWidth: '2px',
	    hideHover: true
	});

    // Total Class Room Donut Chart
    new Morris.Donut({
        element: 'class-room',
        data: [
          {label: "KB", value: 3},
          {label: "TK", value: 3},
          {label: "SD", value: 12},
          {label: "SMP", value: 6},
        ],
        colors: ['#F6D84B','#1CAF9A','#D9534F','#428BCA']
    });
              
	//format currency on dashboard
	jQuery('.currency').autoNumeric('init', {aSign:'Rp ', pSign:'p', aPad: false, aSep: '.', aDec: ','});         
});