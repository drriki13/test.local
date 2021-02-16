var done = true;

$( document ).ready(function() {
    $('body').on('click', '.js-btn-gangster-reverse-status', function(e) {
        e.preventDefault();

        let action ='reverse-status';

        let btn = $(this);
        let dataId = btn.attr('data-gangster-id');

        if(done){
            done = false;
            sendAjax(dataId, action);
        }
    });

    $('body').on('click', '.js-btn-gangster-random-gangster', function(e) {
        e.preventDefault();

        let action ='random-gangster';

        let btn = $(this);
        let dataId = btn.attr('data-gangster-id');

        if(done){
            done = false;
            sendAjax(dataId, action);
        }
    });
});

function sendAjax(id, action) {

    let url = '/gangster/' + action;
    let data = {id: id};

    $.post(url, data).done(function(data) {
        console.log(data);
        done = true;
        let selectorError = '.js-user-order-errors';
        if (data.success){
            switch (action){
                case 'reverse-status': writeStatus(data, id);
                break;
                case 'random-gangster':randomGangster(data, id);
                break;
                default : console.log('Ключ не опознан!');
            }
            $( selectorError ).hide();
        }else{
            $( selectorError ).text(data.error);
            $( selectorError ).show();
        }
    });
}

function writeStatus(data, id){
    let selector = '#status' + id;
    $(selector).text(data.status);
    if (data.status == 'Жив'){
        $(selector).removeClass('label-danger');
        $(selector).addClass('label-success');
    }else{
        $(selector).removeClass('label-success');
        $(selector).addClass('label-danger');
    }
}

function randomGangster(data, id){
    let selector = '.block' + id;
    $(selector).html(data.view);
}