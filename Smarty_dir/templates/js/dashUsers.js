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

    $('#removeButton').click( function () {
        $.ajax({
    		url: 'index.php?controller=UserAccess&task=removeUser',
    		type: 'POST',
    		data: { userToRemove: table.row('.selected').data()[0]} }).done(function(data) {
            if(data == "true")
            {
                table.row('.selected').remove().draw( false );

            }else {
            }
    	});
    });

});

function updateValue(sel) {
	/*
		Attraverso una chiamata ajax faccio l'update
	 */
	$.ajax({
		url: 'index.php?controller=UserAccess&task=updateUserRole',
		type: 'POST',
		data: {idRole: sel.value, idUser: sel.parentNode.getAttribute("value")}}).done(function(data) {
        if(data == "true")
        {
            console.log("ok");

        }else {
            console.log("non ok");
        }
	});
}
