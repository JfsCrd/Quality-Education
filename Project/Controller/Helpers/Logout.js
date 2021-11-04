$(document).ready(function fun() {
    $('#btnLogout').click(function () {

        var button = 'checked'

        $.ajax({

            method: 'POST',
            url: '../../Controller/Controller-User.php',
            data: { 'button': button },
            dataType: "text",

            success: function fun () {
                alert('You are disconnected!');
                setTimeout(function(){location.href="../View/Index.php"} , 0);
            }
        });
    });
});
