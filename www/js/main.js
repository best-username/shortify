var main = {
    init: function() {

    },

    createUrl: function() {

        $.ajax({
            url: $('#url-form').attr('action'),
            type: 'POST',
            dataType: 'json',
            data: $('#url-form').serialize(),
            beforeSend: function() {
                $('#generate-btn').button('loading');  
            },
            success: function(data) {                
                if(data.is_success) {
                    var short_url = data.hostname + '/' + data.hash;
                    var msg = 'Короткиу урл: <a href="' + short_url + '" target="_blank">' + short_url + '</a>';
                    $('#msg').html(msg).show();
                }
                $('#generate-btn').button('reset');
            },
            error: function() {

                $('#generate-btn').button('reset');
            }
        });

        return false;
    }
}