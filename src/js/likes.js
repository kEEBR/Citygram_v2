$(document).ready(function(){
    $('a.button-like').click(function () {
        $.post('/post/default/like', {}, function(data){

        });
        return false;
    });
});