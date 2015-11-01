$(function() {
	$.ajax({
	url: 'index.php?controller=Dashboard&task=getArticlesStatistics',
	type: 'GET',
	datatype: "JSON",
    success : function (data) {
	     new Morris.Line({
		   element: 'articlesChart',
	       data: $.parseJSON(data),
	       xkey: 'date',
	       ykeys: ['count(date)'],
		   labels: ['Value'],
		   lineColors: ['#5CB85C']
	    });
	},
	error : function (xmlHttpRequest, textStatus, errorThrown) {
		console.log(textStatus);
	     alert("Error " + errorThrown);
	     if(textStatus==='timeout')
	         alert("request timed out");
		 }
	});

	$.ajax({
	url: 'index.php?controller=Dashboard&task=getCommentsStatistics',
	type: 'GET',
	datatype: "JSON",
    success : function (data) {
		console.log(data);
	     new Morris.Line({
		   element: 'commentsChart',
	       data: $.parseJSON(data),
	       xkey: 'date',
	       ykeys: ['count(date)'],
		   labels: ['Value'],
		   lineColors: ['#337ab7']
	    });
	},
	error : function (xmlHttpRequest, textStatus, errorThrown) {
		console.log(textStatus);
	     alert("Error " + errorThrown);
	     if(textStatus==='timeout')
	         alert("request timed out");
		 }
	});

	$.ajax({
	url: 'index.php?controller=Dashboard&task=getCommentsStatistics',
	type: 'GET',
	datatype: "JSON",
    success : function (data) {
		console.log(data);
	     new Morris.Line({
		   element: 'projectsChart',
	       data: $.parseJSON(data),
	       xkey: 'date',
	       ykeys: ['count(date)'],
		   labels: ['Value'],
		   lineColors: ['#337ab7']
	    });
	},
	error : function (xmlHttpRequest, textStatus, errorThrown) {
		console.log(textStatus);
	     alert("Error " + errorThrown);
	     if(textStatus==='timeout')
	         alert("request timed out");
		 }
	});
});
