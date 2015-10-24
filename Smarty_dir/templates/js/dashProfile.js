$(function() {

	jQuery.validator.addMethod("alphanumeric", function(value, element) {
    	return this.optional(element) || /^\w+$/i.test(value);
	}, "Letters, numbers, and underscores only please");

	jQuery.validator.addMethod("customemail", function(value, element) {
    return this.optional(element) || /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
	}, "Please enter a valid email address.");

	$("#updateForm").change(function(){
		checkForm();
	});
});

// validate signup form on keyup and submit
function checkForm(){
	var validator = $("#updateForm").validate({
		rules: {
			username: {
				required: true,
				alphanumeric: true,
				minlength: 5,
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
				minlength: 5
			},
			password_confirm: {
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

			password_confirm: {
				required: "Ripeti password",
			}
		},
		// the errorPlacement has to take the table layout into account
		errorPlacement: function(error, element) {
			error.appendTo(element.parent().next());
		},
		// specifying a submitHandler prevents the default submit, good for the demo
		submitHandler: function() {
			var formData = new FormData($("#updateForm")[0]);
			$.ajax({
				url: 'index.php?controller=UserAccess&task=updateUser',
				type: 'POST',
				data: formData,
				processData: false,
				contentType: false
			}).done(function(data){
				if(data == "true")
					console.log("utente aggioranto");
				else
					console.log("utente non aggioranto");
			});
		},
		// set this class to error-labels to indicate valid fields
		success: function(label, element) {
			$(element).parent().removeClass("has-error");
			$(element).parent().addClass("has-success");
			label.html("&nbsp;").addClass("checked");
		},
		highlight: function(element, errorClass) {
			var man = $(element);
			man.parent().removeClass("has-success");
			man.parent().addClass("has-error");
			man.parent().next().find("." + errorClass).removeClass("checked");
		}
	});
}