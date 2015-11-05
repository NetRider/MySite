$(function(){

	jQuery.validator.addMethod("alphanumeric", function(value, element) {
		return this.optional(element) || /^\w+$/i.test(value);
	}, "Letters, numbers, and underscores only please");

	jQuery.validator.addMethod("customemail", function(value, element) {
	return this.optional(element) || /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
	}, "Please enter a valid email address.");

	jQuery.validator.addMethod('filesize', function(value, element, param) {
    return this.optional(element) || (element.files[0].size <= param);
	}, "Inserisci una immagine inferiore ai 500kb");

	$("#registrationForm").change(function(){
		checkForm();
	});

	$('#registrationModal').on('hidden.bs.modal', function () {
		location.replace("index.php");
	});
});

// validate signup form on keyup and submit
function checkForm(){
	var validator = $("#registrationForm").validate({
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
			password: {
				required: true,
				minlength: 5
			},
			password_confirm: {
				required: true,
				minlength: 5,
				equalTo: "#password"
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
				extension: "png|gif|jpeg|jpg",
				filesize: 524288
			}
		},
		messages: {
			username: {
				required: "Enter a username",
				remote: jQuery.validator.format('This username is already in use, please choose a different name')
			},
			password: {
				required: "Provide a password",
			},
			password_confirm: {
				required: "Repeat your password",
			},
			email: {
				required: "Please enter a valid email address",
				remote: jQuery.validator.format('This eamil is already in use, please choose a different email')
			},
			image: {
				extension: "Questa estensione non è valida"
			}
		},
		// the errorPlacement has to take the table layout into account
		errorPlacement: function(error, element) {
			error.appendTo(element.parent().next());
		},
		// specifying a submitHandler prevents the default submit, good for the demo
		submitHandler: function() {
			var formData = new FormData($("#registrationForm")[0]);
			$.ajax({
				url: 'index.php?controller=Registration&task=addNewUser',
				type: 'POST',
				data: formData,
				processData: false,
				contentType: false
			}).done(function(data){
				console.log(data);
				if(data == "1")
				{
					$("#myModalRegistrationTitle").text("Utente Registrato");
					$("#myModalRegistrationBody").append("L'utente è stato inserito nel database di Electronics Hub");
					$("#buttonRegistraionForm").addClass("btn-success");
					$("#registrationModal").modal('show');
				}else {
					$("#myModalRegistrationTitle").text("Utente Non Registrato");
					$("#myModalRegistrationBody").append("Qualcosa è andato storto!");
					$("#registrationModal").modal('show');
				}
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
			var child = $(element).parent();
			child.removeClass("has-success");
			child.addClass("has-error");
			child.next().find("." + errorClass).removeClass("checked");
			child.next().show();
		}
	});
}
