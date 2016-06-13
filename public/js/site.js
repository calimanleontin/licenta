$(document).ready(function() {
    
    $( window ).load(function() {

       $("#class>option").map(function() {
           hero = '#hero' + (this).value;
           $(hero).hide();
       });

        var value = $('#class').val();
        var hero = '#hero' + value;
        $(hero).show();
    });
    $('#class').on('change', function () {

       $("#class>option").map(function() {
            hero = '#hero' + (this).value;
            $(hero).hide();

        });
        var value = this.value;
        var hero = '#hero' + value;
        $(hero).show();
    });

    $('#stats').hover(function () {
        $('#stats').css('cursor','pointer');
    });
    $('#stats').on('click', function() {
        $('#recommend_form').submit();
    });
});