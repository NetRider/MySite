/**
 * Created by matteopolsinelli on 25/05/15.
 */
/*
    The function above is a shorter method for the document ready event.
 */
$(function() {
    var button = $("#submitButton");

    /* If you want to change these values, remember to change also the values in Control/Registration.php */
    var formMaxChars = {
        name: 30,
        surname: 30,
        username: 30,
        password: 30
    };

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
            $("#containerRegistrationForm").remove();
            $("#containerRegistrationStatus").append(data);
        });
    });
}
function isFormCompleted(formMaxChars){
    /*var completed = false;

    if($("#nameUser").val().length > 0 &&
        $("#surname").val().length > 0 &&
        $("#usernameRegForm").val().length > 0 &&
        $("#passwordRegForm").val().length > 0 &&
        $("#email").val().length > 0 &&
        $("#degreeCourse").val().length > 0)
    {
       */

    return true;
}
