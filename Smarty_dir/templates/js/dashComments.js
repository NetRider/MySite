$(document).ready(function() {
    var tableArticles = $('#dataTablesCommentsArticles').DataTable({
        responsive: true
    });

	var tableProjects = $('#dataTablesCommentsProjects').DataTable({
        responsive: true
    });

    $('#rowsCommentsArticles').on('click', 'tr', function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        }
        else {
            tableArticles.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });

	$('#rowsCommentsProjects').on('click', 'tr', function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        }
        else {
            tableProjects.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });

    $('.removeCommentButton').click( function () {
		var id = this.id;
        $.ajax({
    		url: 'index.php?controller=Comment&task=removeCommentById',
    		type: 'POST',
    		data: { id: document.getElementsByClassName('selected')[0].getAttribute("value")}}).done(function(data) {
            if(data)
            {
				if(id == "articleComment")
				{
	                $("#myModalDashCommentBody").text("Il commento " + tableArticles.row('.selected').data()[0] + " è stato eliminato!");
	                tableArticles.row('.selected').remove().draw( false );

				}else
				{
	                $("#myModalDashCommentBody").text("Il commento <br>" + tableProjects.row('.selected').data()[0] + " </br>è stato eliminato!");
	                tableProjects.row('.selected').remove().draw( false );
				}

				$("#myModalDashCommentTitle").text("Commento eliminato correttamente");
				$("#buttonDashCommentForm").addClass("btn-success");
				$("#dashCommentModal").modal('show');

            }else {
				if(id == "articleComment")
					$("#myModalDashCommentTitle").text("Articolo non eliminato");
				else
					$("#myModalDashCommentTitle").text("Progetto non eliminato");

                $("#myModalDashCommentBody").append("E' stato riscontrato un problema con il server.");
                $("#buttonDashCommentForm").addClass("btn-failure");
                $("#dashCommentModal").modal('show');
            }
    	});
    });
});
