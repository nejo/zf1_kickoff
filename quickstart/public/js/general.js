$(function() {
    $(document).ajaxStart(function() {
        $('#spinner').fadeIn('fast');
    });
    $(document).ajaxStop(function() {
        $('#spinner').stop().fadeOut('fast');
    });
});