$(function(){
	var button = $("#updateButton");
	//$('#username').tooltip({title: "pippo"});

 	var formMaxChars = {
 		username: 64,
 		email: 64,
 		password: 64,
 	};
	updateButton(button);
});

function updateButton(btn){
	$("#updateForm").change(function(){
		if(checkForm()){
			btn.removeAttr("disabled");
		}
		else
			btn.attr("disabled","disabled");
	});

	$("#updateForm").submit(function(event){
		event.preventDefault();

		var formData = new FormData(this);

		$.ajax({
			url: 'index.php?controllerAction=registration&registrationAction=addNewUser',
			type: 'POST',
			data: formData,
			processData: false,
			contentType: false})
		.done(function(data){

		});
	});
}

// validate signup form on keyup and submit
function checkForm(){
	var validator = $("#updateForm").validate({
		rules: {
			username: {
				required: true,
				minlength: 5,
				remote: "users.action"
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
				email: true,
				remote: "emails.action"
			},
		},
		messages: {
			username: {
				required: "Enter a username",
				/*
				minlength: jQuery.validator.format("Enter at least {0} characters"),*
				remote: jQuery.validator.format("{0} is already in use")*/
			},
			password: {
				required: "Provide a password",
				//minlength: jQuery.validator.format("Enter at least {0} characters")
			},
			password_confirm: {
				required: "Repeat your password",
				/*
				minlength: jQuery.validator.format("Enter at least {0} characters"),
				equalTo: "Enter the same password as above"*/
			},
			email: {
				required: "Please enter a valid email address",
				/*
				minlength: "Please enter a valid email address",
				remote: jQuery.validator.format("{0} is already in use")*/
			},
		},
		// the errorPlacement has to take the table layout into account
		errorPlacement: function(error, element) {
			if (element.is(":radio"))
				error.appendTo(element.parent().next().next());
			else if (element.is(":checkbox"))
				error.appendTo(element.next());
			else
				error.appendTo(element.parent().next());
		},
		// specifying a submitHandler prevents the default submit, good for the demo
		submitHandler: function() {
			alert("submitted!");
		},
		// set this class to error-labels to indicate valid fields
		success: function(label) {
			// set &nbsp; as text for IE
			label.html("&nbsp;").addClass("checked");
		},
		highlight: function(element, errorClass) {
			$(element).parent().next().find("." + errorClass).removeClass("checked");
		}
	});
}
