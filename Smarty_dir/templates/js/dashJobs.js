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
            if(data == "1")
            {
                $("#myModalDashJobsTitle").text("Articolo eliminato correttamente");
                $("#myModalDashJobsBody").text("L'articolo " + tableArticles.row('.selected').data()[1] + " è stato eliminato!");
                $("#buttonDashJobsForm").addClass("btn-success");
                $("#dashJobsModal").modal('show');
                tableArticles.row('.selected').remove().draw( false );


            }else {
                $("#myModalDashJobsTitle").text("Progetto non eliminato");
                $("#myModalDashJobsBody").append("E' stato riscontrato un problema con il server.");
                $("#buttonDashJobsForm").addClass("btn-failure");
                $("#dashJobsModal").modal('show');
            }
    	});
    });

	$('#removeProjectButton').click( function () {
        $.ajax({
    		url: 'index.php?controller=Project&task=deleteProject',
    		type: 'POST',
    		data: { projectToRemove: document.getElementsByClassName('selected')[0].getAttribute("value")}}).done(function(data) {
            if(data == "1")
            {
                $("#myModalDashJobsTitle").text("Progetto eliminato correttamente");
                $("#myModalDashJobsBody").text("Il progetto " + tableProjects.row('.selected').data()[1] + " è stato eliminato!");
                $("#buttonDashJobsForm").addClass("btn-success");
                $("#dashJobsModal").modal('show');
                tableProjects.row('.selected').remove().draw( false );

            }else {
                $("#myModalDashJobsTitle").text("Progetto non eliminato");
                $("#myModalDashJobsBody").append("E' stato riscontrato un problema con il server.");
                $("#buttonDashJobsForm").addClass("btn-failure");
                $("#dashJobsModal").modal('show');
            }
    	});
    });

});
