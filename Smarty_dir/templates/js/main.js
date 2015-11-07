$(document).ready(function() {
	if(!navigator.cookieEnabled)
	{
		$("#cookie").show();
	}else {
		if(!$.cookie("electHub"))
			$("#cookieModal").modal('show');
	}
	$("#cookieButton").click(function(){
		$.cookie("electHub", "true", { expires: 60 });
	});
});
