/**
 * Created by matteopolsinelli on 02/06/15.
 */
$(function(){
    $("#logoutForm").submit(function(event) {
        event.preventDefault();
    });

    logout();
});

function logout(){
    $("#logoutButton").click(function(){
        var username = $("#nickname").val();
        var password = $("#password").val();

        /*
         var rememberMe = $("#rememberMe").prop("checked");
         var loginData = {"username": username, "password": password, "rememberMe": rememberMe};
         */

        var loginData = {"username": username, "password": password};

        //$("#loginButton").off(); //prevent a bug when clicking quickly on loginButton (or pressing enter quickly)

        //$.post("index.php?controllerAction=LoginPage", loginData, function(data){console.log(data);}, "json");

        $.ajax({
            url: 'index.php?controllerAction=LoginPage&sessionAction=logout',
            type: 'POST',
            data: loginData,
            processData: false,
            contentType: false
        }).done(function (data) {
            console.log(data);
        });
    });
}