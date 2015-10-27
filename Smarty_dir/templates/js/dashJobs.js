$(document).ready(function() {
    var tableArticles = $('#dataTablesArticles').DataTable({
        responsive: true
    });

	var tableProjects = $('#dataTablesProjects').DataTable({
        responsive: true
    });

    $('#rowsArticles').on('click', 'tr', function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        }
        else {

            tableArticles.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });

	$('#rowsProjects').on('click', 'tr', function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        }
        else {

            tableProjects.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });

    $('#removeArticleButton').click( function () {

        $.ajax({
    		url: 'index.php?controller=Article&task=deleteArticle',
    		type: 'POST',
    		data: { articleToRemove: document.getElementsByClassName('selected')[0].getAttribute("value")}}).done(function(data) {
            if(data == "true")
            {
                console.log("è andato tutto a buon fine");
                tableArticles.row('.selected').remove().draw( false );

            }else {
				console.log("è andato tutto a male ");
            }
    	});
    });

	$('#removeProjectButton').click( function () {
        $.ajax({
    		url: 'index.php?controller=UserAccess&task=removeUser',
    		type: 'POST',
    		data: { projectToRemove: document.getElementsByClassName('selected')[0].getAttribute("value")}}).done(function(data) {
            if(data == "true")
            {
                console.log("è andato tutto a buon fine");
                table.row('.selected').remove().draw( false );

            }else {
				console.log("è andato tutto male porco boia");

            }
    	});
    });

});
