$(document).ready(function fun() { //LOGOFF function if the user clicks the button -> 
    $('#btnLogout').click(function () {
        var button = 'checked'
        $.ajax({
            method: 'POST',
            url: '../../Controller/Controller-User.php', //Call destroy session function on "Controller-User"
            data: { 'button': button },
            dataType: "text",
            success: function fun () {
                alert('You are disconnected!');
                setTimeout(function(){location.href="../View/Index.php"} , 0); //Redirect to Index
            }
        });
    });
});
