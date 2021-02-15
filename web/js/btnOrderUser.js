$( document ).ready(function() {
    $('.js-btn-user-order').on('click', function(e) {
        e.preventDefault();

        let url = '/user/order-ajax';

        let btnOrderAjax = $(this);
        let dataId = btnOrderAjax.attr('data-user-id');

        sendAjax(dataId, url);

    });

    $('.js-btn-user-order-delete').on('click', function(e) {
        e.preventDefault();

        let url = '/user/order-delete';

        let btnOrderAjax = $(this);
        let dataId = btnOrderAjax.attr('data-user-id');

        sendAjax(dataId, url);

    });
});

function sendAjax(id, url) {

    let data = {id: id};

    console.log(id + url);
    $.post(url, data).done(function(data) {
        console.log(data);
        if (data.success){
            let html = data.view;
            $( '#js-user-order-view' ).html(html);
            if (url == '/user/order-delete'){
                let selector = '.js-table-user-order-delete' + id;
                $(selector).remove();
            };
            $( '.js-user-order-errors' ).hide();
        }else{
                $( '.js-user-order-errors' ).text(data.error);
                $( '.js-user-order-errors' ).show();
        }
    });
}