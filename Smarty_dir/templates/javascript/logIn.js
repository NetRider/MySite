/**
 * Created by matteopolsinelli on 31/05/15.
 */
$(function() {
    var button = $("#submitLoginButton");
    submitButton(button);
});

function submitButton(btn) {

    $("#loginForm").submit(function (event) {
        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: 'index.php?controllerAction=LoginPage&sessionAction=login',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).done(function (data) {
            console.log(data);
        });
    });
}