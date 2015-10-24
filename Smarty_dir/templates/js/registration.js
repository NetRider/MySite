$(function(){

	jQuery.validator.addMethod("alphanumeric", function(value, element) {
		return this.optional(element) || /^\w+$/i.test(value);
	}, "Letters, numbers, and underscores only please");

	jQuery.validator.addMethod("customemail", function(value, element) {
	return this.optional(element) || /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
	}, "Please enter a valid email address.");

	$("#registrationForm").change(function(){
		checkForm();
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
		},
		// the errorPlacement has to take the table layout into account
		errorPlacement: function(error, element) {
			error.appendTo(element.parent().next());
		},
		// specifying a submitHandler prevents the default submit, good for the demo
		submitHandler: function() {
			var formData = new FormData($("#registrationForm")[0]);
			$.ajax({
				url: 'index.php?controller=registration&task=addNewUser',
				type: 'POST',
				data: formData,
				processData: false,
				contentType: false
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