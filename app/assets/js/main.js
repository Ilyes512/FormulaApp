$(function(){
    var $selectize = $('.selectize');
    if($selectize.length > 0) {
        $('.selectize').selectize();
    }

    // fallback for autofocus on first non-hidden input
    if(!Modernizr.input.autofocus) {
        $('form:first *:input[type!=hidden]:first').focus();
    }
});