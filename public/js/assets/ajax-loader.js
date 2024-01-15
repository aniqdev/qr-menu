// log('file: ajax-loader.js')

$( document ).ajaxStart(function() {
    if (document.body.classList.contains('ajax-loader-enabled')) {
        $('#ajax_loader').addClass('active')
    }
});

$( document ).ajaxStop(function() {
    $('#ajax_loader').removeClass('active')
});