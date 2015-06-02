/**
 * Created by matteopolsinelli on 25/05/15.
 */
$(function() {
    var button = $("#submitButton");
    submitButton(button);
});

function submitButton(btn) {

    $("#registrationForm").submit(function (event) {
        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: 'index.php?controllerAction=RegistrationPage&registrationAction=addNewUser',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).done(function (data) {
            console.log(data);
            $("#containerRegistrationForm").remove();
            $("#containerRegistrationStatus").append(data);
        });
    });
}
