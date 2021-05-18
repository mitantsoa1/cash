$('#select_compte').on('change', function() {

    // alert($('#select_compte').val());
    if ($('.select_acc').val() == 'airtel') {

        $.ajax({
            url: "Controls/ajax.php",
            type: "POST",
            data: "airtel=airtel",
            datatype: "json",
            success: function(data) {
                $('.solde_content').html('<p><h2> <strong class="total_compte">Ar ' + data + '</strong> </h2></p>');
            }
        })


    } else if ($('.select_acc').val() == 'orange') {
        $.ajax({
            url: "Controls/ajax.php",
            type: "POST",
            data: "orange=orange",
            datatype: "json",
            success: function(data) {
                $('.solde_content').html('<p><h3> <strong class="total_compte">Ar ' + data + '</strong> </h3></p>');
            }
        })

    } else if ($('.select_acc').val() == 'telma') {
        $.ajax({
            url: "Controls/ajax.php",
            type: "POST",
            data: "telma=telma",
            datatype: "json",
            success: function(data) {
                $('.solde_content').html('<p><h2> <strong class="total_compte">Ar ' + data + '</strong> </h2></p>');
            }
        })

    }

});