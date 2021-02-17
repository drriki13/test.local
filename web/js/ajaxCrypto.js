// $( document ).ready(function() {
//
//
//
//     $('#cryptoform-altcoin').on('change', function(e) {
//         e.preventDefault();
//         let selectorAjax = $(this);
//         console.log(selectorAjax.serializeArray());
//         sendAjax(selectorAjax.serializeArray());
//     });
//
//     $('#cryptoform-currencies').on('change', function(e) {
//         e.preventDefault();
//         let checkBoxAjax = $(this);
//         console.log(checkBoxAjax);
//
//     });
// });
//
// function sendAjax(dataForm) {
//
//     let url = '/crypto/index';
//     let data = {data: dataForm};
//
//     $.post(url, data).done(function(data) {
//         console.log(data);
//         if (data.success){
//             //let html = data.view;
//         }else{
//             console.log(data.error)
//         }
//     });
// }