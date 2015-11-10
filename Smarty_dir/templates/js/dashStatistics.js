$(function() {
	$.ajax({
	url: 'index.php?controller=Dashboard&task=getArticlesStatistics',
	type: 'POST',
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
	     alert("Error " + errorThrown);
	     if(textStatus==='timeout')
	         alert("request timed out");
		 }
	});

	$.ajax({
		url: 'index.php?controller=Dashboard&task=getProjectsStatistics',
		type: 'POST',
		datatype: "JSON",
	    success : function (data) {
			console.log(data);
		     new Morris.Line({
			   element: 'projectsChart',
		       data: $.parseJSON(data),
		       xkey: 'date',
		       ykeys: ['count(date)'],
			   labels: ['Value'],
			   lineColors: ['#f0ad4e;']
		    });
		},
		error : function (xmlHttpRequest, textStatus, errorThrown) {
		     alert("Error " + errorThrown);
		     if(textStatus==='timeout')
		         alert("request timed out");
			 }
		});

	$.ajax({
	url: 'index.php?controller=Dashboard&task=getCommentsStatistics',
	type: 'POST',
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
	     alert("Error " + errorThrown);
	     if(textStatus==='timeout')
	         alert("request timed out");
		 }
	});
});
