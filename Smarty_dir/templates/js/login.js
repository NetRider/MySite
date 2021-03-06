$(document).ready(function(){

    $('.modal-footer button').click(function(){
		var button = $(this);

		if ( button.attr("data-dismiss") != "modal" ){
			var inputs = $('#loginForm');
            var title = $('.modal-title');
            var username = $('#uLogin').val();
            var password = $('#uPassword').val();
            var rememberMe = $('#uRememberMe').val();
            console.log(rememberMe);


            var loginData = {"username": username, "password": password, "rememberMe": rememberMe };

            $.ajax({
                url: "index.php?controller=UserAccess&task=login",
                type: 'POST',
                data: loginData
            }).done(function(data) {
                if(data == "1") {
                    button.removeClass("btn-danger")
            				.addClass("btn btn-success")
            				.text("Chiudi")
            				.removeAttr("data-dismiss");
        			title.text("Login effettuato!");
                    button.click(function() {
                        if(location.search == "?controller=UserAccess&task=logout")
                            location.replace("index.php");
                        else
                            location.reload();
                    });

                }else {
                    button.removeClass("btn-success")
            				.addClass("form-control btn btn-danger")
            				.text("Ritenta")
            				.removeAttr("data-dismiss");
        			title.text("Login fallito!");
                }
            });
		}
	});
});
