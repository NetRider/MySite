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
		   barColor: ['#337ab7']
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
