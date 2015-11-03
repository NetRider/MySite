$(function(){
	CKEDITOR.replace('editorArticle');
	$("#articleForm").change(function(){
		checkForm();
	});

	$("#buttonDashArticleForm").click(function() {
		location.reload();
	});
});

// validate signup form on keyup and submit
function checkForm(){
	var validator = $("#articleForm").validate({
		rules: {
			title: {
				required: true,
				minlength: 10
			},
			description: {
				required: true,
				minlength: 10
			},
			text: {
				required: true
			},
		},
		messages: {
			title: {
				required: "Inserisci un titolo",
			},
			description: {
				required: "Inserisci una descrizione",
			},
			text: {
				required: "Il testo dell'articolo non può essere vuoto",
			},
		},
		// the errorPlacement has to take the table layout into account
		errorPlacement: function(error, element) {
			error.appendTo(element.parent()[0].children[1]);
		},
		// specifying a submitHandler prevents the default submit, good for the demo
		submitHandler: function() {
			run_waitMe("bounce");

			var formData = new FormData($("#articleForm")[0]);
			formData.append("articleText", CKEDITOR.instances.editorArticle.getData());

			$.ajax({
				url: 'index.php?controller=Article&task=addNewArticle',
				type: 'POST',
				data: formData,
				processData: false,
				contentType: false
			}).done(function(data) {
				$('#panelEffect').waitMe('hide');

				if(data == "1")
				{
					$("#myModalDashArticleTitle").text("Articolo caricato correttamente");
	                $("#myModalDashArticleBody").text("L'articolo è stato inserito nei database di ElectronicsHub.");
	                $("#buttonDashArticleForm").addClass("btn-success");

				}else {
					$("#myModalDashArticleTitle").text("Articolo non caricato correttamente");
	                $("#myModalDashArticleBody").append("E' stato riscontrato un problema con il server.");
	                $("#buttonDashArticleForm").addClass("btn-failure");
				}
				$("#dashArticleModal").modal('show');

			});
		},
		// set this class to error-labels to indicate valid fields
		success: function(label, element) {
			$(element).parent().removeClass("has-error");
			$(element).parent().addClass("has-success");
			label.html("&nbsp;").addClass("checked");
		},
		highlight: function(element, errorClass) {
			$(element).parent().removeClass("has-success");
			$(element).parent().addClass("has-error");
			$(element).parent().next().find("." + errorClass).removeClass("checked");
		}
	});
}

function run_waitMe(effect) {
	$('#panelEffect').waitMe({
		//win8_linear, ios, facebook, rotation, timer, pulse,
		//progressBar, bouncePulse or img

		effect: 'bounce',
		text: 'Sto inserendo i dati',

		//background for container (string).
		bg: 'rgba(255,255,255,0.7)',

		//color for background animation and text (string).
		color: '#000',

		//change width for elem animation (string).

		sizeW: '',
		//change height for elem animation (string).

		sizeH: '',

		// url to image
		source: ''
	});
}
