$(function(){
	var button = $("#submitButton");
	submitButton(button);
});

function submitButton(btn) {
	$("#textComment").on('input', function() {
		if($(this).val() !== "")
			btn.removeAttr("disabled");
		else
			btn.attr("disabled", "disabled");
	});

	$("#commentForm").submit(function(event){
		event.preventDefault();
		var formData;

		//In questo modo ho un singolo script js che è responsabile dei commenti e
		//non ho duplicazione di codice ;)
		if($('#articleId').length)
			formData = {text: $('#textComment').val(), date: "", articleId: $('#articleId').val()};
		else if($('#projectId').length)
			formData = {text: $('#textComment').val(), date: "", projectId: $('#projectId').val()};

		$.ajax({
			url: 'index.php?controller=Comment&task=addComment',
			type: 'POST',
            data: formData,
		}).done(function(data){
            location.reload();
		});
	});
}
