$('#btnIndex').on('click', function() {
        var $username = $('#username').val();
        var $password = $('#password').val();
        var $selectOperateur = $('#selectOperateur').val();
        var data = "username=" + $username + "&password=" + $password + "&selectOperateur=" + $selectOperateur;
        console.log(data);
        $.ajax({
            url: "Controls/ajax.php",
            type: "POST",
            data: data,
            datatype: "json",
            success: function(data) {
                if (data != "") {
                    $('#contentIndex').addClass('hide');
                }

            }
        })
    })
    // $('#btnIndex').on('click', function() {

// })