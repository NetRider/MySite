$(function(){
	var button = $("#submitButton");
	submitButton(button);
});

function submitButton(btn){
	$("#textComment").change(function(){
		if($("#textComment").val() != ""){
			btn.removeAttr("disabled");
		}
		else
			btn.attr("disabled", "disabled");
	});

	$("#commentForm").submit(function(event){
		event.preventDefault();

		$.ajax({
			url: 'index.php?controller=Comment&task=addComment',
			type: 'POST',
            data: {text: $('#textComment').val(), date: "", articleId: $('#articleId').val()},
		}).done(function(data){
            location.reload();
		});
	});
};
