let form = $('#w0');
let data = [];

$(document).ready(function() {
    $('#cryptoform-altcoin').on('change', function(e) {
        e.preventDefault();
        data = form.serializeArray();
        sendData(data);
    });

    $('#cryptoform-currencies input').on('change', function(e) {
        e.preventDefault();
        data = form.serializeArray();
        sendData(data);
    });
});


function sendData(data) {
    let url = '/crypto/send-request';
    $.post(url, data).done(function(data) {
        if (data.success) {
            $('.js-ajax-wrap').html(data.view);
        }
    });
}