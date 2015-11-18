$(function() {

	jQuery.validator.addMethod("alphanumeric", function(value, element) {
    	return this.optional(element) || /^\w+$/i.test(value);
	}, "Lettere, numeri, and underscores sono ammessi");

	jQuery.validator.addMethod("customemail", function(value, element) {
    return this.optional(element) || /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
	}, "Indirizzo email non è valido.");

	var form = $("#updateForm");

	form.change(function(){
		checkForm();
	});

	form.submit(function(event){
		event.preventDefault();
	});

	$("#buttonDashProfileForm").click(function() {
		location.reload();
	});
});

// validate signup form on keyup and submit
function checkForm(){
	console.log("faccio il chekFOrm");
	var validator = $("#updateForm").validate({
		rules: {
			username: {
				required: true,
				minlength: 5,
				alphanumeric: true,
				remote: {
        			url: "index.php?controller=Registration&task=checkUsername",
        			type: "POST",
        			data: {
          				username: function() {
            				return $( "#username" ).val();
          				}
        			}
				}
			},
			email: {
				required: true,
				customemail: true,
				remote: {
        			url: "index.php?controller=Registration&task=checkEmail",
        			type: "POST",
        			data: {
          				email: function() {
            				return $("#email").val();
          				}
        			}
				}
			},
			image: {
				extension: "png|gif|jpeg|jpg"
			},
			password: {
				minlength: 5
			},
			password_confirm: {
				minlength: 5,
				equalTo: "#password"
			}
		},
		messages: {
			username: {
				required: "devi inserire un nome utente",
				remote: "nome utente già utilizzato",
				minlength: "inserisci almeno 5 caratteri"
			},
			email: {
				required: "inserisci l'email",
				remote: "email già utilizzata",
			},
			image: {
				extension: "Questa estensione non è valida"
			},
			password_confirm: {
				equalTo: "Le password non coincidono"
			}
		},
		// the errorPlacement has to take the table layout into account
		errorPlacement: function(error, element) {
			error.appendTo(element.parent().next());
			console.log(error);

		},
		// specifying a submitHandler prevents the default submit, good for the demo
		submitHandler: function() {
			console.log("invio i dati");
			var formData = new FormData($("#updateForm")[0]);
			$.ajax({
				url: 'index.php?controller=UserAccess&task=updateUser',
				type: 'POST',
				data: formData,
				processData: false,
				contentType: false
			}).done(function(data){
				console.log(data);
				if(data == "1")
				{
					$("#myModalDashProfileTitle").text("Aggiornamento completato");
		            $("#myModalDashProfileBody").text("I dati del profilo sono stati aggioranti sul server!");
		            $("#buttonDashProfileForm").addClass("btn-success");
				}
				else
				{
					$("#myModalDashProfileTitle").text("L'aggiornamento non completato");
					$("#myModalDashProfileBody").append("E' stato riscontrato un problema con il server.");
					$("#buttonDashProfileForm").addClass("btn-failure");
				}
				$("#dashProfileModal").modal('show');

			});
		},
		// set this class to error-labels to indicate valid fields
		success: function(label, element) {
			var child = $(element).parent();
			child.removeClass("has-error");
			child.addClass("has-success");
			label.html("&nbsp;").addClass("checked");
			child.next().hide();

		},
		highlight: function(element, errorClass) {
			console.log("highlight");
			var child = $(element).parent();
			child.removeClass("has-success");
			child.addClass("has-error");
			child.next().find("." + errorClass).removeClass("checked");
			child.next().show();
		}
	});
}
