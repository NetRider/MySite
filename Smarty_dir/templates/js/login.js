$(document).ready(function(){

    $('.modal-footer button').click(function(){
		var button = $(this);

		if ( button.attr("data-dismiss") != "modal" ){
			var inputs = $('#loginForm');
            var title = $('.modal-title');
            var username = $('#uLogin').val();
            var password = $('#uPassword').val();


            var loginData = {"username": username, "password": password};

            $.ajax({
                url: "index.php?controller=UserAccess&task=login",
                type: 'POST',
                data: loginData
            }).done(function(data) {
                if(data == "false")
                {
                    button.removeClass("btn-success")
            				.addClass("form-control btn btn-danger")
            				.text("Ritenta")
            				.removeAttr("data-dismiss");
        			title.text("Login fallito!");

                }else if(data == "true")
                {
                    button.removeClass("btn-danger")
            				.addClass("btn btn-success")
            				.text("Chiudi")
            				.removeAttr("data-dismiss");
        			title.text("Login effettuato!");
                    button.click(function() {
                        if(location.search == "?controller=UserAccess&task=logout")
                        {
                            location.replace("/MySite/index.php");
                        }else {
                            location.reload();
                        }
                    });
                }
            });
		}
	});
});
