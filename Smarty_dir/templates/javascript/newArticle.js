/**
 * Created by matteopolsinelli on 30/05/15.
 */
$(function() {
    var button = $("#submitButton");
    submitButton(button);
});

function submitButton(btn) {

    $("#articleForm").submit(function (event) {
        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: 'index.php?controllerAction=ArticlePage&articleAction=addNewArticle',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).done(function (data) {
            $("#containerArticleForm").remove();
            $("#containerStatus").append(data);
        });
    });
}
