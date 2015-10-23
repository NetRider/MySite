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
        $.ajax({
            url: 'index.php?controllerAction=LoginPage&sessionAction=logout',
            type: 'POST',
            processData: false,
            contentType: false
        }).done(function (data) {
            console.log(data);
        });
    });
}
