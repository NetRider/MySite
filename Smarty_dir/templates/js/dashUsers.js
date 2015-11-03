$(document).ready(function() {
    var table = $('#dataTables-users').DataTable({
        responsive: true
    });

    $('#rows').on('click', 'tr', function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });

    $('#removeButton').click(function() {
        $.ajax({
    		url: 'index.php?controller=UserAccess&task=removeUser',
    		type: 'POST',
    		data: { userToRemove: table.row('.selected').data()[0]} }).done(function(data) {
            if(data == "1")
            {
                $("#myModalDashUsersTitle").text("Utente eliminato correttamente");
                $("#myModalDashUsersBody").text("Utente " + table.row('.selected').data()[0] + " è stato cancellato dal database di Electronics Hub");
                $("#paneldashUsersForm").addClass("panel-success");
                $("#buttonDashUsersForm").addClass("btn-success");
                $("#dashUsersModal").modal('show');
                table.row('.selected').remove().draw(false);

            }else {
                console.log("è andato tutto male");

            }
    	});
    });

});

function updateValue(sel) {
	$.ajax({
		url: 'index.php?controller=UserAccess&task=updateUserRole',
		type: 'POST',
		data: {idRole: sel.value, idUser: sel.parentNode.getAttribute("value")}}).done(function(data) {
        if(data == "1")
        {
            $("#myModalDashUsersTitle").text("Cambio di ruolo");
            $("#myModalDashUsersBody").text("Il cambio di ruolo effetuato con successo");
            $("#paneldashUsersForm").addClass("panel-success");
            $("#buttonDashUsersForm").addClass("btn-success");
            $("#dashUsersModal").modal('show');

        }else {
            $("#myModalDashUsersTitle").text("Cambio di ruolo fallito");
            $("#myModalDashUsersBody").append("E' stato riscontrato un problema con il server.");
            $("#buttonDashUsersForm").addClass("btn-failure");
            $("#dashUsersModal").modal('show');        }
	});
}
